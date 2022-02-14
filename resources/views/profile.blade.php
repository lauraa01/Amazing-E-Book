@extends('layouts.master')

@section('title', 'Profile')

@section('content')
<form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        @foreach($profile as $p)
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img src="{{ Storage::url($p->display_picture_link) }}" class="card-img-top" width="150px" alt="...">
                    </div>
                    <div class="col">
                        <table cellpadding="10">
                            <tr>
                                <td><label for="first_name">{{ __('First Name') }}</label></td>
                                <td><input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $p->first_name }}" required autocomplete="name" autofocus></td>
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
                                <td><label for="last_name">{{ __('Last Name') }}</label></td>
                                <td><input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $p->last_name }}" required autocomplete="name" autofocus></td>
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
                                <td><label for="gender_id">{{ __('Gender') }}</label></td>
                                <td>
                                    <input type="radio" id="male" name="gender_id" value="1" {{$p->gender_id == 1? 'checked' : ''}}>
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender_id" value="2" {{$p->gender_id == 2? 'checked' : ''}}>
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
                                <td><label for="password">{{ __('Password') }}</label></td>
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
                </div>
            </div>
            <div class="col">
                <table cellpadding="10">
                    <tr>
                        <td><label for="middle_name">{{ __('Middle Name') }}</label></td>
                        <td><input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ $p->middle_name }}"></td>
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
                        <td><label for="email">{{ __('Email Address') }}</label></td>
                        <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $p->email }}" required autocomplete="email"></td>
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
                        <td><label for="role_id">Role</label></td>
                        <td><input type="text" readonly value="{{ $p->role_desc }}" class="form-control"></td>
                    </tr>

                    <tr>
                        <td><label for="display_picture_link">{{ __('Display Picture') }}</label></td>
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
        <div class="submit">
            <a href="profile/submit" class="btn btn-warning" style="margin: 3% 40%">{{ __('Save') }}</a>
        </div>
    </div>
</form>

@endforeach

@endsection
