@extends('layouts.admin')

@section('title', "Messages")

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
                            <li class="breadcrumb-item"><a href="{{ route("admin.messages") }}">Messages</a></li>
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
                        <form action="{{ route("post.admin.messages.update", ['id' => $message->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Messages</h5>
                            <div class="form-group m-t-20">
                                <label>Auteur</label>
                                <input type="text" name="sender" value="{{ $message->sender }}" class="form-control" id="date-mask" placeholder="Auteur du message">
                            </div>
                            <div class="form-group m-t-20">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $message->email }}" class="form-control" id="date-mask" placeholder="Email">
                            </div>
                            <div class="form-group m-t-20">
                                <label>Sujet</label>
                                <input type="text" name="subject" value="{{ $message->subject }}" class="form-control" id="date-mask" placeholder="Sujet">
                            </div>
                            <div class="form-group m-t-20">
                                <label>Message</label>
                                <textarea type="text" name="content" value="{{ $message->content }}" class="form-control" id="date-mask" placeholder="Auteur du message">
                                    {{ $message->content }}
                                </textarea>
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
