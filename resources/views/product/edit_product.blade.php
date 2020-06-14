@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Product</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- right column -->
            <div class="col-md-8 col-md-offset-1">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Product</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('productUpdate',$product_get->id) }}" method="post" enctype="multipart/form-data" data-parsley-validat >
                            <div class="box-body">
                                {{ csrf_field() }}
                               
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id " class="col-sm-4 control-label">Category</label>
                            <div class="col-sm-5"> 
                                       <select name="category_id" class="form-control" value="">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $key=>$value)         
                                            <option value="{{ $key }}" {{ $product_get->category_id == $key ? "selected" : "" }}>{{ $value }}</option>
                                        @endforeach
                                       
                                       </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                    <label for="product_name" class="col-sm-4 control-label">Product Name</label>
                                    <div class="col-sm-5">
                            <input type="text" class="form-control" value="{{ $product_get->product_name }}" id="product_name" name="product_name"
                                               placeholder="Enter Product Name">
                                        @if ($errors->has('product_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                             <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                                    <label for="product_image" class="col-sm-4 control-label">Product Image</label>
                                    <div class="col-sm-5">
                           <img id="product_0"  style="width: 31%;height: 5%;" class="form-control" src="{{ '/product_image/'.$product_get->product_image }}"  alt="Image not found" />
                             <input type="file" class="form-control"  value="" id="product_image_logo" name="product_image">
                             
                             <input type="hidden" class="form-control"  value="{{ $product_get->product_image }}" name="old_image">
                             <p id="output"></p>
                                        @if ($errors->has('product_image'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>  

                                <div class="form-group{{ $errors->has('product_description') ? ' has-error' : '' }}">
                                    <label for="product_description" class="col-sm-4 control-label">Product Description</label>
                                    <div class="col-sm-5">
                            <textarea class="form-control" value="{{ $product_get->product_description }}" id="product_description" name="product_description" placeholder="Enter Description" >{{ $product_get->product_description }}</textarea>
                                        @if ($errors->has('product_description'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('product_description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 
 

                                 <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price" class="col-sm-4 control-label">Product Price</label>
                                    <div class="col-sm-5">
                            <input type="text" class="form-control" value="{{ $product_get->price }}" id="price" name="price"
                                               placeholder="Enter Price">
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 

                               

                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript"> 
        $('#product_image_logo').on('change', function() { 
  
            var numb = $(this)[0].files[0].size/5270;
            numb = numb.toFixed(2);

            if (numb > 5) { 
               
                 $("#output").html('<b style="color: red;">' + 
                   'to big, maximum is 5MB. You image size is:: ' + numb + " MB" + '</b>'); 
            } else { 
                $("#output").html('<b>' + 
                   'This image size is: ' + numb + " MB" + '</b>'); 
            } 
        }); 
    </script>  

   <script type="text/javascript"> 

        function readURL_0(input) {

            console.log(input);
            if (input.files && input.files[0]) {
                var reader0 = new FileReader();

                reader0.onload = function (e) {
                    $('#product_0').attr('src', e.target.result);
                }

                reader0.readAsDataURL(input.files[0]);
            }
            else{
                $('#product_0').attr('src', $('#product_image_0').val());
            }

        }

        $("#product_image_logo").change(function(){
            readURL_0(this);
        });

    </script>   

@endsection