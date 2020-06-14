<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('include.head')
<body class="hold-transition skin-blue sidebar-mini">
@include('include.header_o')
 <div class="wrapper">

       @include('include.sidebar')

    <div class="content-wrapper">
        <!-- Main content -->
        <div class="container">
            @yield('content')

        </div>
    </div>
</div>
<!-- ./wrapper -->

