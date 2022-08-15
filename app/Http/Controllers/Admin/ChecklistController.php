<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Admin\Checklist;
use App\Models\Admin\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChecklistGroup $checklist_group)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChecklistGroup $checklist_group)
    {
        return view('admin.checklists.create', compact('checklist_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request, ChecklistGroup $checklist_group)
    {

        $checklist_group->checklists()->create([
            'name'  => $request->validated()['name'],
        ]);

        return redirect()->route('dashboard')->with('message', __('Checklist Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ChecklistGroup $checklist_group, Checklist $checklist)
    {
        // return view('admin.checklists.edit', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklist_group, Checklist $checklist)
    {
        return view('admin.checklists.edit', compact(['checklist_group', 'checklist']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklist_group, Checklist $checklist)
    {
        $checklist->update([
            'name'  => $request->validated()['name'],
        ]);

        return redirect()->route('dashboard')->with('message', __('Checklist Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklist_group, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('dashboard')->with('message', __('Checklist Deleted Successfully'));
    }
}
