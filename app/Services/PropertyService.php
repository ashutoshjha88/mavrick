<?php namespace App\Services;

use App\Contracts\Services\PropertyServiceInterface;
use App\Contracts\Repositories\PropertyRepositoryInterface;

class PropertyService extends AbstractBaseService implements PropertyServiceInterface {

    /**
     * @var PropertyRepositoryInterface
     */
    protected $property_repository;

    public function __construct(PropertyRepositoryInterface $property_repository)
    {
        parent::__construct();
        $this->property_repository = $property_repository;
    }

    public function getPropertyList($user_id, $date='')
    {
       $property_details_array_of_object = $this->property_repository->getPropertyList($user_id, $date);
        if( empty($property_details))
        {
            $this->api_error_message = trans('property.empty_property');
        }

        return $this->preparePropertyArrayOfArray($property_details_array_of_object);
    }

    /**
     * @param $property_details_array_of_object
     * @return array
     */
    protected function preparePropertyArrayOfArray($property_details_array_of_object){
        $property_details_array_of_array = [];
        foreach($property_details_array_of_object as $property_details_object)
        {
            $property_details_array_of_array [] = $this->preparePropertyOfArray($property_details_object);
        }

        return $property_details_array_of_array;
    }

    /**
     * @param $property_details_object
     * @return array
     */
    protected function preparePropertyOfArray($property_details_object){
        $start_bid = false;
        $current_time = strtotime('now');
        if( strtotime($property_details_object->bid_close_date_time) > $current_time && strtotime($property_details_object->bid_start_date_time) <= $current_time)
        {
            $start_bid = true;
        }

        return [
            'property_id'=>$property_details_object->id,
            'property_url'=> $property_details_object->property_url,
            'property_title'=> $property_details_object->property_title,
            'image' => $property_details_object->image,
            'bid_price'=> number_format( $property_details_object->bid_price),
            'location'=> $property_details_object->location,
            'lat'=> $property_details_object->lat,
            'lng'=> $property_details_object->lng,
            'city_id'=> $property_details_object->city_id,
            'city_name'=> $property_details_object->Cities->city_name,
            'bid_start_date_time'=> $property_details_object->bid_start_date_time,
            'bid_close_date_time'=> $property_details_object->bid_close_date_time,
            'start_bid'=>$start_bid
        ];
    }
}