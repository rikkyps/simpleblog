@extends('layouts.admin.app')

@section('assets-top')
<!-- Page level plugin CSS-->
<link href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Comments</a>
            </li>
            <li class="breadcrumb-item active">Table</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list">
                    Comments
                </i>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" witdh="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>

        </div>
</div>
@endsection

@section('assets-bottom')
<!-- Page level plugin JavaScript-->
<script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.datatable.comments') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'comment', name: 'comment'},
                {data: 'post', name: 'post'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        })
    });
</script>
@endsection