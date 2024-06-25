@extends('layouts.admin')

@section('title', "Utilisateurs")

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
                            <li class="breadcrumb-item"><a href="{{ route("admin.users") }}">Utilisateurs</a></li>
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
                        <form action="{{ route("post.admin.users.update", ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Utilisateurs</h5>
                            <div class="form-group m-t-20">
                                <label>Nom</label>
                                <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="date-mask" placeholder="Nom" required>
                            </div>
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Prénom</label>
                                <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" id="date-mask" placeholder="Prénom" required>
                            </div>
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="date-mask" placeholder="Email" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control" id="date-mask" placeholder="Mot de passe">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group row">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="/storage/{{ $user->image }}" alt="{{ $user->first_name }}" class="w-50"/>
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group m-t-20">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option @if ($user->role == 'admin')
                                        selected 
                                    @endif value="admin">Admin</option>
                                    <option @if ($user->role == 'user')
                                        selected 
                                    @endif value="user">Utilisateur</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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