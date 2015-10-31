<?php namespace App\Contracts\Repositories;

interface PropertyRepositoryInterface {


    public function getPropertyList($user_id, $date);
}