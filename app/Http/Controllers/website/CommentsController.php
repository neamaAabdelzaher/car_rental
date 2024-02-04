<?php

namespace App\Http\Controllers\website;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\RedirectResponse;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $comment=$request->validate([
        "name"=> 'required|max:50',
        'email'=> 'required|email',
        'body'=> 'required|max:300|min:5',
       ]);

       $comment['user_id']=auth()->user()->id;
       $comment['car_id']=$request->car_id;

       Comment::create($comment);
       return redirect()->back();
    }

    public function reply(Request $request)
    {
    //   return dd($request);
       $reply=$request->validate([
        'body'=> 'required|max:200|min:5',
       ]);

       $reply['user_id']=auth()->user()->id;
       $reply['name']=auth()->user()->name;
       $reply['comment_id']=$request->comment_id;
       Reply::create($reply);
       return redirect()->back();

    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
