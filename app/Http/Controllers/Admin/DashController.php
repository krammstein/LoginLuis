<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{

    public function index(){

        $data = (object)session()->all();
        //print_r($data);

        if($data->sess['email']){

            return view('admin.dash', [
                'title' => 'Bienvenido ' . $data->sess['name']
            ]);

        }else{
            return redirect()->route('user.login');
        }

    }

    public function logout() {
        session()->forget([
            'sess.id', 'sess.name', 'sess.email'
        ]);

        return redirect()->route('user.login');
    }
}
