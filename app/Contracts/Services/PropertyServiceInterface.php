<?php namespace App\Contracts\Services;

interface PropertyServiceInterface {

    public function getPropertyList($user_id, $date='');

}