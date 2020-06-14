@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header box-header-title">
                        <h3 class="box-title">LIST OF Category</h3>
                    <a href="{{ route('subcategoryCreate') }}" class="btn btn-default pull-right"><i
                                    class="fa fa-plus-square"></i> Add Category</a>
                    </div>
                    
                    <div class="box-body">
                         <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Parent Category</th>
                                <th>Category Type</th>
                                <th>Status</th>
                               <th>Action</th>
                            </tr>
                             @foreach ($category as $categoryItem)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $categoryItem->category_name }}</td>
                                @if($categoryItem->parent_id)
                                <td>Sub Category</td>
                                @else
                                 <td>Parent Category</td>
                                @endif
                                <td>{{ $categoryItem->status }}</td>
                                <td>
                                <form action="/sub-category-delete/{{$categoryItem->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}                                        
                                <button class="btn btn-danger">Delete</button>
                                  <a class="btn btn-primary" href="/sub-category-edit/{{$categoryItem->id}}">Edit</a>
                                    </form>
                            </td>
                            </tr>
                            @endforeach
                        </table>
                         {!! $category->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')
@endsection