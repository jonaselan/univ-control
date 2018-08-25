@extends('layouts.app')

@section('content')
  <h1> New University</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['url'=>"universities", 'method'=>'post'])!!}
        @include('university._form')
    {!! Form::close() !!}
  </div>
@stop
