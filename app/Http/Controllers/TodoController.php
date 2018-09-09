<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{


    public function task_complete($task_id) {

        $task = Todo::find($task_id);
        $task->is_complete = 1;
        $task->save();

        return redirect()->to('/')->with('message', 'Task #'.$task->id.' completed successfuly');

    }


    public function task_delete($task_id) {

        $task = Todo::find($task_id);
        $task->is_deleted = 1;
        $task->save();

        return redirect()->to('/')->with('message', 'Task #'.$task->id.' deleted successfuly');

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body = $request->body;

        $todo = new Todo;
        $todo->body = $body;
        $todo->save();

        return redirect()->to('/')->with('message', '#'.$todo->id.' Todo added successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
