<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return view('dashboard/notification/form');
    }

 
    public function storeToken(Request $request){
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $req){

        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = "AAAAAH_xXxw:APA91bFoFU5bcAZ1lT-hKtLex6avsX3QGRSnkzMEzL84N7lpjkWegGBYDzUzA3a0jlkTYn1OhnUpHOSxu3JwT9dDFW5Z-sDLoz60OETx_jwXCjWBHnITjrcKJhsloYF3EGCP-4RfWvSz";
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $req->id,'status'=>"done");
        $notification = array('title' =>$req->title, 'body' => $req->body, 'sound' => 'default');
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );

        curl_close ( $ch );

        session()->flash('notificationCreated','تم ارسال الاشعار بنجاح');
        return redirect()->back();
    }
}
