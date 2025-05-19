@extends('layouts.backend.backend-layouts')

@section('page-title','Products | Lists')
@push('page-css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('page-content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
            <div class="page-title-box">
                <div class="d-flex justify-content-between align-items-center text-muted">
                <h4 class="page-title float-left">
                <i class="zmdi zmdi-blogger"></i> Product</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-dark">
                        <i class="fa fa-plus-circle"></i>
                        <span>Create Product</span>
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
                <div class="card-box table-responsive">
                    <table id="responsive-datatable" class="table table-bordered mt-3 ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>App</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset('assets/frontend/img/products/' . $product->image) }}" width="80" alt="{{ $product->name }}"></td>
                                    <td><a href="{{ $product->link }}" target="_blank">View</a></td>
                                    <td>
                                        @if ($product->app_status == 'web')
                                            <i style="font-size: 50px;" class="zmdi zmdi-globe-alt"></i>
                                        @elseif ($product->app_status == 'mobile')
                                            <i style="font-size: 50px;" class="zmdi zmdi-android"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script src="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<!-- Data Table script -->
<script>
  $(document).ready(function() {
    // Default Datatable
    $('#datatable').DataTable();
    // Responsive Datatable
    $('#responsive-datatable').DataTable();
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Sweet Aleart Js -->
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
  function deleteifno(id) {
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
          document.getElementById('delete-form-'+id).submit();
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
