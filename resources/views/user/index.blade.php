@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>Users</h1>
        </div>
    </div>
    @if(count($users))
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Request in</th>
                <th>Options</th>
            </tr>
            @foreach($users as $key => $c)
              {{-- Não mostrar na tabela ele mesmo  --}}
                @if ($c->id != \Auth::id())
                  {{-- Melhorar visualização  --}}
                  <tr id="tr-{{$key}}" class="{{ ($c->status == 'Approved' || $c->status == 'Denied') ? ($c->status == 'Denied' ? 'table-danger' : 'table-success') : ''}}">
                      <td>{{ $c->name }} </td>
                      <td>{{ $c->email }} </td>
                      <td id="td-status-{{$key}}">{{ $c->status }} </td>
                      <td>{{ date("d-m-Y", strtotime($c->created_at)) }} </td>
                      <td>
                        <a role="button" data-toggle="modal" class="modal-show btn btn-default" data-target="#details-{{ $key }}" href title="Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a role="button" data-toggle="modal" class="modal-show btn btn-default" data-target="#access-{{ $key }}" href title="Config">
                            <i class="fas fa-cog"></i>
                        </a>
                      </td>
                  </tr>
                @endif
            @endforeach
        </table>
        {{ $users->links() }}

        @each('user.show', $users, 'user')
        @each('user.set_access', $users, 'user')
    @else
        <h2> There is no users registered </h2>
    @endif
@stop
