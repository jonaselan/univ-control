@extends('layouts.app')

@section('content')
  <table class="table table-hover table-responsive">
      <tr>
          <td><b>Name:</b></td>
          <td>{{ $user->name }}</td>
      </tr>
      <tr>
          <td><b>Email:</b></td>
          <td>{{ $user->email}}</td>
      </tr>
      <tr>
          <td><b>Status:</b></td>
          <td>{{ $user->status }}</td>
      </tr>
      <tr>
          <td><b>University:</b></td>
          <td>{{ $user->university ? $user->university->name : 'Not informed yet' }}</td>
      </tr>
      <tr>
          <td><b>Created at:</b></td>
          <td>{{ date("d-m-Y", strtotime($user->created_at)) }}</td>
      </tr>
      <tr>
          <td><b>Updated at:</b></td>
          <td>{{ date("d-m-Y", strtotime($user->update_at)) }}</td>
      </tr>
  </table>
@stop
