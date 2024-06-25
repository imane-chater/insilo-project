@extends('layouts.admin')

@section('title', "Packs")

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
                <h4 class="page-title">Packs</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Packs</li>
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
        <a type="button" href="{{ route('admin.packs.add') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i>Ajouter un pack</a>
        <div class="row">
            <div class="col-12">
                @if(session("error"))
                    <div class="alert alert danger">{{ session('error') }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Détails Packs</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Prix</th>
                                        <th>Description</th>
                                        <th>Maximum Joueurs</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packs as $pack)
                                        <tr>
                                            <td>{{ $pack->title }}</td>
                                            <td>{{ $pack->price }}</td>
                                            <td>{{ $pack->description }}</td>
                                            <td>{{ $pack->max_gamers }}</td>
                                            <td>
                                                <a type="button" href="{{ route('admin.packs.update', ["id" => $pack->id]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                <a type="button" href="{{ route('admin.packs.delete', ["id" => $pack->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                            </td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Prix</th>
                                        <th>Description</th>
                                        <th>Maximum Joueurs</th>
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