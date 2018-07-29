<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;

use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $task = Task::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);

        return view('tasks.index', compact('task'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function addTask()
    {

        $task = new Task;

        $this->validate(request(), [
            'name' => 'required|min:2',
            'description' => 'required|min:10',
            'assign' => 'required'

        ]);

        Task::create(request([
            'name',
            'description',
            'assign',
            'status',
            'user_id'
        ]));

        return Redirect('/home')->with('message', 'The task was added');
    }

    public function edit($id)
    {
        return view('tasks.edit', compact('id'));
    }

    public function editTask($id)
    {

        $this->validate(request(), [
            'name' => 'required|min:2',
            'description' => 'required|min:10',
            'assign' => 'required'

        ]);


        $task = Task::find($id);

        $task->name = request('name');
        $task->description = request('description');
        $task->assign = request('assign');
        $task->status = request('status');
        $task->user_id = request('user_id');
        $task->save();

        return redirect('/home')->with('message', 'The task was edited');
    }

    public function deleteTask($id)
    {

        $task = Task::find($id);
        $task->delete();

        return Redirect::back();
    }
}
