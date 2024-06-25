@extends('layouts.admin')

@section('title', "Jeux")

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
                <h4 class="page-title">Jeux</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jeux</li>
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
        <a type="button" href="{{ route('admin.games.add') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i>Ajouter un jeu</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Détails Jeux</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="table-layout: fixed">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Date D'ajout</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($games as $game)
                                        <tr>
                                            <td>{{ $game->name }}</td>
                                            <td>{{ Str::limit($game->description, 100) }}</td>
                                            <td class="text-center"><img src="/storage/{{ $game->image }}" alt="{{ $game->name }}" class="img-fluid"/></td>
                                            <td>{{ $game->created_at }}</td>
                                            <td>
                                                <a type="button" href="{{ route("admin.games.update", ["id" => $game->id]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                <a type="button" href="{{  route("admin.games.delete", ['id' => $game->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="7">Aucun Jeux</td></tr>
                                    @endforelse 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Date D'ajout</th>
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