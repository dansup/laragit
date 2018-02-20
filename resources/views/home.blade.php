@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back, {{Auth::user()->name}}
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">Repositories</div>
                <ul class="list-group list-group-flush">
                    @if(Auth::user()->repositories()->count() == 0)
                    <li class="list-group-item">No projects found!</li>
                    @else
                     @foreach(Auth::user()->repositories as $repo)
                    <li class="list-group-item"><a href="{{$repo->url()}}">{{$repo->slug}}</a></li>
                     @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
