<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Affix Indexer </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;

            }
            ul.pagination li {
                display: inline;
                font-size: 12px;
                font-weight: bold;
            }

            ul.pagination li a {

                color: black;
                padding: 8px 8px;
                text-decoration: none;
                transition: background-color .3s;
                border: 1px solid #ddd;
                margin: 4px;
            }

            ul.pagination li a.active {
                background-color: #4CAF50;
                padding: 8px 8px;
                margin: 4px;
                color: white;
                border: 1px solid #4CAF50;
            }

            ul.pagination li.active {
                /*background-color: #4CAF50;*/
                background-color: #687282;
                padding: 8px 8px;
                margin: 4px;
                color: white;
                border: 1px solid #4CAF50;
            }

            /*ul.pagination li a:hover:not(.active) {background-color: #ddd;}*/
            ul.pagination li a:hover {background-color: #999999;}

            ul.pagination li.disabled {
                /*background-color: #cccccc;*/
                color: #ddd;
                padding: 8px 8px;
                border: 1px solid #ddd;
                margin: 4px;
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
         <div class="content">
        @yield('content')

         </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>
