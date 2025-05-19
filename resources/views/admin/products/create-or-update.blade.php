@extends('layouts.backend.backend-layouts')


@section('page-title','Blog-Create Admin')
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
    /* redio  dev css  */
    .radio-container {
        cursor: pointer;
        transition: border-color 0.2s;
        margin-right: 10px;
    }
    .radio-container:hover{
       cursor: pointer;
    }

    .form-check-input:checked + label {
        font-weight: bold;
    }
    .form-check-input:checked:hover{
        cursor: pointer;
    }

    .form-check-input:checked ~ .form-check-label,
    .form-check input:checked {
        color: #1bb99a;
    }

    /* This makes the parent div's border red when radio is checked */
    .radio-container:has(input:checked) {
        border-color: #1bb99a  !important;
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
                        <h4 class="page-title float-left new-clg"><i class="zmdi zmdi-blogger"></i> Product
                            {{ isset($product) ? 'Edit' : 'Create' }}</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-danger">
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
                    action="{{ isset($product) ? route('admin.products.update',$product->id) : route('admin.products.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($product)
                    @method('PUT')
                    @endisset
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="name">Product Name <span class="text-danger"><b>*</b></span>
                                                <span class="text-muted">Max char: 255</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $product->name ?? old('name') }}" id="name" name="name"
                                                required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label for="link">Product Link <span class="text-danger"><b>*</b></span>
                                                <span class="text-muted">Max char: 255</span></label>
                                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                                value="{{ $product->link ?? old('link') }}" id="link" name="link"
                                                required>
                                            @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group">

                                            <div class="d-flex ">
                                                <div class="form-check  border border-1 p-2 radio-container">
                                                    <input class="form-check-input d-none" type="radio" name="app_status"
                                                        id="exampleRadios1" value="web" @isset($product)
                                                            {{ $product->app_status == 'web' ? 'checked' : '' }}
                                                        @endisset>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Web App <i class="zmdi zmdi-globe-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="form-check border border-1 p-2 radio-container">
                                                    <input class="form-check-input d-none" type="radio" name="app_status"
                                                        id="exampleRadios2" value="mobile" @isset($product)
                                                            {{ $product->app_status == 'mobile' ? 'checked' : '' }}
                                                        @endisset>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Mobile App <i  class="zmdi zmdi-android"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            @error('app_status')
                                            <div class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror

                                        </fieldset>

                                    </div>

                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="image">Upload Product Image <span
                                                    class="text-danger"><b>*</b></span> <span
                                                    class="text-muted">Max-Size 1MB</span></label>
                                            <input type="file" name="image" id="image" class="dropify"
                                                data-default-file="{{ isset($product) ? asset('assets/frontend/img/products/'. $product->image) : '' }}"
                                                data-max-file-size="1M" />
                                        </fieldset>
                                        @error('image')
                                            <div class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    @isset($product)
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
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 450,
        });
    });

</script>

<script>
    document.querySelectorAll('input[name="app_status"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove red border from all containers
            document.querySelectorAll('.radio-container').forEach(container => {
                container.style.borderColor = '';
            });
            // Add red border to selected container
            if (this.checked) {
                this.closest('.radio-container').style.borderColor = 'red';
            }
        });
    });
</script>
@endpush
