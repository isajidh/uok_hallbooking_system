<!-- resources/views/create.blade.php -->

@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <!-- Add more fields for other attributes -->
                        <div class="form-group row">
                            <label for="authorised_by" class="col-md-4 col-form-label text-md-right">{{ __('Authorized By') }}</label>
                            <div class="col-md-6">
                                <input id="authorised_by" type="text" class="form-control" name="authorised_by">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="university_email" class="col-md-4 col-form-label text-md-right">{{ __('University Email') }}</label>
                            <div class="col-md-6">
                                <input id="university_email" type="email" class="form-control" name="university_email">
                            </div>
                        </div>

                         <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
                        <div class="col-md-6">
                            <input id="contact_number" type="text" class="form-control" name="contact_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="academic_year" class="col-md-4 col-form-label text-md-right">{{ __('Academic Year') }}</label>
                        <div class="col-md-6">
                            <input id="academic_year" type="text" class="form-control" name="academic_year">
                        </div>
                    </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
