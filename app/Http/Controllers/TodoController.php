<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todos;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $todos)
    {
        $this->middleware('auth');
        $this->todos=$todos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todos = $this->todos->forUser($request->user());

        return view('todos.index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $request->user()->todos()->create([
            'title' => $request->title,
            'body'=>$request->body
        ]);

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Todo $todo)
    {
        $this->authorize('destroy', $todo);
        $todo->delete();

        return redirect('/todos');
    }

}
