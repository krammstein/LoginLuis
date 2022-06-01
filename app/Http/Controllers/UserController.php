<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use App\Mail\UserMail;

class UserController extends Controller
{
    /**
     * Principal
     */
    public function login()
    {
        return view('login', [
            'title' => 'Login Luis',
        ]);
    }

    public function remember(){
        return view('remember', [
            'title' => 'Recordar Contraseña'
        ]);
    }

    public function create(){
        return view('create', [
            'title' => 'Crear Usuario',
        ]);
    }

    public function doLogin(Request $req){

        $u = new User;
        $user = $u->login($req->email, $req->password);

        if($user !== null){

            $req->session()->put([
                'sess.id' => $user->id,
                'sess.email' => $user->email,
                'sess.name' => $user->name,
            ]);

            return redirect()->route('user.dash');
            

        }else{

            return redirect()->route('user.login', [
                    'error' => 1
                ]);
            
        }

    }

    public function store(Request $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => User::STATUS_ACTIVE,
        ]);

        return redirect()->route('user.create', [
            'success' => 1
        ]);
    }

    public function rememberPass(Request $req){

        $user = User::where('email', $req->email)
        ->where('status', User::STATUS_ACTIVE)
        ->first();

        if(isset($user->id)){
            
            $pass = Str::random(8);
            $user->password = $pass;
            $success = 1;
            $err = null;

            try {

                Mail::to($user->email)->send(new UserMail($pass));
                $user->save();

            } catch (\Throwable $th) {
                $success = 0;
                $err = $th->getMessage();
            }

            return redirect()->route('user.remember', [
                'success' => $success,
                'err' => $err,
            ]);    
            
        }

    }
}
