@extends('layouts.admin')

@section('title', "Medias")

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
                            <li class="breadcrumb-item"><a href="{{ route("admin.medias") }}">Medias</a></li>
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
                        <form action="{{ route("post.admin.medias.add") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Medias</h5>
                            <div class="form-group m-t-20">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control date-inputmask" id="date-mask" placeholder="Titre du Média">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Type</label>
                                <select id="type" name="type" class="form-control">
                                    <option selected value="video">Video</option>
                                    <option value="image">Image</option>
                                </select>
                            </div>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div id="image" class="form-group row">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" name="image_path" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div id="video" class="form-group m-t-20">
                                <label>Lien Youtube</label>
                                <input type="text" name="video_path" class="form-control" id="date-mask" placeholder="Lien Youtube">
                            </div>
                            @error('video_path')
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
<script>
    $('#image').css("display", "none");
    $("#type").on("input", event => {
        if(event.target.value == "video") {
            $("#video").css("display", "block");
            $('#image').css("display", "none");
        } else {
            $('#image').css("display", "block");
            $("#video").css("display", "none");
        }
    })
</script>
@endsection