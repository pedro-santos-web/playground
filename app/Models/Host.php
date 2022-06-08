<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use ipinfo\ipinfo\IPinfo;

class Host extends Model
{
	use HasFactory;

	protected $fillable = ["name", "file_path", "url", "ip", "created_at", "updated_at"];
	
	public static function dataIp($ip){

		$access_token = env('IPINFO');		
		$client = new IPinfo($access_token);
		$ip_address = $ip;
		
		$response = $client->getDetails($ip_address);

		return $response;

	}

}
