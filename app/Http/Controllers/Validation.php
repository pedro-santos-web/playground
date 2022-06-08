<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;
use App\Http\Controllers\Ipinfo;

class Validation extends Controller
{
   public function index(){

		$hosts = Host::all();

		for($i = 0; $i < count($hosts); $i++){

			$curl = curl_init($hosts[$i]->url);

			curl_setopt($curl, CURLOPT_NOBODY, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FILETIME, true);

			$result = curl_exec($curl);

			$hosts[$i]->code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$hosts[$i]->scheme = curl_getinfo($curl, CURLINFO_SCHEME);

			curl_close($curl);

		}
		
		if(\Request::isMethod('post')){

			if(\Request::has('website')){

				$url = \Request::get('website');
	
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_NOBODY, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_FILETIME, true);
	
				$result = curl_exec($curl);
				$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
				$info = curl_getinfo($curl);
				$info['filename'] = date("d-m-Y H:i:s", $info['filetime']);
	
				curl_close($curl);

			}

			if(\Request::has('ip')){

				$ip = \Request::get('ip');
				$request = Host::dataIp($ip);
				$response = $request->all;
				$loc = $request->loc;

			}

			if(!isset($info)) $info = "";
			if(!isset($response)) $response = "";
			if(!isset($loc)) $loc = "";

			$data = array(
				'hosts' => $hosts,
				'info' => $info,
				'response' => $response,
				'loc' => $loc,
			);

			return view('hosts.list', $data);

		} else {

			$data = array(
				'hosts' => $hosts,
			);

			return view('hosts.list', $data);

		}

	}

	public function create(Request $request){

		if(\Request::isMethod('post')){

			$request->validate([
				'name' => 'required',
			]);

			if(\Request::has('url')){
				$ip = gethostbyname($request->get('url'));
			}

			if($request->hasFile('image')){
				
				$request->validate([
					'image' => 'mimes:jpeg,bmp,png,svg',
				]);

				$request->file('image')->store('logos', 'public');

				$host = new Host([
					'name' => $request->get('name'),
					'file_path' => $request->file('image')->hashName(),
					'url' => $request->get('url'),
					'ip' => $ip
				]);
				$host->save();

			}

			return redirect('/list-host');

		}

		return view('hosts.create');

	}

	public function delete($host_id){

		$delete = Host::findorfail($host_id);
		$delete->delete();

		return redirect('/list-host');

	}

}
