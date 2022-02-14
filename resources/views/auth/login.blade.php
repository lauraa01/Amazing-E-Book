@extends('layouts.app')

@section('title', 'Login')

@section('content')
@if (session('success'))
<div class="row">
    <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<div class="container">
    <h1><u>{{ __('Login') }}</u></h1>
    @error('login')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <table cellpadding="10">
            <tr>
                <td><label for="email">{{ __('profile.email address') }}:</label></td>
                <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></td>
            </tr>
            @error('email')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </td>
                </tr>
            @enderror

            <tr>
                <td><label for="password">{{ __('profile.password') }}:</label></td>
                <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"></td>
            </tr>
            @error('password')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </td>
                </tr>
            @enderror

            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-warning" style="margin: 5% 2% 0 30%;">
                        {{ __('Submit') }}
                    </button> <br>
                    <a href="register">
                        {{ __('home.sign up') }}
                    </a>
                </td>
            </tr>
        </table>
    </form>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        <p class="text-center">
                            <a href="register">
                                Don't have an account? click here to sign up
                            </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
