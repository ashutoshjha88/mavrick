<?php

use App\Contracts\Services\PropertyServiceInterface;

class PropertyServiceTest extends TestCase {

    /**
     * @var PropertyServiceInterface
     */
    protected $property_service;

    public function SetUp()
    {
        parent::SetUp();
        $this->property_service = \App::make(PropertyServiceInterface::class);
    }

    public function testGetPropertyList(){
        $property_details = $this->property_service->getPropertyList(1);
        print_r($property_details);
    }

}