@extends('layouts.backend.backend-layouts')
@section('page-title','Course-Create | Admin')
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
  .page-title-box{
    padding: 14px 20px !important;
  }
  textarea{
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
              <h4 class="page-title float-left new-clg"><i class="zmdi zmdi-book"></i> Course {{ isset($course) ? 'Edit' : 'Create' }}</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.course.index') }}" class="btn btn-danger">
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
          <form id="roleFrom" role="form" method="POST" action="{{ isset($course) ? route('admin.course.update',$course->id) : route('admin.course.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($course)
              @method('PUT')
            @endisset
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card-box">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset class="form-group">
                        <label for="name">Course Name <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char: 255</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $course->name ?? old('name') }}" id="name" name="name"  maxlength="255" placeholder="Enter your course name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </fieldset>

                      <fieldset class="form-group">
                        <label for="s-description">Message <span class="text-success"><b>(Optional)</b></span> <span class="text-muted">Max char: 255</span></label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="s-description" rows="4" maxlength="255"  placeholder="Write you message...">{{ $course->message ?? old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </fieldset>

                        <fieldset class="form-group">
                            <label for="total_time">Total Time <span class="text-danger"><b>*</b></span></label>
                            <input type="text" class="form-control @error('total_time') is-invalid @enderror" value="{{ $course->total_time ?? old('total_time') }}" id="total_time" name="total_time"  maxlength="255" placeholder="Enter your total time">
                            @error('total_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="blog-img">
                        <label for="image">Upload Course Image <span class="text-danger"><b>*</b></span> <span class="text-muted">Max-Size 1MB</span></label>
                        <input type="file" name="image" id="image" class="dropify  @error('image') is-invalid @enderror" data-default-file="{{ isset($course) ? asset('storage/'. $course->image) : '' }}" data-max-file-size="1M" />
                      </fieldset>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="s-description">Course Duration <span class="text-success"><b>(Optional)</b></span> <span    class="text-muted">Max char: 255</span></label>
                            <textarea class="form-control @error('duration') is-invalid @enderror" name="duration" id="s-description" rows="4"  maxlength="255" >{{ $course->duration ?? old('duration') }}</textarea>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="s-description">Course Summary <span class="text-success"><b>(Optional)</b></span> <span    class="text-muted">Max char: 255</span></label>
                            <textarea class="form-control @error('course_summary') is-invalid @enderror" name="course_summary" id="s-description" rows="4" maxlength="255" >{{ $course->course_summary ?? old('course_summary') }}</textarea>
                            @error('course_summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="price">Price <span class="text-danger"><b>*</b></span></label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ $course->price ?? old('price') }}" id="price" name="price"  placeholder="Enter your course price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="discount_price">Discount Price <span class="text-success"><b>(Optional)</b></span></label>
                            <input type="number" class="form-control @error('discount_price') is-invalid @enderror" value="{{ $course->discount_price ?? old('discount_price') }}" id="discount_price" name="discount_price"  placeholder="Enter your course discount price">
                            @error('discount_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </fieldset>
                    </div>
                  </div>



                  <fieldset class="form-group">
                    <label>Short Description <span class="text-danger"><b>*</b></span> </label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description">
                      @isset($course)
                        {!! $course->short_description !!}
                      @endisset
                    </textarea>
                    @error('short_description')
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </fieldset>

                  <fieldset class="form-group">
                    <label>Description <span class="text-danger"><b>*</b></span></label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" id="summernote" name="description">
                      @isset($course)
                        {!! $course->description !!}
                      @endisset
                    </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="switchery-demo m-t-20">
                      <input type="checkbox" @isset($course) {{ $course->status == true ? 'checked' : '' }} @endisset data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                      <label class="control-label" for="status">Status</label>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">
                    @isset($course)
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
      $('#short_description').summernote({
          height: 250,
      });
  });

  $(document).ready(function () {
      $('#summernote').summernote({
          height: 400,
      });
  });


</script>
@endpush
