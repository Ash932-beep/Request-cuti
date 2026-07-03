@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card">

            <div class="card-header">
                <h3>Login</h3>
            </div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="card-body">

                @if($errors->any())

                    <div class="alert alert-danger">

                        {{ $errors->first() }}

                    </div>

                @endif

                <form method="POST" action="/login">

                    @csrf

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}">

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <button class="btn btn-primary w-100">
                        Login
                    </button>
                    <hr>

<p class="text-center">
    Don't have an account?
    <a href="/register">Register Here</a>
</p>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection