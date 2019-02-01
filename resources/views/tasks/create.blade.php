{{--
@extends('layouts.app')


@section('')


@endsection
--}}


<div class="panel-body" style="padding: 40px">
    <!-- Отображение ошибок проверки ввода -->
@include('common.errors')

    {!! Form::open(['route' => 'task.store']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('content', 'Article') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
</div>
