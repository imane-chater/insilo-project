@extends('layouts.admin')

@section('title', "Medias")

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
                <h4 class="page-title">Medias</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Medias</li>
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
        <a type="button" href="{{ route('admin.medias.add') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i>Ajouter une image/video</a>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Détails Medias</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="table-layout: fixed">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Image/Video</th>
                                        <th>Date D'ajout</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($medias as $media)
                                        <tr>
                                            <td>{{ $media->title }}</td>
                                            <td>{{ $media->type }}</td>
                                            @if ($media->type == "image")
                                                <td><img class="img-fluid" src="/storage/{{ $media->path }}" alt="{{ $media->title }}" /></td> 
                                            @else
                                                <td><iframe width="200" height="150" src="{{ $media->path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
                                            @endif
                                            
                                            <td>{{ $media->created_at }}</td>
                                            <td>
                                                <a type="button" href="{{ route("admin.medias.update", ["id" => $media->id]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                <a type="button" href="{{  route("admin.medias.delete", ['id' => $media->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center"><td colspan="7">Aucun Jeux</td></tr>
                                    @endforelse 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Image/Video</th>
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