@extends('adminlte::page')

@section('title', 'Edit Profile')

@section('content_header')
<h5 class="pl-3">Edit Profile</h5>
@endsection

@section('content')

<form method="post" action="{{route('users.update', $user)}}" class="needs-validation" novalidate>
    {{ csrf_field() }}

    <div class="form-group col-md-6">
        <label for="inputAddress">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter your name" readonly>
    </div>


    <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>




    <button class="btn btn-primary" onclick="history.go(-1);">Back</button>
</form>
@endsection

@section('css')
<style>
    body {
        margin-top: 20px;
        background: #f8f8f8
    }
</style>
@endsection

@section('js')

@endsection