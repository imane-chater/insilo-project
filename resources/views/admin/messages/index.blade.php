@extends('layouts.admin')

@section('title', "Messages")

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Messages</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Détails Messages</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Auteur</th>
                                        <th>Email</th>
                                        <th>Sujet</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ $message->sender }}</td>
                                            <td>{{ $message->sender_email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->content }}</td>
                                            <td>
                                                <a type="button" href="{{ route('admin.messages.update', ["id" => 1]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                <a type="button" href="{{ route('admin.games.delete', ["id" => 1]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                            </td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Auteur</th>
                                        <th>Email</th>
                                        <th>Sujet</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{  asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{  asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{  asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
@endsection