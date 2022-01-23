@extends('layouts.main')

@section('content')
<div class="row login" style="margin-bottom: 80px;">
    <div class="col-sm-12 text-center">
        <div class="logo-image" style="margin-top: 50px; margin-bottom: 30px;">
            <img src="{{ asset(config('constants.app.logo')) }}" width=160 height="auto" />
        </div>

        <div class="mb-15">
            <h1 class=""><strong> {{config('app.name')}} </strong></h1>
        </div>

        @if(!Auth::check())
        <div class="signin mt-15">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter Email"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password"/>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="signin"> Sign in </button>
                <span> Or <a href="javascript:;" data-target="#registerModal" data-toggle="modal">Sign up with email</a> </span>
            </div>
        </div>
        @else
        <a href="/logout" class="btn btn-primary"> Logout </a>
        @endif
    </div>
</div>

<!-- register modal included -->
@include('auth.register')
@endsection

@push('post-scripts')
<script src="{{ asset('js/login.js') }}"></script>
<script>
    @if(!Auth::check())
    document.getElementById('signin').addEventListener('click', function(){
        login("{{route('login-post')}}",
            {
                email: document.getElementsByName('email')[0].value, 
                password: document.getElementsByName('password')[0].value
            }
        );
    });
    @endif

    document.getElementById('signup').addEventListener('click', function(){
        register("{{route('register')}}",
            {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            }
        );
    });
</script>
@endpush