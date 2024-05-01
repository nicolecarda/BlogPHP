<!-- table for showing the posts list -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">New Post</a>
    <h1> Posts' List </h1>
@stop


@section('content')

<!-- message shown if the category is created ok -->

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif

@livewire('admin.posts-index')  <!-- call livewire blade -->

@stop



 
