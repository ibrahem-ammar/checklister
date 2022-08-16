<?php

namespace App\Http\Controllers;

use App\Models\Admin\Page;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function welcome()
    {
        $page = Page::findOrFail(1);
        return view('admin.pages.index', compact('page'));
    }

    public function consultation()
    {
        $page = Page::findOrFail(2);

        return view('admin.pages.index', compact('page'));
    }

    public function users()
    {
        $users = User::where('is_admin', 0)->latest()->paginate(50);

        return view('admin.users.index', compact('users'));
    }
}
