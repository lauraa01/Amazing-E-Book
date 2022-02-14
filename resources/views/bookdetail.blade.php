@extends('layouts.master')

@section('title', 'Book Detail')

@section('content')

@foreach ($details as $det)
<div class="detail">
    <h5 class="mt-5"><u>Ebook Detail</u></h5>

    <table class="book-detail" cellpadding="20">
        <tr>
            <td>{{ __('home.title') }}:  {{$det->title}}</td>
        </tr>
        <tr>
            <td>{{ __('home.author') }}: {{$det->author}}</td>
        </tr>
        <tr>
            <td>{{ __('home.description') }}: <br> {{$det->description}}</td>
        </tr>
    </table>

    <div class="add-to-cart">
        <a href="rent/{{ $det->ebook_id }}"class="btn btn-warning" style="margin-left: 80%; padding: 1% 3%;">
            {{ __('home.rent') }}
        </a>
    </div>
</div>
@endforeach

@endsection
