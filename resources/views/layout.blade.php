<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EDL_Parser</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        table {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            border-collapse: collapse;
            width: 100%;
            font-weight: normal;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            EDL Parser
        </div>
        <div class="strong">
                {!! Form::open(['url' => '/store', 'method' => 'post', 'files' => true]) !!} 
                {!! 'Epizode name: ' !!}
                {!! Form::text('name') !!}  
                {!! Form::select('ext', array('txt' => 'txt', 'edl' => 'edl'), 'txt') !!}  
                <br>
                {!! Form::file('file'); !!} 
                {!! Form::submit('Upload File') !!} 
                {!! Form::token() !!}
                {!! Form::close() !!}
        </div>
        @yield('content')
    </div>
</body>

</html>