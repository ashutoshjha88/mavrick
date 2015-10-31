<?php
/**
 * Created by PhpStorm.
 * User: ashut
 * Date: 9/5/2015
 * Time: 7:46 PM
 */

namespace App\Helpers;


use App\Contracts\Services\PropertyServiceInterface;

class MyValidator {

    protected $property_service;

    public function __construct(PropertyServiceInterface $property_service)
    {
            $this->property_service = $property_service;
    }

    public function validateBinarySum($value){
        return $this->property_service->validatePropertyFacilityBinaryCode( $value );
    }
}