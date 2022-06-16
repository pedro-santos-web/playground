<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Conrtollers\Ipinfo;

use App\Models\Host;

class PanelController extends Controller
{
   public function index() 
	{

		$hosts = Host::all();

		for($i = 0; $i < count($hosts); $i++) {

			$curl = curl_init($hosts[$i]->url);

			//! Guardar ultimos resultados fetched na base de dados
			//! Para só executar curls com a confirmação do utilizador
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

		if(\Request::isMethod('post')) {

			if(\Request::has('website')) {

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

			} else $info = "";

			if(\Request::has('ip')) {

				$ip = \Request::get('ip');
				$request = Host::dateIp($ip);
				$response = $request->all;
				$loc = $request->loc;

			} else {

				$response = "";
				$loc = "";
				$ip = "";

			}

			$data = array(
				'hosts' => $hosts,
				'info' => $info,
				'response' => $response,
				'loc' => $loc,
				'ip' => $ip,
			);

			return view('host.list', $data);

		} else {

			$data = array(
				'hosts' => $hosts,
			);

			return view('host.list', $data);

		}
		
	}
}
