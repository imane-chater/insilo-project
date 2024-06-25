@extends('layouts.admin')

@section('title', "Avis")

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
                <h4 class="page-title">Avis</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route("admin.reviews") }}">Avis</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
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
                        <form action="{{ route("post.admin.reviews.update", ['id' => $review->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Avis</h5>
                            <div class="form-group m-t-20">
                                <label>Nom</label>
                                <input type="text" value="{{ $review->name }}" name="name" class="form-control" id="date-mask" placeholder="Nom">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Email</label>
                                <input type="email" value="{{ $review->email }}" name="email" class="form-control" id="date-mask" placeholder="Email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Note</label>
                                <input type="number" value="{{ $review->rating }}" name="rating" class="form-control" id="date-mask" placeholder="Note">
                            </div>
                            @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Commentaire</h4>
                                            <input type="hidden" value="{{ $review->comment }}" id="comment" name="comment" />
                                            <!-- Create the editor container -->
                                            <div id="editor" style="height: 300px;">
                                                {{ $review->comment }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
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
            $('#comment').val(text);
        }
    })
</script>
@endsection