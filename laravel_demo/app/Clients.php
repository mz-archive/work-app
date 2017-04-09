<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Clients extends Model

{
       
	public static function addNewClient($name, $phone, $email)
	{
		DB::table('clients')->insert(

			['name' => $name, 'phone' => $phone, 'email' => $email]
		);
	}

	public static function getUserbyID($id)
	{
		$user = DB::table('clients')->where('id', '=', $id)->get();	

		return $user;	
	}

	public static function delClient($id)
	{
		DB::table('clients')->where('id', '=', $id)->delete();
	}

	public static function editClient($id, $name, $phone, $email)
	{

		DB::table('clients')->where('id', $id)->update([
			'name' => $name, 
			'phone' => $phone, 
			'email' => $email 
		]);
	}

}
