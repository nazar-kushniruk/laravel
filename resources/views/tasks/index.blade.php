<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body" style="padding: 40px">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
     {{--   <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Задача</label>

                <div class="col-sm-6">
                    <input type="text" name="title" id="task-title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Задача</label>

                <div class="col-sm-6">
                    <textarea  name="content" id="task-content" class="form-control"></textarea>
                </div>
            </div>
            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить задачу
                    </button>
                </div>
            </div>
        </form>--}}

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

    <!-- TODO: Текущие задачи -->
   {{-- <div style="padding: 40px; display: flex;">
        @foreach ($tasks as $task)
            <div class="container" ><h2>{{ $task->title }}</h2>
                <div>{{ $task->content }}</div>
                <form action="{{ url('task/'.$task->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                    </button>
                </form>
            </div>
            @yield('comments')
        @endforeach
    </div>--}}


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                @foreach ($tasks as $task)
                <div class="card">
                    <a href="task/{{$task->id}}"> <div class="card-header">{{ $task->title }}</div></a>

                    <div class="card-body">
                        {{ $task->content }}
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

@endsection
