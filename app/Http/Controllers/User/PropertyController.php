<?php namespace App\Http\Controllers\User;

use App\Contracts\Services\PropertyServiceInterface;
use App\Http\Controllers\UserController;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class PropertyController extends UserController{

    /**
     * @var PropertyServiceInterface
     */
    protected $property_service;

    public function __construct(PropertyServiceInterface $property_service)
    {
       parent::__construct();
        $this->property_service = $property_service;
    }

    public function getPropertyList(){

        JavaScriptFacade::put([
            'property_ajax_url' => route('property_list_ajax'),
        ]);

        return view('user.property');
    }

    public function getPropertyListAjax(){
        $property_details = $this->property_service->getPropertyList($this->user_id);
        return $this->sendJson( $this->property_service->api_error_message, $property_details, 'array');
    }
}