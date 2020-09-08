<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Student\HelperMessage;
use App\User;
use App\Message;
use Auth;
use Pusher;
use DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function messenger() 
    {
        $users = DB::select('select users.id, users.name, users.email, count(is_read) as unread 
        from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = '.Auth::user()->id.'
        where users.id != '.Auth::user()->id.'
        group by users.id, users.name, users.email
        ');
        return view('student.messenger.messenger',compact('users'));
    }

    public function getMessage($id) 
    {
        $my_id = Auth::user()->id;
        Message::where([
            'from'  =>  $id,
            'to'   =>   $my_id   
        ])->update(['is_read'   => 1]);

        $messages = Message::where(function($query) use ($id, $my_id) 
        {
            $query->where('from',$my_id)->where('to',$id);
        })->orWhere(function($query) use ($id, $my_id)
        {
            $query->where('from',$id)->where('to',$my_id);
        })->get();

        return response()->json(['data' => HelperMessage::displayMessage($messages,$id)]);
    }

    public function message()
    {
        $data = Message::create([
            'from'  =>  Auth::user()->id,
            'to'    =>  request('id'),
            'message'   =>  request('message'),
            'is_read'   => 0
        ]);      
        
        
        $option = array(
            'cluster'   => 'ap1',
            'useTLS'    =>  true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $option
        );
        $data = [
            'from'  =>  $data->from,
            'to'    =>  $data->to
        ];

        $pusher->trigger('message-channel','message-event', $data);
    }  
}
