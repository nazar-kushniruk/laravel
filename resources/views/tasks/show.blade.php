@extends('layouts.app')


@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Gazeta UA</a>
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

        </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="padding-top: 60px">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

                <!-- Title -->
                <h1 class="mt-4">{{ $task->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">{{$task->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{$task->created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="http://lorempixel.com/1200/400" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">

                    {{$task->content}}


                </p>

                <hr>

                <!-- Comments Form -->
                @if (Auth::guest())
                    <div class="card my-4">
                        <h5 class="card-header">Wont write comment:
                            <a href="{{ route('login') }}" > Login</a> or
                            <a href="{{ route('register') }}" >Register</a>
                        </h5>

                    </div>
                        @else
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <div class="panel-body">
                            <!-- Отображение ошибок проверки ввода -->
                            @include('common.errors')

                            {!! Form::open(['route' => 'comment.store']) !!}
                            {{ Form::hidden('task_id', $task->id) }}
                            <div class="form-group">
                                {!! Form::textarea('text', null, ['class' => 'form-control','rows' => '3']) !!}
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
                @endif
                <!-- Single Comment -->{{--$comments {{print_r($comments)}}--}}
                @foreach($comments as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://lorempixel.com/50/50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{$comment->user_id}}</h5>
                            {{$comment->text}}
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Nazar Kushniruk 2019</p>
        </div>
        <!-- /.container -->
    </footer>

@endsection
