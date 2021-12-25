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
                            <h4 class="card-title mb-4">Edit product
                        </h4>
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formrow-login-input" class="form-label">Product name</label>
                                        <input type="text" class="form-control" id="formrow-login-input" 
                                            name="title" required value="{{ $product->title }}">
                                    </div> 
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        <?php if ($category->id == $product->category_id) echo " selected "; ?>
                                                    >{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>    
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Category</label>
                                        <select name="brand_id" class="form-control">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                        <?php if ($brand->id == $product->brand_id) echo " selected "; ?>
                                                    >{{ $brand->title }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    
                                    <div class="mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_rgb" onchange="setRGB();"
                                            {{ ($product->is_rgb == 1 ? ' checked' : '') }}>
                                        <label class="form-label" for="is_rgb">
                                            RGB
                                        </label>
                                    </div>
                                    <input type="hidden" id="rgb_input" name="is_rgb" value="{{ $product->is_rgb }}">

                                    <div class="mb-3" id="div-photo" {!! ($product->is_rgb == "1" ? ' style="display: none;"' : '') !!}>
                                        <label for="formrow-login-input" class="form-label">Product photo</label>
                                        <input type="file" class="form-control" id="formrow-login-input" name="file" accept="image/*">
                                    </div>  
                                 
                                    <div class="row mb-3" id="div-rgb" {!! ($product->is_rgb == "0" ? ' style="display: none;"' : '') !!}>
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
                                        <a href="{{ route('products') }}"><button type="button" class="btn btn-light" >Cancel</button></a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
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