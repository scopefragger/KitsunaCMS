<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class appController extends Controller
{
    public function register()
    {
        $current = User::where('email', '=', Input::get('email'))->get();
        if (($current->isEmpty())) {
            $input = Input::get();
            $newUser = new User;
            $newUser->name = Input::get('name');
            $newUser->email = Input::get('email');
            $newUser->password = bcrypt(Input::get('email'));
            $newUser->save();
            return View('success');
        } else {
            return View('error');
        }
    }
}
