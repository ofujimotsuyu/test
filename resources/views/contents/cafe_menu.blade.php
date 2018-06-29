@extends('layouts.app')

@section('content')
    <div class="bg-warning text-white"><h2>Cafeteria-Menus</h2></div>
    @foreach ($cafemenus as $cafemenu)
        <div class="cafe text-center col-xs-4">
            <img src="{{ asset('storage/avatar/' . $cafemenu->cafe_menu) }}" alt="aaaa" />
            <div>
                {{ $cafemenu->content }}
            </div>
            <div class="btn-group" role="group">
                @if (Auth::user()->id == 5)
                    {!! Form::open(['route' => ['cafe.destroy', $cafemenu->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        
    @endforeach
    @if(Auth::user()->id == 5)
    <div class="col-xs-12">
        <a href="{{ route('cafe.add', ['id' => Auth::user()->id]) }}">Add Cafe-Menu</a>
    </div>
    @endif
@endsection