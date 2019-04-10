<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
   	public function add($data){

   		$fName 		= $data['fName'];
   		$lName 		= $data['lName'];
   		$email 		= $data['email'];
   		$phone 		= $data['phone'];
   		$address 	= $data['address'];
   		if (isset($data['userId'])) {
   			$id 		= $data['userId'];
   			return DB::table('users')->where('id', $id)->update([
		        'first_name' => $fName,
		        'last_name' => $lName,
		        'email' => $email,
		        'phone' => $phone,
		        'address' => $address
			]);
   		}else{
   			return DB::table('users')->insert([
		        'first_name' => $fName,
		        'last_name' => $lName,
		        'email' => $email,
		        'phone' => $phone,
		        'address' => $address
			]);
   		}
   	}
   	public function getAll(){
   		$users = DB::table('users')->select('id','first_name','last_name','email','phone','address','created_at')->orderBy('id',"desc")->get();
   		return $users;
   	}
   	public function getUser($id){
   		$user = DB::table('users')->select('id','first_name','last_name','email','phone','address','created_at')->orderBy('id',"desc")->where('id',$id)->first();
   		return $user;
   	}

   	public function deleteUser($userId){
   		return DB::table('users')->where('id',$userId)->delete();
   	}
}
