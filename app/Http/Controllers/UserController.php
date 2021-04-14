<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function all()
    {
      
    	
    	$model = User::all();
 
    	return $model;
    }

    public function store(Request $request)
    {

        return User::create($request->all());
    }

     // mengambil data by id
     public function show($id)
     {
         return User::find($id);
     }

     // mengubah data
    public function update($id, Request $request)
    {
        $person = User::find($id);
        $person->update($request->all());
        return $person;
    }

     // menghapus data
     public function delete($id)
     {
         $person = User::find($id);
         $person->delete();
         return 204;
     }
}
