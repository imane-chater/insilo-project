@extends('layouts.admin')

@section('title', "Réservations")

@section('custom-css')
<link
rel="stylesheet"
type="text/css"
href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}"
/>
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
                            <li class="breadcrumb-item"><a href="{{ route("admin.packs") }}">Packs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route("post.admin.packs.add") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Packs</h5>
                            <div class="form-group m-t-20">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control" id="date-mask" placeholder="Titre du Pack">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Prix</label>
                                <input type="number" name="price" class="form-control" id="date-mask" placeholder="Prix du Pack">
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Description</h4>
                                            <input type="hidden" value="" id="description" name="description" />
                                            <!-- Create the editor container -->
                                            <div id="editor" style="height: 300px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Maximum Joueurs</label>
                                <input type="number" name="max_gamers" class="form-control" id="date-mask" placeholder="Maximum Joueurs">
                            </div>
                            @error('max_gamers')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
    quill.on("text-change", function(delta, oldDelta, source) {
        if (source == 'user') {
            const text = quill.getText();
            $('#description').val(text);
        }
    })
</script>
@endsection