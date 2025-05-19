@extends('layouts.backend.backend-layouts')
@section('page-title','index')
@push('page-css')
<style>
    .profile-setting{
        background: white;
        padding: 40px 20px;
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
                        <h4 class="page-title float-left">Account Page</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div>
    <!-- content -->
    <div class="container-fluid">
        <div class="profile-setting m-t-20">
            <h4 class="header-title m-t-0 m-b-30">Hey!<strong class="px-2">{{ Auth::user()->name }}</strong>Your Account & Security Info Is Here</h4>
            <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                        role="tab" aria-controls="home" aria-expanded="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                        role="tab" aria-controls="profile">Password</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div role="tabpanel" class="tab-pane fade in active show" id="home"
                        aria-labelledby="home-tab">
                    <div class="col-xl-8 m-t-sm-40 m-t-20">
                        <h4 class="header-title m-t-0 m-b-30">Account</h4>
                        <form method="POST" action="{{ route('admin.account.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 form-control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" value="{{ Auth::user()->name }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 form-control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="password" name="email"
                                            placeholder="Email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                    <div class="col-xl-8 m-t-sm-40 m-t-20">
                        <h4 class="header-title m-t-0 m-b-30">Password</h4>
                        <form method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="old_password"
                                        class="col-sm-2 form-control-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="old_password"
                                            placeholder="Enter Old Password" name="old_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 form-control-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password"
                                            placeholder="Enter New Password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-sm-2 form-control-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Enter Confirmation Password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@push('page-js')
    
@endpush