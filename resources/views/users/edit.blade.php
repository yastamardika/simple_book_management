@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit User Information') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-lg-8 order-lg-1">
        <a href="{{ route('users.index')}}" class="btn btn-light btn-icon-split bg-light">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text bg-light">Back</span>
        </a>
    </div>
    <br>
    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Account</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('users.update',$result->id) }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">User information</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', $result->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="last_name">Last name</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', $result->last_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email',$result->email) }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Day of Birth<span class="small text-danger">*</span></label>
                                    <input type="date" id="day_of_birth" class="form-control" name="day_of_birth" value="{{ old('day_of_birth',$result->day_of_birth) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Phone Number<span class="small text-danger">*</span></label>
                                    <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ old('day_of_birth',$result->phone_number) }}">
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Current password</label>
                                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">New password</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="confirm_password">Confirm password</label>
                                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
