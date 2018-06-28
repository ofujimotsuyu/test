@extends('layouts.app')

@section('content')

@if (Auth::check())

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

    </div>
</div>
    </div>
</div>
</div>    
    
    
    
@else
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>pinterest....??</h1>
               
                
                {!! link_to_route('signup.get', 'Sign up', null, ['class' => "square_btn"]) !!}<br>
                <!--<a href="#" class="square_btn">Log in</a>-->
                 {!! link_to_route('login', 'Login ', null, ['class' => "square_btn"]) !!}<br>
                 
                <!--{!! link_to_route('users.post', 'post ', null, ['class' => "square_btn"]) !!}<br>-->
                 
            
            </div>
        </div>
    </div>
 @endif

@endsection







@section('content')
    <!--テスト-->
@endsection