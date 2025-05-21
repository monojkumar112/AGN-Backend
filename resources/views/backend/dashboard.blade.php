@extends('layouts.backend.backend-layouts')
@section('page-title', 'admin||dashboard')
@push('page-css')
    <!-- DataTables -->
    <link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('page-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">AGN</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!-- end row -->
            {{-- popular section --}}
            <div class="mb-4 row">
                {{-- <h2 class="mb-4">✨📚Trending Blogs You Can't Miss! 🔥</h2> --}}
                {{-- <div class="col-xl-4 d-flex gap-4 col-md-6 ">
                    <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal"
                        data-bs-target="#popularInWeekend">
                        Popular This week
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-info">+{{ $popular_weekends->count() ?? '' }}
                        </span>
                    </button>

                    <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal"
                        data-bs-target="#popularInMonth">
                        Popular This Month
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-info">+{{ $popular_this_month->count() ?? '' }}
                        </span>
                    </button>
                </div> --}}
                {{-- input date picker  --}}
                {{-- <div class="col-8 mt-2 mt-md-2 mt-xl-0 col-xl-8" style="height: 36px;">
                    <form id="dataForm" action="{{ route('admin.popular.between') }}" method="POST"
                        class="d-flex gap-2 h-100">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="start_date" type="date" class="form-control w-100"
                                aria-describedby="basic-addon1">
                            <span id="start-date-error" class="text-danger small ms-1"></span>
                        </div>
                        <div class="input-group mb-3">
                            <input name="end_date" type="date" class="form-control w-100"
                                aria-describedby="basic-addon1">
                            <span id="end-date-error" class="text-danger small ms-1"></span>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Search</button>
                    </form>




                </div> --}}

            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fa fa-address-book float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Contact Us</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $contact }}</h2>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="zmdi zmdi-email float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Subscribers</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $subscribers }}</h2>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fa fa-users float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Let's Talk</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $lets_talk }}</h2>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="zmdi zmdi-blogger float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Total Blogs</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $total_blogs ?? '00' }}</h2>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="zmdi zmdi-cast float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Total Course</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $courses ?? '00' }}</h2>
                    </div>
                </div> --}}

            </div><!-- end row -->
        </div> <!-- container -->

        {{-- popular blog  weekend modal section  --}}
        <div class="modal fade" id="popularInWeekend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="popularInWeekendLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="popularInWeekendLabel">Popular in weekends</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <table id="responsive-datatable" class="table dt-responsive nowrap table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Visitors</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Joined At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($popular_weekends as $key => $blog)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $blog->visit_count_total ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('blogpost', $blog->slug) }}" target="_blank">
                                                            {{ Str::words($blog->title, 10, '[..]') }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $blog->status == true ? 'badge-info' : 'badge-danger' }}">{{ $blog->status == true ? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                                                    <td class="btn-group action-button">
                                                        <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" onclick="deleteData({{ $blog->id }})"
                                                            class="btn btn-danger rounded-right btn-sm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $blog->id }}"
                                                            action="{{ route('admin.blog.destroy', $blog->id) }}"
                                                            method="POST" style="display: none;">
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
                        </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- popular blog in month modal section  --}}
        <div class="modal fade" id="popularInMonth" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="popularInMonthLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="popularInMonthLabel">Popular This Month</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <table id="responsive-month-datatable" class="table dt-responsive nowrap table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Visitors</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Joined At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($popular_this_month as $key => $blog)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $blog->visit_count_total ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('blogpost', $blog->slug) }}" target="_blank">
                                                            {{ Str::words($blog->title, 10, '[..]') }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $blog->status == true ? 'badge-info' : 'badge-danger' }}">{{ $blog->status == true ? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                                                    <td class="btn-group action-button">
                                                        <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" onclick="deleteData({{ $blog->id }})"
                                                            class="btn btn-danger rounded-right btn-sm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $blog->id }}"
                                                            action="{{ route('admin.blog.destroy', $blog->id) }}"
                                                            method="POST" style="display: none;">
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
                        </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- popular between modal section  --}}
        <div class="modal fade" id="popularBetween" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="popularBetweenLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="popularBetweenLabel">Popular Between <span id="startDate"
                                class="text-muted"></span> To <span id="endDate" class="text-muted"></span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="popular-data-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
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
        $(document).ready(function() {
            // Default Datatable
            $('#datatable').DataTable();
            // Responsive Datatable
            $('#responsive-month-datatable').DataTable();
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

    {{-- popular between form submit  --}}
    {{-- <script>
        $(document).ready(function() {
            $('#dataForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form behavior
                const modalTitleStartDate = document.getElementById('startDate');
                const modalTitleEndDate = document.getElementById('endDate');

                $.ajax({
                    url: '{{ route('admin.popular.between') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        if (response.data) {

                            const startDate = document.querySelector('input[name="start_date"]')
                                .value;
                            const endDate = document.querySelector('input[name="end_date"]')
                                .value;

                            // Update the modal title with the selected date range
                            modalTitleStartDate.textContent = startDate || 'N/A';
                            modalTitleEndDate.textContent = endDate || 'N/A';

                            // Build table dynamically
                            let tableContent = `
                        <table id="responsive-month-datatable" class="table dt-responsive nowrap table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Visitors</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Joined At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        `;

                            response.data.forEach((blog, index) => {
                                tableContent += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${blog.visit_count_total ?? ''}</td>
                                    <td>
                                        <a href="/blog/blog-details/${blog.slug}" target="_blank">
                                            ${blog.title ? blog.title.split(' ').slice(0, 10).join(' ') + ' [..]' : ''}</td>
                                        </a>
                                    <td>
                                        <span class="badge ${blog.status ? 'badge-info' : 'badge-danger'}">
                                            ${blog.status ? 'Active' : 'Inactive'}
                                        </span>
                                    </td>
                                    <td>${blog.created_at}</td>
                                    <td class="btn-group action-button">
                                        <a href="/admin/blog/${blog.id}/edit" class="btn btn-dark btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" onclick="deleteBetweenData(${blog.id})" class="btn btn-danger rounded-right btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;
                            });

                            tableContent += `
                            </tbody>
                        </table>
                        `;

                            // Inject table content into the modal body
                            $('#popular-data-container').html(tableContent);

                            // Open the modal programmatically
                            const modal = new bootstrap.Modal(document.getElementById(
                                'popularBetween'));
                            modal.show();
                        } else {
                            alert('No data available for the selected date range.');
                        }
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;

                        if (response && response.errors) {
                            // Clear previous error messages
                            $('#start-date-error').text('');
                            $('#end-date-error').text('');

                            // Show error messages near the form fields
                            if (response.errors.start_date) {
                                $('#start-date-error').text(response.errors.start_date[0]);
                            }
                            if (response.errors.end_date) {
                                $('#end-date-error').text(response.errors.end_date[0]);
                            }
                        }
                    }

                });
            });
        });

        function deleteBetweenData(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                $('#delete-form-' + id).submit();
            }
        }
    </script> --}}
@endpush
