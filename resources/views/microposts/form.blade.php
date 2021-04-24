{!! Form::open(['route' => 'microposts.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control mb-3', 'rows' => '2']) !!}
        <div class="text-right">{!! Form::submit('Post', ['class' => 'btn btn-primary w-25']) !!}</div>
    </div>
{!! Form::close() !!}