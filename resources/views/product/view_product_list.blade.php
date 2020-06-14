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
                        <h3 class="box-title">LIST OF Product</h3>
                        <a href="{{ route('productCreate') }}" class="btn btn-default pull-right"><i
                                    class="fa fa-plus-square"></i> ADD Product</a>
                    </div>

                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                 <th>Product Category</th>
                                <th>Product Image</th>
                                 <th>Price</th>
                               <th>Action</th>
                            </tr>
                             @foreach ($product as $productItem)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $productItem->product_name }}</td>
                                 <td>{{ $productItem->Category[0]->category_name }}</td>
                                <td><img id="product_0"  style="width: 18%;height: 22%;" class="form-control" src="{{ '/product_image/'.$productItem->product_image }}"  alt="Image not found" /></td>
                                <td>{{ $productItem->price }}</td>
                                <td>
                                <form action="/product-delete/{{$productItem->id}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                                        
                                    <button class="btn btn-danger">Delete</button>
                                  <a class="btn btn-primary" href="/product-edit/{{$productItem->id}}">Edit</a>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </table>
                         {!! $product->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')
@endsection