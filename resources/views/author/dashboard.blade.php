@extends('layouts.author.author-layouts')
@section('page-title','author || dashboard')
@push('page-css')
<style>
    marquee{
        padding-top: 100px;
        font-size: 50px
    }
</style>
    
@endpush
@section('page-content')
    <!-- Logout End-->
    <a href="{{ route('logout') }}" class="btn btn-info btn-sm text-light" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <span>Logout</span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <!-- Logout End-->

    <div class="d-flex justify-content-center align-items-center">
        <div class="marque">
            <marquee>Implement the author's dashboard here :(</marquee>
        </div>
    </div>
@endsection
@push('page-js')
    
@endpush