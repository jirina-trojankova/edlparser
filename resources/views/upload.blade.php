@extends('layout')
@section('content')
upload blade
<?php use App\Http\Controllers\UploadController;?>
{{-- //call the controller function in php way with passing args. --}}

{{-- // Or call the controller function in blade way. --}}
{{UploadController::store()}}
@endsection
