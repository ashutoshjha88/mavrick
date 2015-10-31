<?php namespace App\Http\Controllers;

class PagesController extends Controller {

    /**
     * About Us
     *
     * @return \Illuminate\View\View
     */
	public function about()
	{
		return view('pages.about');
	}

    /**
     * Contact Us
     *
     * @return \Illuminate\View\View
     */
	public function contact()
	{
		return view('pages.contact');
	}
}
