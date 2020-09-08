@extends('layouts.views.master')
@section('content')
    <h1>Messages</h1>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="contact-wrapper">
                <ul class="contacts-list">
                    @foreach($users as $user)
                    <li class="clicked_user" id="{{$user->id}}">
                        <a href="#">
                        
                        <img class="contacts-list-img" src="">
                        <div class="contacts-list-info">
                            <span class="contacts-list-name text-muted">
                            {{$user->name}}
                            <small class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">{{$user->email}}</span>
                            @if($user->unread)
                            <span class="badge badge-danger pending float-right">{{$user->unread}}</span>
                            @endif
                        </div>
                        </a>
                    </li> 
                    @endforeach
                </ul>
            </div>
            <div class="my_id" id="{{Auth::user()->id}}"></div>
        </div>
        <div class="col-lg-8 pl-2">
           <div class="" id="messages"></div>           
        </div>  
    </div>

    <audio src="{{asset('notif/chat.mp3')}}" id="pop_chat"></audio>
@endsection
