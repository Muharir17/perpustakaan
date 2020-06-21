<div class="btn-group" role="group">
    {!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class'=> 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}

    <a href="{{ $edit_url }}" class="btn btn-xs btn-warning">Edit</a> &nbsp;&nbsp;
    <button type="submit" onclick="return confirm('Anda Yakin ?)" class="btn btn-xs btn-danger">Delete</button>

    {!! Form::close() !!}

</div>
