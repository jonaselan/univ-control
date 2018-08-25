<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('founded', 'Founded:') !!}
    {!! Form::date('founded', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Done', ['class'=>'btn btn-primary']) !!}
</div>
