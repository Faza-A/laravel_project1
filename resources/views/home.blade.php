@extends('layouts.template')
@section('title','dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}

                @guest

                    Login First <a href="/login">here</a>
          
                @else
                    You are logged in!
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection