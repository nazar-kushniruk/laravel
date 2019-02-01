@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Gazeta UA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    @if(!Auth::guest())
                        <a class="nav-link" data-toggle="modal" data-target="#myModal">Create article
                            <span class="sr-only">(current)</span>
                        </a>
                    @endif
                </li>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content -->
<div class="container" style="padding-top: 60px">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class=" col-md-12">

            <h1 class="my-4">Свежачок
                {{-- <small>Secondary Text</small>--}}
            </h1>

            <!-- Blog Post -->
            @foreach ($tasks as $task)
                <div class="card mb-4">
                    <img class="card-img-top" src="http://lorempixel.com/750/300" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$task->title}}</h2>
                        <p class="card-text">{{$task->content}}</p>
                        <a href="task/{{$task->id}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{$task->created_at}} by
                        <a href="#">{{$task->user->name}}</a>
                    </div>
                </div>
            @endforeach

        </div>



    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create you article</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="panel-body">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>
@endsection()
