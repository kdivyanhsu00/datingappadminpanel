<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailNotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.emailnotification.index');
    }

    public function store(Request $request)
    {
        $emails = $this->user->where('email', '<>', '')->pluck('email')->toArray();
        
        Mail::send('emails.notification', ['data' => $request->all()], function($message) use ($emails)
        {
            $message->to($emails)->subject('Notification');   
        });
        return redirect()->back()->with("success","Notification sent successfully !");
    }
}