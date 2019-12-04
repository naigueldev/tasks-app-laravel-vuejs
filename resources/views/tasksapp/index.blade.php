@extends('layouts.app')

@section('content')
    
    <list-component user="{{ auth()->id() }}" token="{{ $user->api_token }}"></list-component>

@endsection