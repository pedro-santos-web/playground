<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Conrtollers\Ipinfo;

use App\Models\Host;

class HostController extends Controller
{
   public function add(Request $request){

		if(\Request::isMethod('post')) {

			$request->validate([
				'name' => 'required',
				'url' => 'required',
			]);
	
			if(\Request::has('url')){
				$ip = gethostbyname($request->get('url'));
			}
	
			if($request->hasFile('image')){
				
				$request->validate([
					'image' => 'mimes:jpeg,jpg,bmp,png,svg',
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
	
			return view('main');

		}

	}

	public function delete($host_id) {

		if(\Request::isMethod('post')) {

			$host = Host::findorfail($host_id);

			if(File::exists(public_path('storage/logos/') . $host->file_path)) {
				File::delete(public_path('storage/logos/') . $host->file_path);
			}

			$host->delete();

			return view('main');

		} else {

			return abort(404);

		}

	}

	public function edit($host_id) {

		$host = Host::findorfail($host_id);

		$data = array("host" => $host);

		return view('main', $data);

	}

	public function update(Request $request, $host_id) {

		if(\Request::isMethod('post')) {

			$host = Host::findorfail($host_id);

			$request->validate([
				'name' => 'required',
				'url' => 'required',
				'ip' => 'required',
			]);
			
			if($request->hasFile('image')){

				$request->validate([
					'image' => 'mimes:jpeg,jpg,bmp,png,svg',
				]);
				
				if(File::exists(public_path('storage/logos/') . $host->file_path)) {
					File::delete(public_path('storage/logos/') . $host->file_path);
				}
				
				$request->file('image')->store('logos', 'public');

				$host->fill([
					'name' => $request->name,
					'url' => $request->url,
					'ip' => $request->ip,
					'file_path' => $request->file('image')->hashName(),
				]);
	
				$host->save();
	
				return redirect('/list-host')->with("message", "Host updated!");

			} else {

				$host->fill([
					'name' => $request->name,
					'url' => $request->url,
					'ip' => $request->ip,
				]);
	
				$host->save();
	
				return redirect('/list-host')->with("message", "Host updated!");

			}

		} else {

			return abort(404);

		}

	}

}
