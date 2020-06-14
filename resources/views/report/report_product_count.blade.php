@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                <div class="box">
                    <div class="box-header box-header-title">
                        <h3 class="box-title">Category wise Product count Report</h3>
                    </div>

                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product count</th>
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
                    url: "{{ route('reportProductCountDatatable') }}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                }, 
                columns: [
                    {data: 'category_name', name: 'category_name', orderable: true, searchable: false},
                    {data: 'total', name: 'total', searchable: false},
                ],
            });        
         }); 
    </script>

@endsection