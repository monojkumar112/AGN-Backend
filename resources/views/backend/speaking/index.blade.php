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


@endpush
@section('page-content')
    <div class="content">
        <div class="container-fluid">
            {{-- testimonial --}}
            @livewire('testimonial')

            @livewire('inspiring-change')

            @livewire('topics-i-speak-on')

            @livewire('speaking-highlights')

            @livewire('book-me')

            @livewire('inspire-together')

            @livewire('watch-table')

            @livewire('speaking-logo-slide')



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
    $('#responsive-datatable').DataTable({
        responsive: true
    });
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });

  $(document).ready(function() {
    // Responsive Datatable
    $('#responsive-watch-table').DataTable({
        responsive: true
    });
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });
  $(document).ready(function() {
    // Responsive Datatable
    $('#responsive-watch-logo').DataTable({
        responsive: true
    });
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });

</script>

<!-- Summernote Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#description').summernote({
          height: 200,
      });
  });


</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modal = document.getElementById('staticBackdropTestimonial');

        modal.addEventListener('hidden.bs.modal', function () {
            Livewire.emit('resetForm'); // Reset form when modal closes
        });
    });
</script>


@endpush
