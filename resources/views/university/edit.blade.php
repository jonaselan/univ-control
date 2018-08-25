@extends('layouts.app')

@section('content')
  <h1>Edit University</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {{ Form::model($university, ['method' => 'put', 'route' => ['universities.update', $university->id]]) }}
        @include('university._form')
    {!! Form::close() !!}
  </div>
@stop
