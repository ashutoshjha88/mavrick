<?php namespace App\Http\Controllers;

class UserController extends Controller {

    /**
     * @var int
     */
    protected $user_id = 0;

    public function __construct()
    {
        if (\Auth::user()) {
            $this->user_id = \Auth::user()->id;
        }
    }
}