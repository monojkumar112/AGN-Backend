@extends('layouts.backend.backend-layouts')
@section('page-title','admin || Speaking')
@push('page-css')

<!-- Summernote Css CDN -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
{{-- testimonial css  --}}
  <style>

    .form-container {
      padding: 15px;
      background-color: #ffffff;
      border-radius: 10px;
    }
    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .form-control {
      border-radius: 5px;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .description-cell {
        max-width: 300px; /* Adjust the width as needed */
        overflow-x: auto;
        white-space: nowrap; /* Prevent text from wrapping */
    }

  </style>

  <!-- DataTables -->
<link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Form Uploads -->
<link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('page-content')
    <div class="content">
        <div class="container-fluid">


        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <form action="{{ route('admin.speaking-watch.update', $watch_data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex justify-content-between mb-2 mt-2">
                <h2>Watch Now</h2>
                <div>
                <button type="submit" class="btn btn-dark btn-sm">Save</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                <fieldset>
                    <label for="title">Title <span class="text-danger"><b>*</b></span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $watch_data->title ?? '') }}" placeholder="Write title here">
                </fieldset>
                @error('title')
                    <div class="text-danger">
                    <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <fieldset>
                    <label for="video">Video Embedded<span class="text-danger"><b>*</b></span></label>
                    <textarea class="form-control" rows="5" name="video" placeholder="Give video Embedded code">{{ old('video', $watch_data->video ?? '') }}</textarea>
                </fieldset>
                @error('video')
                    <div class="text-danger">
                    <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
                <div class="col-md-4">
                <div class="">
                    {{-- images --}}
                    <fieldset>
                    <label for="image">Upload Product Image <span class="text-danger"><b>*</b></span> <span class="text-muted">Max-Size 2MB</span></label>
                    <input type="file" name="image" id="image" class="dropify" data-default-file="{{ isset($watch_data->image) ? asset('storage/' . $watch_data->image) : '' }}" data-max-file-size="1M" />
                    </fieldset>
                    @error('image')
                    <div class="text-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror

                </div>
                </div>
            </div>

            <div>
                <label for="description">Description <span class="text-danger"><b>*</b></span></label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $watch_data->description ?? '') }}</textarea>
            </div>
            </form>
        </div>



        </div>
    </div>
@endsection


@push('page-js')
<!-- Summernote Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('#description').summernote({
                    height: 250,
                    toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['fontsize', ['fontsize']], // Added fontsize option
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                    ]
            });
    });
</script>

{{-- image upload  --}}
    <!-- Switchery -->
    <script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>
    <!-- file uploads js -->
    <script src="{{ asset('assets/backend/plugins/fileuploads/js/dropify.min.js') }}"></script>
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

@endpush

