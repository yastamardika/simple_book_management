@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Users') }}</h1>

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
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Day of Birth</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Day of Birth</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @if (!$users->isEmpty())
                                @foreach ($users as $user)            
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->day_of_birth}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                        <a class="btn .btn-sm btn-danger btn-circle" href="" data-toggle="modal" data-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ route('users.show',$user->id)}}" class="btn .btn-sm btn-info btn-circle">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>no data available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if (!$users->isEmpty())    
            <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you sure?') }}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Delete" below if you want to delete this user.</div>
                        <div class="modal-footer">
                            <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                            <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('Delete') }}</a>
                            <form id="delete-form" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
@endsection
