<?php

namespace App\Http\Controllers;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Task;
use App\Comment;

class TaskController extends Controller
{
    /**
     * Экземпляр TaskRepository.
     *
     * @var TaskRepository
     */
    protected $tasks;
    public $comments;
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {

        $this->tasks =$tasks;
        $this->comments = new Comment();

    }
    /**
     * Показать список всех задач пользователя.
     *
     * @param  Request  $request
     * @return Response
     */

    public function index(Request $request){
        $tasks = $this->tasks->getAllTasks();
       // dd($tasks);
        return view('homeTemplate', [
           /* 'tasks' => $this->tasks->forUser($request->user()),*/
            'tasks' => $tasks,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { $task = $this->tasks->getSingleTask($id);
     // $articleComments = Comment::where('task_id', $task->id)->get();
      $articleComments = $this->comments->getPostComments($task->id);

       //  dd($id);
        // dd($this->comments::where('task_id',$id)->get());
        return view('tasks.show',['task' => $task,
           'comments' => $articleComments ]);
       // return $task;
    }
    public function create()
    {
        return view('tasks.create');

    }

    public function store(Request $request){
        $this->middleware('auth');
        $this->validate($request, [
           'title' => 'required|max:255'
        ]);

        echo '<script>';
        echo 'console.log('. json_encode( $request ) .')';
        echo '</script>';

        $request->user()->tasks()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect('/tasks ');
    }
    /**
     * Уничтожить заданную задачу.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        echo '<script>';
        echo 'console.log('. json_encode( $task ) .')';
        echo '</script>';

        return redirect('/tasks');
    }


}
