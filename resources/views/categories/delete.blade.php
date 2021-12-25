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
                                <li class="breadcrumb-item active">Delete</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Delete category
                        </h4>
                                <form method="POST">
                                    @csrf
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fa fa-trash"></i>&nbsp;
                                        Are you sure you want to delete category "<b>{{ $category->title  }}</b>"?<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This action can't be undone!
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Delete</button>
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