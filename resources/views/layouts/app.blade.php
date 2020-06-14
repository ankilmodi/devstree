<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
 

    <title>{{ config('app.name', 'Webplanex') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'webplanex') }}
                    </a>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

 <style type="text/css">
        body {
            padding: 20px;
        }

        label {
            display: block;
        }

        input.error {
            border: 1px solid red;
        }

        label.error {
            font-weight: normal;
            color: red;
        }

        button {
            display: block;
            margin-top: 20px;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
          $("#loginForm").validate({
            rules: {
              email: {
                required: true
              },
              password: {
                required: true
              }
            },
            messages: {
              email: {
                required: "specify email"
              },
              password: {
                required: "specify password"
              }
            }
          });
    });
</script>
</body>
</html>
