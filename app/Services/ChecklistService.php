<?php

namespace App\Services;

use App\Models\Admin\Checklist;
use App\Models\User;

class ChecklistService
{

    public function sync_checklist(Checklist $checklist, User $user)
    {
        $checklist =  Checklist::firstOrCreate(
            [
                'checklist_id' => $checklist->id,
                'user_id' => $user->id
            ],
            [
                'checklist_group_id' => $checklist->checklist_group_id,
                'name' => $checklist->name,
                'checklist_id' => $checklist->id,
                'user_id' => $user->id
            ]
        );

        $checklist->touch();

        return $checklist;
    }
}
