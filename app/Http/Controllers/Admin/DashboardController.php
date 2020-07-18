<?php
namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
        $user7Count = $this->user->where('created', '<=' ,Carbon::now())
                                       ->where('created', '>=', Carbon::now()->subDays(1))    
                                          ->count();
        $user6Count = $this->user->where('created', '<=', Carbon::now()->subDays(1))
                                       ->where('created', '>=', Carbon::now()->subDays(2))      
                                          ->count();                                  
        $user5Count = $this->user->where('created', '<=', Carbon::now()->subDays(2))
                                       ->where('created', '>=', Carbon::now()->subDays(3))      
                                          ->count(); 

        $user4Count = $this->user->where('created', '<=', Carbon::now()->subDays(3))
                                       ->where('created', '>', Carbon::now()->subDays(4))      
                                          ->count();
                                 
        $user3Count = $this->user->where('created', '<=', Carbon::now()->subDays(4))
                                       ->where('created', '>=', Carbon::now()->subDays(5))      
                                          ->count();

        $user2Count = $this->user->where('created', '<=', Carbon::now()->subDays(5))
                                       ->where('created', '>=', Carbon::now()->subDays(6))      
                                          ->count();
           
        $user1Count = $this->user->where('created', '<=', Carbon::now()->subDays(6))
                                       ->where('created', '>=', Carbon::now()->subDays(7))      
                                          ->count();

        $today = Carbon::now()->format('D');
        $prev1 = Carbon::now()->subDays(1)->format('D');
        $prev2 = Carbon::now()->subDays(2)->format('D');
        $prev3 = Carbon::now()->subDays(3)->format('D');
        $prev4 = Carbon::now()->subDays(4)->format('D');
        $prev5 = Carbon::now()->subDays(5)->format('D');
        $prev6 = Carbon::now()->subDays(6)->format('D');

        $userMon1Count = $this->user->where('created', '<=' ,Carbon::now())
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(1))   
                                 ->count();
        $userMon2Count = $this->user->where('created', '<=' ,Carbon::now()->subMonth(1))
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(2))   
                                 ->count();
        $userMon3Count = $this->user->where('created', '<=' ,Carbon::now()->subMonth(2))
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(3))   
                                 ->count();                                                  
        $userMon4Count = $this->user->where('created', '<=' ,Carbon::now()->subMonth(3))
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(4))   
                                 ->count();

        $userMon5Count = $this->user->where('created', '<=' ,Carbon::now()->subMonth(4))
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(5))   
                                 ->count();
        $userMon6Count = $this->user->where('created', '<=' ,Carbon::now()->subMonth(5))
                                 ->where('created', '>=', Carbon::now()
                                 ->subMonth(6))   
                                 ->count();
        $month = Carbon::now()->format('M');
        $prevM1 = Carbon::now()->subMonth(1)->format('M');
        $prevM2 = Carbon::now()->subMonth(2)->format('M');
        $prevM3 = Carbon::now()->subMonth(3)->format('M');
        $prevM4 = Carbon::now()->subMonth(4)->format('M');
        $prevM5 = Carbon::now()->subMonth(5)->format('M');
        $prevM6 = Carbon::now()->subMonth(6)->format('M');

        $registerUsers = $this->user->count();
        $maleUsers = $this->user->where('gender', true)->count();
        $femaleUsers = $this->user->where('gender', false)->count();
        $latestUsers = $this->user->limit(9)->latest()->get();

        return view('admin.dashboard.index', compact('user1Count', 'user2Count','user3Count','user4Count','user5Count','user6Count','user7Count', 'today', 'prev1', 'prev2', 'prev3', 'prev4', 'prev5', 'prev6',  'month', 'prevM1', 'prevM2', 'prevM3', 'prevM4', 'prevM5', 'prevM6', 'userMon1Count', 'userMon2Count', 'userMon3Count', 'userMon4Count', 'userMon5Count', 'userMon6Count', 'registerUsers', 'maleUsers', 'femaleUsers', 'latestUsers'));
    }
    
}
