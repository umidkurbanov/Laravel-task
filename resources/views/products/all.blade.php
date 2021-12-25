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
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Products &nbsp;
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add new product
                            </button>
                        </h4>

                        <div class="table-responsive">
                                <table id="datatable" class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Background</th>
                                            <th class="align-middle">Product</th>
                                            <th class="align-middle">Category</th>
                                            <th class="align-middle">Brand</th>
                                            <th class="align-middle text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td class="td-bg">
                                                    {!! $product->is_rgb == "1" ? "<div style='background-color: rgba($product->background)'></div>" : "<img src='public/images/products/$product->background'>" !!}
                                                </td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->cat_title }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('products') }}/edit/{{ $product->id }}"><button type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="{{ route('products') }}/delete/{{ $product->id }}"><button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Add new product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Brand</label>
                            <select name="brand_id" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-login-input" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="formrow-login-input" name="title" required>
                        </div>   
                        
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" id="is_rgb" onchange="setRGB();">
                            <label class="form-label" for="is_rgb">
                                RGB
                            </label>
                        </div>
                        <input type="hidden" id="rgb_input" value="0" name="is_rgb">
                        <div class="mb-3" id="div-photo">
                            <label for="formrow-login-input" class="form-label">Product photo</label>
                            <input type="file" class="form-control" id="formrow-login-input" name="file" accept="image/*">
                        </div>  

                        <div class="row mb-3" style="display: none;" id="div-rgb">
                            <div class="col-md-4">
                                <label for="formrow-login-input" class="form-label">Red</label>
                                <input type="number" class="form-control" id="formrow-login-input1" name="red" min="0" max="255" value="0">
                            </div>  
                            <div class="col-md-4">
                                <label for="formrow-login-input" class="form-label">Green</label>
                                <input type="number" class="form-control" id="formrow-login-input3" name="green" min="0" max="255" value="0">
                            </div>  
                            <div class="col-md-4">
                                <label for="formrow-login-input" class="form-label">Blue</label>
                                <input type="number" class="form-control" id="formrow-login-input4" name="blue" min="0" max="255" value="0">
                            </div>  
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

    <script>
        function setRGB()
        {
            if ($("#is_rgb").is(":checked"))
            {
                $("#div-photo").hide();
                $("#div-rgb").slideToggle(250);

                $("#rgb_input").val("1");
            }
            else
            {
                $("#div-rgb").hide();
                $("#div-photo").slideToggle(250);

                $("#rgb_input").val("0");
            }
        }
    </script>
@endsection

