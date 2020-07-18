<?php
namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return;    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Ticket $ticket
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Render
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        # Return
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Betta\Models\Ticket $ticket
     * @param  Betta\Models\Profile $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        # Void?
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return;
    }

    /**
     * Display a single
     *
     * @return Response
     */
    public function show()
    {
       return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        # Remove
        return redirect()->back();
    }

    /**
     * Show change password form
     *
     * @return View
     */
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    /**
     * Change Password
     *
     * @param  Request $request
     * @return update password
     */
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validator = Validator::make($request->all(),[
            'current_password' => 'required',
            'new_password' => ['required|min:6'],
            #'confirm_password' => ['same:new_password'],
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
