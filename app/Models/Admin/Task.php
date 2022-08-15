<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['checklist_id', 'name', 'description', 'position'];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
