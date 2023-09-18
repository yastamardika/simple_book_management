@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Book') }}</h1>

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
        <a href="{{ route('books.index')}}" class="btn btn-light btn-icon-split bg-light">
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
                <h6 class="m-0 font-weight-bold text-primary">Edit book</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('books.update', $book->id) }}" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">Book information</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Title<span class="small text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ old('title', $book->title) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="last_name">Description</label>
                                    <input type="textarea" id="description" class="form-control" name="description" placeholder="Description" value="{{ old('description', $book->description) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="cover">Cover image</label>
                                    <input type="file" id="cover" class="form-control" name="cover" placeholder="example@example.com" value="{{ old('cover', $book->cover) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
