<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

        // return redirect()->to('/');

        // dd('working');
        $task = new Task();

        $task->id = 0;

        $task->exists = true;

        $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }
}
