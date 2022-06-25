@extends('layout.layout')

@section('title', 'User Management System')

<!-- navbar -->

@section('navbar')

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="d-md-inline-block d-none">User Management System</span>
            <span class="d-md-none">UMS</span>
        </a>
        <a href="login" class="nav-link ml-auto"><i class="bi bi-person-square text-light"></i></a>
    </nav>

@endsection


<!-- register form -->
@section('register-form')
    <div class="col-md-6 offset-md-3 my-4">
        <div class="card-header bg-info p-1">
            <h3 class="text-md-right text-center text-light mr-4">Enter Credentials</h3>
        </div>
        <div class="card-body shadow">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <input type="text" value="{{ old('name') }}" class="form-control mb-3" name="name" id="name" placeholder="Name" >
                <!-- display error (if any) -->
                @if($errors->any())
                    @foreach($errors->get('name') as $name_err)
                        <small class="text-danger ml-3">{{ $name_err }}</small>
                    @endforeach
                @endif
                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                @if($errors->any())
                    @foreach($errors->get('email') as $email_err)
                        <small class="text-danger ml-3">{{ $email_err }}</small>
                    @endforeach
                @endif
                <br>
                <select name="roleSelected" class="form-control" value="{{ old('roleSelected') }}">
                    <option value="client" >Client</option>
                    <option value="developer">Developer</option>
                    <option value="admin">Admin</option>
                </select>
                <br>
                <button class="btn btn-outline-primary btn-block">Create</button>
                <div class="mt-4 d-flex text-center">               
                @if(session()->has('status') && session('status') == 'success')
                    <span class="alert alert-success messageAlert">Created Successfully!!</span>

                @endif              
            </div>
            </form>
        </div>
    </div>
@endsection