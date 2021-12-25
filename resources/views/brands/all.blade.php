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
                                <li class="breadcrumb-item active">Brands</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Brands &nbsp;
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add new brand
                            </button>
                        </h4>

                        <div class="table-responsive">
                                <table id="datatable" class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Title</th>
                                            <th class="align-middle">Category</th>
                                            <th class="align-middle text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->id }}</td>
                                                <td>{{ $brand->title }}</td>
                                                <td>{{ $brand->cat_title }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('brands') }}/edit/{{ $brand->id }}"><button type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="{{ route('brands') }}/delete/{{ $brand->id }}"><button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="formrow-login-input" class="form-label">Title</label>
                            <input type="text" class="form-control" id="formrow-login-input" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Client</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>                
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

