@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>Universities</h1>
        </div>
        <div class="col-md-3">
            <a href="{{ action('UniversityController@create')}}">Create university</a>
        </div>
    </div>
    @if(count($universities))
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>Founded in</th>
                <th>Options</th>
            </tr>
            @foreach($universities as $c)
                <tr>
                    <td>{{ $c->name }} </td>
                    <td>{{ date("d-m-Y", strtotime($c->founded)) }} </td>
                    <td>
                        <a class="btn btn-default" href="{{action('UniversityController@edit', $c->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{{action('UniversityController@destroy', $c->id)}}" onclick="return confirm('Sure?');">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $universities->links() }}
    @else
        <h2> There is no universities registered </h2>
    @endif
@stop
