@extends('layout')
@section('content')
<?php use App\Http\Controllers\UploadController;?>
{{UploadController::store()}}
@endsection
