<?php

class TasksController
{
    public function index()
    {
        $tasks = Task::all();

        return view('index', [
            'tasks' => $tasks
        ]);
    }

    public function store()
    {
        Task::save([
            'task' => Request::getPostValue('task')
        ]);

        Redirect::to('/');
    }

}