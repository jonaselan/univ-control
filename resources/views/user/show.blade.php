<!-- Modal -->
<div id="details-{{ $key }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                {{-- <div class="row"> --}}
                    <div class="col-md-11">
                      <h3 class="modal-title">User details</h3>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                {{-- </div> --}}
            </div>

            <div class="modal-body">
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
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
