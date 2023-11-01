@extends('template.master')


@section('content')
<div class="content-wrapper">
    <h1>Welcome {{ Auth::user()->name }}</h1>
@endsection