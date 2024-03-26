@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4">
            <a href="/users/create" class="btn btn-primary btn-lg btn-block">Create a new user</a>
        </div>
        <div class="col-md-4">
            <a href="/users/" class="btn btn-secondary btn-lg btn-block">View all users</a>
        </div>
        <div class="col-md-4">
            <a href="/test-connection" class="btn btn-info btn-lg btn-block">Test Connection</a>
        </div>
    </div>
</div>

@endsection
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>