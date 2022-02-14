@extends('layouts.master')

@section('title', 'Update Role')

@section('content')
<div class="container">
    @forelse ($data as $data)
        <div class="akun">
            {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}
        </div>

        <form action="/updaterole/{{ $data->id }}" class="container-fluid">
            <div class="row mb-3 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="role_id">Role:</label>
                <select class="form-control" name="role_id">
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <div class="save">
                <button type="submit" class="btn btn-warning">Save</button>
            </div>

        </form>
        @empty
        <td id="datanotfound" colspan="6">No account found ...</td>
    @endforelse
</div>
@endsection
