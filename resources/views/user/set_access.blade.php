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
                {{ Form::model($user, ['method' => 'put', 'id' => "form-status-$key", 'route' => ['users.update', $user->id]]) }}
                  <div class="form-group">
                      {!! Form::label('type', 'Type:') !!}
                      <div class="radio">
                          <label>{!! Form::radio("status-$key", 'Approved') !!}Approved</label>
                      </div>
                      <div class="radio">
                          <label>{!! Form::radio("status-$key", 'Denied') !!}Denied</label>
                      </div>
                  </div>

                  <div class="form-group">
                      {!! Form::label('university_id', 'University:') !!}
                      {!! Form::select('university_id',
                                      \UnivControl\University::pluck('name', 'id'),
                                      null, ['id' => "university-id-$key", 'class' => 'form-control']) !!}
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

<script type="text/javascript">
  $(() => {
    $("#form-status-{{$key}}").on('submit', function (e) {
      e.preventDefault();
      var university_id = $('#university-id-{{$key}}').val();
      var status = $("input[name='status-{{$key}}']:checked").val();

      $.ajax({
          type: "PUT",
          url: `${window.location.href}/{{$user->id}}`,
          data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            university_id,
            status
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: (resultData) => {
            // pegar o id da linha e mudar classe para a especificada
            $("#tr-{{$key}}").attr('class', (resultData.status == 'Denied' ? 'table-danger' : 'table-success'));

            // mudar o valor da celula status
            $("#td-status-{{$key}}").text(resultData.status);

            // fechar modal
            $('#access-{{ $key }}').modal('hide');
          },
          fail: (resultData) => { alert('err') }
      })
    });
  });
</script>
