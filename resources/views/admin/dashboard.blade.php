@extends('layouts.dashboard')
@section('content')
    <div>
        Life is available only in the present moment. - Thich Nhat Hanh
        <h2>hallo {{ auth()->user()->name }}</h2>
        <a href="{{ url('logout') }}">Logout</a>
    </div>
@endsection
