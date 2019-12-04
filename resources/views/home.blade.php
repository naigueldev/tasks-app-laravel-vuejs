@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="content-buttons d-flex justify-content-center">
                        <a href="{{ url('/tasks-app') }}" class="btn btn-success">TASKS APP</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
