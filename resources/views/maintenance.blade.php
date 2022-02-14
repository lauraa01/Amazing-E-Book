@extends('layouts.master')

@section('title', 'Account Maintenance')

@section('content')
    <div class="container">
        <div class="manage-user">
            <table class="table border">
                <thead>
                    <tr>
                        <td>{{ __('home.account') }}</td>
                        <td>{{ __('home.action') }}</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $data)
                        <tr>
                            <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} - {{ $data->role_desc }}</td>
                            <td>
                                <a href="viewrole/{{ $data['id'] }}">{{ __('Update Role') }}</a>
                            </td>
                            <td>
                                <a href="deleteUser/{{ $data['id'] }}">{{ __('Delete') }}</a>
                            </td>
                        </tr>
                        @empty
                        <td id="datanotfound" colspan="6">No account found ...</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
