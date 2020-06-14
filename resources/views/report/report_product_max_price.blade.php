@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                <div class="box">
                    <div class="box-header box-header-title">
                        <h3 class="box-title">Category Wise Product With Max Price</h3>
                    </div>

                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Category Name</th>
                                 <th>Product Name</th>
                                <th>Product Price</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')

<script type="text/javascript"> 
        $(document).ready(function() {

     var oTable = $('#myTable').DataTable({
               lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                bFilter: false,
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('reportProductMaxPriceDatatable') }}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                }, 
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category_id', name: 'category_id', orderable: true, searchable: false},
                    {data: 'product_name', name: 'product_name', searchable: false},
                    {data: 'price', name: 'price', orderable: true, searchable: false},
                ],
            });        
         }); 
    </script>

@endsection