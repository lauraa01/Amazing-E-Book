@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')

<div class="container">
    <h1 class="mt-3 u"><u>{{ __('Sign Up') }}</u></h1>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                    <table cellpadding="10">
                        <tr>
                            <td><label for="first_name">{{ __('First Name') }}:</label></td>
                            <td><input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus></td>
                        </tr>
                        @error('first_name')
                            <tr>
                                <td colspan="2">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </td>
                            </tr>
                        @enderror

                        <tr>
                            <td><label for="last_name">{{ __('Last Name') }}:</label></td>
                            <td><input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus></td>
                        </tr>
                        @error('last_name')
                            <tr>
                                <td colspan="2">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </td>
                            </tr>
                        @enderror

                        <tr>
                            <td><label for="gender_id">{{ __('Gender') }}:</label></td>
                            <td>
                                <input type="radio" id="male" name="gender_id" value="1" style="margin-left: 5%;">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender_id" value="2" style="margin-left: 5%;">
                                <label for="female">Female</label>
                            </td>
                        </tr>
                        @error('gender_id')
                            <tr>
                                <td colspan="2">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </td>
                            </tr>
                        @enderror

                        <tr>
                            <td><label for="password">{{ __('Password') }}:</label></td>
                            <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"></td>
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
                    </table>
            </div>

            <div class="col">
                <table cellpadding="10">
                    <tr>
                        <td><label for="middle_name">{{ __('Middle Name') }}:</label></td>
                        <td><input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}"></td>
                    </tr>
                    @error('middle_name')
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            </td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="email">{{ __('Email Address') }}:</label></td>
                        <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"></td>
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
                        <td><label for="role_id">{{ __('Role') }}:</label></td>
                        <td>
                            <select class="form-control" name="role_id">
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </td>
                    </tr>
                    @error('role_id')
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            </td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="display_picture_link">{{ __('Display Picture') }}:</label></td>
                        <td><input type="file" name="display_picture_link" style="margin-left: 5%"></td>
                    </tr>
                    @error('display_picture_link')
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            </td>
                        </tr>
                    @enderror
                </table>
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-warning">
                {{ __('Submit') }}
            </button><br>
            <a href="/login">Already have an account? click here to login</a>
        </div>
    </form>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sign Up') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender_id" class="col-md-4 control-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                            <input type="radio" id="male" name="gender_id" value="1">
                            <label for="male">Male</label> <br>
                            <input type="radio" id="female" name="gender_id" value="2">
                            <label for="female">Female</label>


                            @error('gender_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-4 control-label text-md-right">Role</label>

                            <div class="col-md-6">
                            <select class="form-control" name="role_id">
                              <option value="1">User</option>
                              <option value="2">Admin</option>
                            </select>

                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="display_picture_link" class="col-md-4 col-form-label text-md-right">{{ __('Display Picture') }}</label>
                            <input type="file" name="display_picture_link">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        <p class="text-center">
                            <a href="login">
                                Already have an account? click here to log in
                            </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
