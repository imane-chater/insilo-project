@extends('layouts.admin')

@section('title', "Ajouter un Jeu")

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
                <h4 class="page-title">Jeux</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route("admin.games") }}">Jeux</a></li>
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
                        <form action="{{ route("post.admin.games.add") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Form Elements</h5>
                            <div class="form-group m-t-20">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control date-inputmask" id="date-mask" placeholder="Nom du Jeu">
                            </div>
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
                            <div class="form-group row">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
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