<?php

namespace Pshenichniyinfo\AdminPanel\Http\Controllers;

use Pshenichniyinfo\AdminPanel\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin-panel::pages.dashboard.index');
    }
}
