<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StatusLiked;
use Pusher\Pusher;

class TestController extends Controller
{

    public function sendNotification() {
        $options = [ 'cluster' => env('PUSHER_APP_CLUSTER'),
                     'encrypted' => true,
                     'useTLS' => true,
                ];
        $pusher = new Pusher(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'),
                            env('PUSHER_APP_ID'), 
                            $options
                        );


        $data['message'] = 'hello world '. date('Y-m-d H:i:s a');
        $pusher->trigger('my-channel', 'my-event', $data);    
    }


    public function test() {
        $arr = [
            'msg' => 'Test data',
            'version' => 2
        ];
        event(new StatusLiked($arr));
        return "Event has been sent!";
    }

    public function index() {
        return view('real-time');
    }
}
