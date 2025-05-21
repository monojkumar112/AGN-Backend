@extends('layouts.backend.backend-layouts')
@section('page-title', 'slider-Create | Admin')
@push('page-css')
    <!-- Form Uploads -->
    <link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Switchery css -->
    <link href="{{ asset('assets/backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
    <!-- Summernote Css CDN -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .switchery-demo .switchery {
            margin-bottom: 5px;
        }

        .page-title-box {
            padding: 14px 20px !important;
        }

        textarea {
            height: 300px;
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
                        <div class="d-flex justify-content-between align-items-center text-muted">
                            <h4 class="page-title float-left new-clg"><i class="zmdi zmdi-sliderger"></i> Leadership Team
                                {{ isset($leadership) ? 'Edit' : 'Create' }}</h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.leadership.index') }}" class="btn btn-danger">
                                        <i class="fa fa-arrow-circle-o-left"></i>
                                        <span>Back to list</span>
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <form id="roleFrom" role="form" method="POST"
                        action="{{ isset($leadership) ? route('admin.leadership.update', $leadership->id) : route('admin.leadership.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($leadership)
                            @method('PUT')
                        @endisset
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="name">Title <span class="text-danger"><b>*</b></span>
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $leadership->name ?? old('name') }}" id="name"
                                                    name="name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="designation">Designation <span
                                                        class="text-danger"><b>*</b></span>
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('designation') is-invalid @enderror"
                                                    value="{{ $leadership->designation ?? old('designation') }}"
                                                    id="designation" name="designation" required>
                                                @error('designation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="short_description">Short Description <span
                                                        class="text-danger"><b>*</b></span>
                                                </label>
                                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description"
                                                    name="short_description" required cols="30" rows="4">{{ $leadership->short_description ?? old('short_description') }}</textarea>

                                                @error('short_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Upload leadership Image </label>
                                                <input id="image" class="dropify" name="image" type="file">
                                            </div>
                                            @if (!empty($leadership->image))
                                                <div class="mb-3">
                                                    <label class="form-label">Current Image</label>
                                                    <br>
                                                    <img src="{{ asset($leadership->image) }}" alt="Current Image"
                                                        style="max-width: 200px; height: auto;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="switchery-demo m-t-20">
                                            <input type="checkbox"
                                                @isset($leadership) {{ $leadership->status == true ? 'checked' : '' }} @endisset
                                                data-plugin="switchery" id="status" name="status" data-color="#1bb99a"
                                                data-size="small" />
                                            <label class="control-label" for="status">Status</label>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-success">
                                        @isset($leadership)
                                            <i class="fa fa-arrow-circle-o-up"></i>
                                            <span>Update</span>
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            <span>Create</span>
                                        @endisset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div>
    <!-- content -->
@endsection
@push('page-js')
    <!-- Switchery -->
    <script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>
    <!-- file uploads js -->
    <script src="{{ asset('assets/backend/plugins/fileuploads/js/dropify.min.js') }}"></script>
    <!-- Summernote Js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250,
            });
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
