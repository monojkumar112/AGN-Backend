@extends('layouts.backend.backend-layouts')
@section('page-title','Backup Management || Admin')
@push('page-css')
<style>
  .avater img{
    object-fit: cover;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
</style>
@endpush
@section('page-content')
  <div class="content">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Backup Management</h5>
                            <a href="{{ route('admin.backup.download') }}" class="btn btn-primary">Backup Now</a>
                        </div>

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Size</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($backups as $backup)
                                            <tr>
                                                <td>{{ basename($backup->path()) }}</td>
                                                <td>{{ number_format($backup->sizeInBytes() / 1024 / 1024, 2) }} MB</td>
                                                <td>{{ $backup->date()->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.backup.download.specific', basename($backup->path())) }}"
                                                        class="btn btn-sm btn-success">
                                                            Download <i class="fa fa-download"></i>
                                                        </a>
                                                        <form action="{{ route('admin.backup.delete', basename($backup->path())) }}"
                                                            method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete this backup?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger ms-2">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No backups found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
