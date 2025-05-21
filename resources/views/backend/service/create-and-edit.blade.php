@extends('layouts.backend.backend-layouts')
@section('page-title', 'slider-Create | Admin')

@push('page-css')
    <link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <div class="d-flex justify-content-between align-items-center text-muted">
                            <h4 class="page-title float-left new-clg">
                                <i class="zmdi zmdi-sliderger"></i> Service {{ isset($service) ? 'Edit' : 'Create' }}
                            </h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.service.index') }}" class="btn btn-danger">
                                        <i class="fa fa-arrow-circle-o-left"></i> <span>Back to list</span>
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form id="roleFrom" role="form" method="POST"
                        action="{{ isset($service) ? route('admin.service.update', $service->id) : route('admin.service.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($service)
                            @method('PUT')
                        @endisset

                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="name">Title <span
                                                        class="text-danger"><b>*</b></span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $service->name ?? old('name') }}" id="name"
                                                    name="name" required>
                                                @error('name')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label>Service List <span class="text-danger"><b>*</b></span></label>

                                                @php
                                                    $services = old(
                                                        'service',
                                                        isset($service) ? json_decode($service->service, true) : [''],
                                                    );
                                                @endphp

                                                <div id="inputContainer">
                                                    @foreach ($services as $index => $value)
                                                        <div class="mb-2 d-flex">
                                                            <input type="text" name="service[]" class="form-control me-2"
                                                                value="{{ $value }}" placeholder="Enter service">
                                                            @if ($index > 0)
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm removeInput">Remove</button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <button type="button" id="addInput"
                                                    class="btn btn-sm btn-outline-primary mb-2">+ Add More</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Upload Service Image</label>
                                                <input id="image" class="dropify" name="image" type="file">
                                            </div>
                                            @if (!empty($service->image))
                                                <div class="mb-3">
                                                    <label class="form-label">Current Image</label><br>
                                                    <img src="{{ asset($service->image) }}" alt="Current Image"
                                                        style="max-width: 200px; height: auto;">
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="btn_text">Button Text <span
                                                        class="text-danger"><b>*</b></span></label>
                                                <input type="text"
                                                    class="form-control @error('btn_text') is-invalid @enderror"
                                                    value="{{ $service->btn_text ?? old('btn_text') }}" id="btn_text"
                                                    name="btn_text" required>
                                                @error('btn_text')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="btn_slug">Button Slug <span
                                                        class="text-danger"><b>*</b></span></label>
                                                <input type="text"
                                                    class="form-control @error('btn_slug') is-invalid @enderror"
                                                    value="{{ $service->btn_slug ?? old('btn_slug') }}" id="btn_slug"
                                                    name="btn_slug" required>
                                                @error('btn_slug')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>

                                    <fieldset class="form-group">
                                        <div class="switchery-demo m-t-20">
                                            <input type="checkbox"
                                                @isset($service) {{ $service->status ? 'checked' : '' }} @endisset
                                                data-plugin="switchery" id="status" name="status" data-color="#1bb99a"
                                                data-size="small" />
                                            <label class="control-label" for="status">Status</label>
                                        </div>
                                    </fieldset>

                                    <button type="submit" class="btn btn-success">
                                        @isset($service)
                                            <i class="fa fa-arrow-circle-o-up"></i> <span>Update</span>
                                        @else
                                            <i class="fa fa-plus-circle"></i> <span>Create</span>
                                        @endisset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/fileuploads/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something went wrong.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#addInput').click(function() {
                $('#inputContainer').append(`
                    <div class="mb-2 d-flex">
                        <input type="text" name="service[]" class="form-control me-2" placeholder="Enter service" />
                        <button type="button" class="btn btn-danger btn-sm removeInput">Remove</button>
                    </div>
                `);
            });

            $('#inputContainer').on('click', '.removeInput', function() {
                $(this).closest('div').remove();
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
