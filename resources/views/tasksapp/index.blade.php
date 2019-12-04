@extends('layouts.app')

@section('content')
    
    <list-component user="{{ auth()->id() }}"></list-component>

@endsection