@extends('layouts.backend.backend-layouts')
@section('page-title', 'event-List || Admin')
@push('page-css')
    <!-- DataTables -->
    <link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .avater img {
            object-fit: cover;
        }

        .page-title-box {
            padding: 14px 20px !important;
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
                            <h4 class="page-title float-left">
                                <i class="zmdi zmdi-eventger"></i> Event Team
                            </h4>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.event.create') }}" class="btn btn-dark">
                                        <i class="fa fa-plus-circle"></i>
                                        <span>Create event</span>
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
                    <div class="card-box table-responsive">
                        <table id="responsive-datatable" class="table dt-responsive nowrap table-striped" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Logo</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ Str::words($event->name, 20, '[..]') }}</td>
                                        <td>{{ Str::words($event->designation, 30, '[..]') }}</td>
                                        <td>
                                            <img src="{{ $event->logo != null ? asset($event->logo) : asset('assets/application-default/img/gallery.jpg') }}"
                                                alt="" style="width: 80px;">

                                        </td>
                                        <td>
                                            <img src="{{ $event->image != null ? asset($event->image) : asset('assets/application-default/img/gallery.jpg') }}"
                                                alt="" style="width: 80px;">

                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $event->status == true ? 'badge-info' : 'badge-danger' }}">{{ $event->status == true ? 'Active' : 'Inactive' }}</span>
                                        </td>
                                        <td class="btn-group action-button">
                                            <a href="{{ route('admin.event.edit', $event->id) }}"
                                                class="btn btn-dark btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" onclick="deleteData({{ $event->id }})"
                                                class="btn btn-danger rounded-right btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <form id="delete-form-{{ $event->id }}"
                                                action="{{ route('admin.event.destroy', $event->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div>
    <!-- content -->
@endsection
@push('page-js')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Default Datatable
            $('#datatable').DataTable();
            // Responsive Datatable
            $('#responsive-datatable').DataTable();
        });
    </script>

    <!-- Sweet Aleart Js -->
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteData(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
