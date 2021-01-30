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
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter your name" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>


    <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="invalid-feedback">
        Please enter your email.
    </div>

    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" onkeyup='check();' placeholder="Password" required>
    </div>
    <div class="invalid-feedback">
        Please enter your password.
    </div>

    <div class="form-group col-md-6">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" onkeyup='check();' placeholder="Confirm Password" required>
        <span id='message'></span>
    </div>
    <div class="invalid-feedback">
        Please confirm your password.
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('password_confirmation').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
        }
    }
</script>
<script src="https://code.jquery.com/jquery-1.10.1.js"></script>
@endsection