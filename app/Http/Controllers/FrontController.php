<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\TestMessage;
use App\Notifications\NotifyAdmin;
use App\User;

class FrontController extends Controller
{
    
	public function notifyEmailAdd()
	{
		$users = User::all();
		return view('notification', compact('users'));
	}

    public function notifymail(Request $requst)
    {
    	//dd($requst->all());

        $user = User::create([
            'name' => $requst->name,
            'email' => $requst->email,
            'phone_number' => $requst->phone_number,
            'password' => Hash::make($requst->password),
        ]);

        $user->notify(new TestMessage($user));

        $admin = User::find('3');
        $admin->notify(new NotifyAdmin($user));

        Session::Flash('success', 'Registration Success');

        return redirect()->back();
    }

    public function varifyEmail($id)
    {

        if($id == null){
            return redirect('/');
        }

        $user = User::where('id', $id)->firstOrFail();

        if($user){
            $user->update([
                'name' => 'rana2',
            ]);

            return redirect()->route('home');
        }
    }

}
