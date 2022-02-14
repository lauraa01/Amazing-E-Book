@extends('layouts.master')

@section('title', 'Cart')

@section('content')
<div class="container">
    <h5 class="mt-5">Title</h5>

    <table class="table border table-striped table-hover" cellpadding="10">
        @forelse ($carts as $c)
            <tr>
                <td>{{ $c->title }}</td>
                <td><a href="/cart/delete/{{ $c->ebook_id }}" onclick="return confirm('Hapus data?')">Delete</a></td>
            </tr>
            @empty
            <td id="datanotfound" colspan="6">No data found ...</td>
        @endforelse
        <tr>
            <td colspan="2">
            </td>
        </tr>
    </table>
        <div class="submit">
            <a href="cart/submit" class="btn btn-warning" style="margin-left: 80%;">Submit</a>
        </div>

</div>
@endsection
