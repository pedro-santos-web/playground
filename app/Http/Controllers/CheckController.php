<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Host;

use App\Http\Controllers\Ipinfo;

class CheckController extends Controller
{
	public function ip() {

		$hosts = Host::all();

		if(\Request::isMethod('post')) {
			
			if(\Request::has('ip')) {

				$ip = \Request::get('ip');
				$request = Host::dataIp($ip);
				$response = $request->all;
				$loc = $request->loc;

				$data = array(
					'hosts' => $hosts,
					'response' => $response,
					'loc' => $loc,
					'ip' => $ip,
				);

				return view('host.list', $data);

			}

		}

	}

	public function url() {

		$hosts = Host::all();

		if(\Request::isMethod('post')) {
			
			if(\Request::has('url')) {

				$url = \Request::get('url');

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

				$data = array(
					'hosts' => $hosts,
					'info' => $info,
				);

				return view('host.list', $data);

			}

		}

	}
}
