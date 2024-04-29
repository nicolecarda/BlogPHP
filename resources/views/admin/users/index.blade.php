@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Users' List </h1>
@stop


@section('content')
    @livewire('admin.users-index')
@stop



 
