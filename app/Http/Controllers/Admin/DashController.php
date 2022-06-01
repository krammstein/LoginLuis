<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{

    private $data;

    private function auth(){

        $this->data = (object)session()->all();

        if (isset($this->data->sess['email'])) {

            $this->data = (object)$this->data->sess;

            return true;

        } else {
            return redirect()->route('user.login');
        }

    }

    public function index(){

        $this->auth();

        $items = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.dash', [
            'title' => 'Wellcome ' . $this->data->name,
            'items' => $items,
        ]);
        
    }

    public function profile(){
        
        $this->auth();

        return view('admin.profile', [
            'title' => 'Edit your Profile',
            'user' => User::find($this->data->id),
        ]);
    }

    public function update(Request $req){
        
        $this->auth();

        $user = User::find($this->data->id);
        $params = [];
        
        if($req->email_change == 1){

            $req->validate([
                'email' => 'required|email|max:350',
            ]);

            $user->email = $req->email;
            $user->save();

            $params = [
                'success' => 1,
            ];

        }

        if($req->password_change == 1){

            $req->validate([
                'password' => 'required|max:20|min:8|confirmed',
            ]);

            $user->password = $req->password;
            $user->save();

            $params = [
                'success' => 1,
            ];

        }

        return redirect()->route('user.profile', $params);
    }

    public function changeStatus(Request $req){

        $id = (int)decrypt($req->serial);
        $params = [];

        if($id > 0){

            $user = User::find($id);

            $user->status = (int)$req->status;

            $user->save();
        }

        if((int)$req->page > 0){
            
            $params = [
                'page' => $req->page,
            ];
        }

        return redirect()->route('user.dash', $params);
    }

    public function logout() {
        session()->forget([
            'sess.id', 'sess.name', 'sess.email'
        ]);

        return redirect()->route('user.login');
    }
}
