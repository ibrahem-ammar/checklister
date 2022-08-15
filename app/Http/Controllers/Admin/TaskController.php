<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Admin\Checklist;
use App\Models\Admin\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Checklist $checklist)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Checklist $checklist)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, Checklist $checklist)
    {

        $position = $checklist->tasks()->max('position') + 1;

        // dd($position);

        $checklist->tasks()->create([
            'name'  => $request->validated()['name'],
            'description'  => $request->validated()['description'],
            'position'  => $position,
        ]);

        return redirect()->route('dashboard')->with('message', __('Task Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist, Task $task)
    {
        return view('admin.tasks.edit', compact(['checklist', 'task']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Checklist $checklist, Task $task)
    {
        $task->update([
            'name'  => $request->validated()['name'],
            'description'  => $request->validated()['description'],
        ]);

        return redirect()->route('dashboard')->with('message', __('Task Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist, Task $task)
    {
        $checklist->tasks()->where('position', '>', $task->position)->update([
            'position'  => DB::raw('position - 1'),
        ]);

        $task->delete();

        return redirect()->route('dashboard')->with('message', __('Task Deleted Successfully'));
    }
}
