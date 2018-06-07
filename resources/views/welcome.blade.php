@extends('layout')

    @section('content')
    <div class="strong">
            {!! Form::open(['url' => '/store', 'method' => 'post', 'files' => true]) !!} 
            {!! 'Epizode name: ' !!}
            {!! Form::text('name') !!}  
            <br>
            {!! Form::file('file'); !!} 
            {!! Form::submit('Upload File') !!} 
            {!! Form::token() !!}
            {!! Form::close() !!}
    </div>
    @endsection
    
