<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $resource = 'admin.user';

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
    
    public function create()
    {
        return;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $searchString = $request->get('searchby');
        $filter = $request->get('filter');
        if($searchString) {
            $users = $this->user->where('name', 'like', '%'.$searchString.'%')
                                ->orwhere('lastname','like','%'.$searchString.'%')
                                ->orwhere('mobileNumber','like','%'.$searchString.'%')
                                ->orwhere('email', 'like', '%'.$searchString.'%')
                                ->paginate(10);
        } else {
            $users = $this->user->latest()->paginate(10);
        }

        return view("{$this->resource}.index", compact('users', 'searchString', 'filter'));

    }

    public function show(User $user)
    {    
        return view('admin.user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    }

    /**
     * get user block/unblock
     *
     * @param  $user
     * @return Response
     */

    public function block(Request $request, $user, $status)
    {
        $user = $this->user->find($user);
        $message = ($status) ? 'Blocked' : 'Unblock';
        $user->update(['isBlock'=> (int)$status]);
        return redirect()->back()
                        ->with('success', "User $message successfully.");
    }
}
