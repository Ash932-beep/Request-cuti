@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3>Create Account</h3>
            </div>

            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register">

                    @csrf

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-success w-100">
                        Register
                    </button>

                </form>

                <hr>

                <p class="text-center">
                    Already have an account?
                    <a href="/login">Login</a>
                </p>

            </div>

        </div>

    </div>

</div>

@endsection