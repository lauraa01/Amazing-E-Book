@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="book-list">
    <table class="table border table-striped table-hover mt-5" cellpadding="10" width="100%">
        <thead>
            <tr>
                <td>{{ __('home.author') }}</td>
                <td>{{ __('home.title') }}</td>
            </tr>
        </thead>

        <tbody>
            @forelse($book as $book)
            <tr>
                <td>{{ $book->author }}</td>
                <td> <a href="bookdetail/{{ $book['title'] }}">{{ $book->title }}</a> </td>
            </tr>

            @empty
            <td colspan="2">No data...</td>
            @endforelse

        </tbody>
    </table>

</div>

@endsection
