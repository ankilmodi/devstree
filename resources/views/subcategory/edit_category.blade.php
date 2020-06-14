@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Category</li>
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
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('subcategoryUpdate', $category_get->id) }}" method="post"  enctype="multipart/form-data" data-parsley-validat >
                            
                             <div class="box-body">
                                {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="parent_id" class="col-sm-4 control-label">Parent Category Name</label>
                            <div class="col-sm-5"> 
                                <select name="parent_id" class="form-control" value="">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($category as $key=>$value)         
                                    <option value="{{$key}}" {{ $category_get->parent_id == $key ? "selected" : "" }} " >{{$value}}</option>
                                        @endforeach
                                       
                                       </select>
                                        @if ($errors->has('parent_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cat_title') ? ' has-error' : '' }}">
                                <label for="cat_title" class="col-sm-4 control-label">Category Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="cat_title" name=" cat_title" value="{{ $category_get->category_name }}" placeholder="Enter Category Name">
                                    @if ($errors->has('cat_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('cat_title') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has(' pdf_uplode') ? ' has-error' : '' }}">
                            <label for="pdf_uplode" class="col-sm-4 control-label">PDF Upload</label>
                                    <div class="col-sm-5">
                            <input type="file" class="form-control" id="pdf_uplode" name="pdf_uplode">
                            <input type="hidden" class="form-control"  name="old_pdf_uplode" value="{{ $category_get->pdf_uplode }}">
                                        @if ($errors->has('pdf_uplode'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('pdf_uplode') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                            </div>

                             <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="active" class="col-sm-4 control-label">Active</label>
                                    <div class="col-sm-5">
            Active  <input type="radio"  id="status" value="Active" name="status" @if($category_get->status == 'Active') checked @endif >
             Inactive  <input type="radio"  id="status" value="Inactive" name="status" @if($category_get->status == 'Inactive') checked @endif >
                                    @if ($errors->has('status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
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
@endsection