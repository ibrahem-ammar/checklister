<?php

namespace App\Http\View\Composers;

use App\Models\Admin\Checklist;
use Carbon\Carbon;
use Illuminate\View\View;

class SidebarComposer
{

    public function compose(View $view)
    {
        // \App\Models\Admin\ChecklistGroup::with('checklists')->get()

        $checklist_groups = \App\Models\Admin\ChecklistGroup::with(['checklists' => function ($q) {
            $q->whereNull('user_id');
        }])->get();

        if (auth()->user()->is_admin) {
            $view->with('checklist_groups', $checklist_groups);
        } else {

            $groups = [];

            $checklist_groups_array = $checklist_groups->toArray();

            $last_action = auth()->user()->last_action_at;

            if (is_null($last_action)) {
                $last_action = now()->subYears(10);
            }

            // dd($checklist_groups_array);

            $user_checklists = Checklist::where('user_id', auth()->id())->get();

            // dd($user_checklists);

            foreach ($checklist_groups_array as $checklist_group) {

                if (!count($checklist_group['checklists'])) {
                    continue;
                }

                $checklist_group_updated_at = $user_checklists->where('checklist_group_id', $checklist_group['id'])
                    ->max('updated_at');

                if (is_null($checklist_group_updated_at)) {
                    $checklist_group_updated_at = now()->subYears(10);
                }
                $checklist_group['is_new'] = Carbon::create($checklist_group['created_at'])->greaterThan($checklist_group_updated_at);
                $checklist_group['is_updated'] = !($checklist_group['is_new']) && Carbon::create($checklist_group['updated_at'])->greaterThan($checklist_group_updated_at);


                foreach ($checklist_group['checklists'] as &$checklist) {

                    $checklist_updated_at = $user_checklists->where('checklist_id', $checklist['id'])
                        ->max('updated_at');

                    if (is_null($checklist_updated_at)) {
                        $checklist_updated_at = now()->subYears(10);
                    }
                    $checklist['is_new'] = !($checklist_group['is_new']) && Carbon::create($checklist['created_at'])->greaterThan($checklist_updated_at);
                    $checklist['is_updated'] = !($checklist_group['is_new']) && !($checklist_group['is_updated']) && !($checklist['is_new']) && Carbon::create($checklist['updated_at'])->greaterThan($checklist_updated_at);

                    // dd($checklist_group_updated_at, $checklist_group, $checklist_updated_at, $checklist);
                    // exit;

                    $checklist['tasks'] = 1;
                    $checklist['completed_tasks'] = 0;
                }

                $groups[] = $checklist_group;
            }

            // dd($groups);

            $view->with('checklist_groups', $groups);
        }
    }
}
