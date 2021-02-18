@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div id="app">
    <video-link></video-link>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
