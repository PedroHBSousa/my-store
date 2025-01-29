@extends('layouts.default')

@section('title', 'User')

@section('content')
    <h2>{{ $user->name }}</h2>
    <h2>{{ $user->email }}</h2>
@endsection
