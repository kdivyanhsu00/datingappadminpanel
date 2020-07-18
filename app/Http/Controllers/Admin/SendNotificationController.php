<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendNotificationController extends Controller
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
        return view('admin.sendnotification.index');
    }

    public function store(Request $request)
    {
        $users = $this->user->where('email', '<>', '')->get();
        foreach($users as $user) {
            if(!empty($user->device->deviceToken)) {
                $deviceToken = $user->device->deviceToken;
                $deviceType = $user->device->deviceType;
                $this->push_notification($deviceToken, $deviceType);
            }
        }
        return redirect()->back()->with("success","Notification sent successfully !");
    }

    public function push_notification($deviceToken, $deviceType)
    {
        $message = 'Please check your account.';
        $statusTxt = 'test';

        # API URL of FCM
        $fields = array (
            'registration_ids' => array (
                    $deviceToken
            ),
            'data' => array (
                'title'      => $statusTxt,
                'body'       => $message,
                'info'      =>  array(
                    'notificationType' => 'Update Status',
                ),
            )
        );
        $notification = array('title' => $statusTxt, 'text' => $message, 'sound' => 'default');
        $fieldsIos = array('to' => $deviceToken, 'notification' => $notification,'priority'=>'high');

        if($deviceType == 'ios') {
            $this->sendNotification($fieldsIos);
        } else {
            $this->sendNotification($fields);
        }
    }

    private function sendNotification($fields) 
    {
        $api_key = env('API_KEY');
        $url     = 'https://fcm.googleapis.com/fcm/send';
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $api_key;
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,
        "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}