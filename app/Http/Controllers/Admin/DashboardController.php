<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class DashboardController extends AdminController {

	public function index()
	{
        $title = "Dashboard";

		return view('admin.dashboard',  compact('title'));
	}
}