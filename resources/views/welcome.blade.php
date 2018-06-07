@extends('layout')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            EDL Parser
        </div>
        <div>
            {!! Form::open(['url' => '/store', 'method' => 'post', 'files' => true]) !!} 
            File name:
            {!! Form::text('episode') !!}  
            <br />
            {!! Form::file('file'); !!} 
            {!! Form::submit('Upload File') !!} 
            {!! Form::token() !!}
            {!! Form::close() !!}
        </div>
       
    </div>
    @endsection
