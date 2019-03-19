<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TestMessage;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notifymail()
    {

        $user = User::create([
            'name' => 'rana',
            'email' => 'rana@gmail.com',
            'phone_number' => '8801776398979',
            'password' => Hash::make('123456'),
        ]);

        $user->notify(new TestMessage($user));
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
