@extends('layouts.dashboard.parent')
@section('page-title',' Message Details')
@section('title',' Message Details')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <h2>Full Name:{{$message->f_name." ".$message->l_name}} </h2>
        <br>
        <h2>Email:{{$message->email}} </h2>
         <br>
        <h2>Message Content:</h2>
        <p>{{$message->message}}</p>
      </div>
    </div>
  </div>
@endsection