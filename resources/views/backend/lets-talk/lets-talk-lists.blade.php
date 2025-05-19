@extends('layouts.backend.backend-layouts')
@section('page-title',"Let's Talk | Lists")
@push('page-css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('page-content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box">
            <h4 class="page-title float-left">Let's Talk Lists</h4>
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="#">Achia</a></li>
              <li class="breadcrumb-item"><a href="#">Let's Talk</a></li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div><!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->

  <!-- Responsive Data Table -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title pb-3">Total Let's Talk <Strong>({{ $lets_talks->count() }})</Strong></h4>
        
              <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>#Sl</th>
                      <th>To Email</th>
                      <th>From Email</th>
                      <th>Message</th>
                      <th>Created Time</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($lets_talks as $key=>$lets_talks)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $lets_talks->to_email }}</td>
                      <td>{{ $lets_talks->from_email }}</td>
                      <td>{{ $lets_talks->message }}</td>
                      <td>{{ $lets_talks->created_at->diffForHumans() }}</td>
                      <td class="text-center">
                        <a href="{{ route('admin.lets-talk.show', $lets_talks->id) }}" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteifno({{ $lets_talks->id }})">
                          <i class="zmdi zmdi-delete"></i>
                        </button>
                        <form id="delete-form-{{ $lets_talks->id }}" action="{{ route('admin.lets-talk.destroy', $lets_talks->id) }}" method="POST" style="display: none;">
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
    </div><!-- end row -->
  </div>
  <!-- End Responsive Data Table -->
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