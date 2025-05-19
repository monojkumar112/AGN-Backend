@extends('layouts.backend.backend-layouts')
@section('page-title','Contact-Us | Show')
@push('page-css')
<style>
    .card-wrap{
        display: flex;
        padding-bottom: 15px;
    }
    .title{
        width: 40%;
    }
    .card-body .body{
        width: 60%;
    }
    </style>
@endpush
@section('page-content')


<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Contact Show</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Achia</a></li>
                        <li class="breadcrumb-item active"><a href="#">Contact Show</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- container -->
</div>
<!-- content -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-title bg-dark text-light text-center py-3">
                    <h3 class="m-0">Contact Details</h3>
                </div>
                <div class="card-body">
                    <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Name<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->name }}</p>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Company<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->company }}</p>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Email<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->email }}</p>
                        </div>
                    </div>
                    {{-- <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Phone Number<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->phone }}</p>
                        </div>
                    </div> --}}
                    <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Subject<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->subject }}</p>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="title pr-2">
                            <h6 class="p-0 m-0">Message<span class="float-right">:</span></h6>
                        </div>
                        <div class="body">
                            <p class="p-0 m-0">{{ $contact->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page-js')
@endpush
