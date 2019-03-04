<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile');
    }

    public function update(Request $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password ){
            $user->password = bcrypt($request->password);
        }
        $file = $request->image;
        if($file){
            $path = public_path('/users');
            $filename = time().".".$file->getClientOriginalExtension();
            $file->move($path, $filename);
            $user->image = $filename;
        }
        $user->save();

        //return "modificando perfil".$request->name;
    }
}
