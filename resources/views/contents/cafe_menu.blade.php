@extends('layouts.app')

@section('content')
    @foreach ($cafemenus as $cafemenu)
        <div class="cafe col-xs-4 text-center">
            <img src="{{ asset('storage/avatar/' . $cafemenu->cafe_menu) }}" alt="aaaa" />
            <div>
                {{ $cafemenu->content }}
            </div>
            <div class="btn-group" role="group">
                @if (Auth::user()->id == $cafemenu->user_id)
                    {!! Form::open(['route' => ['cafe.destroy', $cafemenu->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        
    @endforeach
    @if(Auth::user()->id == $cafemenu->user_id)
    <div class="col-xs-12">
        <a href="{{ route('cafe.add', ['id' => Auth::user()->id]) }}">Add Cafe-Menu</a>
    </div>
    @endif
@endsection