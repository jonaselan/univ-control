<!-- Modal -->
<div id="access-{{ $key }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <div class="col-md-11">
                    <h3 class="modal-title">Manage User Access</h3>
                </div>
                <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>

            <div class="modal-body">
                {{ Form::model($user, ['method' => 'put', 'route' => ['users.update', $user->id]]) }}
                <div class="form-group">
                    {!! Form::label('type', 'Type:') !!}
                    <div class="radio">
                        <label>{!! Form::radio('status', 'Approved') !!}Approved</label>
                    </div>
                    <div class="radio">
                        <label>{!! Form::radio('status', 'Denied') !!}Denied</label>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('university_id', 'University:') !!}
                    {!! Form::select('university_id',
                                    \UnivControl\University::pluck('name', 'id'),
                                    null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Done', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
