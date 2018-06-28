@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/*/watched') ? 'active' : '' }}"><a href="{{ route('users.watched', ['id' => $user->id]) }}">Watched</a></li>
                <li role="presentation" class="{{ Request::is('users/*/want_to_watch') ? 'active' : '' }}"><a href="{{ route('users.want_to_watch', ['id' => $user->id]) }}">Marked</a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favorites') ? 'active' : '' }}"><a href="{{ route('users.favorites', ['id' => $user->id]) }}">Favorites <span class="badge">{{ $count_favorites }}</span></a></li>
            </ul>
            @if (Auth::user()->id==$user->id)
                {!! Form::open(['route' => 'filmposts.store','files' => true ]) !!}
                
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert_danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

                <div class='form-group'>
                    {!! Form::label('status', 'Status', ['class' => 'control_label']) !!}<br>
                    {!! Form::radio('status', 'Watched') !!}Watched<br>
                    {!! Form::radio('status', 'Want to Watch') !!}Want to Watch
                </div>
                <div class='form-group'>
                    
                    {!! Form::label('content', 'Review', ['class' => 'control_label']) !!}<br>
                    <script type="text/javascript" src="js/review.js"></script>
                    <div class="range-group">
                        <input type="range" min="1" max="5" value="" class="input-range" />  
                    </div>
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                    
                </div>
                <div class='form-group'>
                    {!! Form::label('avatar_filename', 'image upload', ['class' => 'control_label']) !!}
                    {!! Form::file('avatar_filename') !!}
                </div>
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}<br>
            @endif
            @if (count($filmposts) > 0)
                @include('filmposts.filmposts', ['filmposts' => $filmposts])
            @endif
        </div>
    </div>
@endsection