<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Message;
use App\Mail\MessagesMail;
use Illuminate\Http\Request;
use App\Notifications\Messages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreMessageRequest;
use Illuminate\Support\Facades\Notification;

class MessagesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages=Message::get();
       return view('dashboard.messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    { 
        if(Auth::check())
      {
        $message = $request->validated();
        Message::create($message);
        $get_messages=Message::latest()->first();
        $user =User::get();
        Notification::send($user,new Messages($get_messages));
        Mail::to('neamaabdelzaher61@gmail.com')->send(new MessagesMail($message));
        
    $notification_message = array(
        'message_id' => 'your message send successfully ',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification_message);

    

    }
 else{

   
    $notification_message = array(
        'message_id' => 'join us to send your messages ',
        'alert-type' => 'warning'
    );
    return redirect()->back()->with($notification_message);

 }


}

    /**
     * Display the specified resource.
     */
    public function show(string $id )
    { 
        $message=Message::findOrFail($id);
        // return dd($id);
        $notification_id=DB::table('notifications')->where('data->message_id',$id)->pluck('id')->first();
        // return dd($notification_id);
        DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>now()]);
        return view('dashboard.messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function markAsRead()
    {
       $user_id=auth()->User()->id;
       $user=User::findOrFail($user_id);
       $user->unreadNotifications->markAsRead();

       $notification_message = array(
        'message_id' => 'All Messages Mark as read successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification_message);


     

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification_id=DB::table('notifications')->where('data->message_id',$id)->pluck('id')->first();
       $test=DB::table('notifications')->where('id',$notification_id)->pluck('read_at')->first();
       if( $test !=0){
     $message=Message::findOrFail($id);
    $message->where('id',$id)->delete();
        
    return redirect()->route('dashboard.messages.index')->with('success', 'Operation Successfully');
       }

       else{

        return redirect()->route('dashboard.messages.index')->with('fail', 'can not delete unread message');


       }
   
    

    }

   
}
