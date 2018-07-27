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

    public function addTask(Request $request)
    {

        $task = new Task;

        $this->validate(request(), [
            'name_task' => 'required|min:2',
            'description' => 'required|min:10',
            'assign' => 'required'

        ]);

        Task::create([
            'name' => request('name_task'),
            'description' => request('description'),
            'assign' => request('assign'),
            'status' => request('status'),
            'user_id' => auth()->user()->id
        ]);

        return Redirect('/home');
    }

    public function edit($id)
    {
        return view('tasks.edit', compact('id'));
    }

    public function editTask($id, Request $request)
    {

        $this->validate(request(), [
            'name_task' => 'required|min:2',
            'description' => 'required|min:10',
            'assign' => 'required'

        ]);


        $task = Task::find($id);

        $task->name = $request->name_task;
        $task->description = $request->description;
        $task->assign = $request->assign;
        $task->status = $request->status;
        $task->user_id = auth()->user()->id;
        $task->save();

        return redirect('/home');
    }

    public function deleteTask($id)
    {

        $task = Task::find($id);
        $task->delete();

        return Redirect::back();
    }
}
