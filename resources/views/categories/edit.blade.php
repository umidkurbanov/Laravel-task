@extends('layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit category
                        </h4>
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="formrow-firstname-input" name="title" required value="{{ $category->title }}">
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                        <a href="{{ route('categories') }}"><button type="button" class="btn btn-light" >Cancel</button></a>
                                    </div>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection