<?php namespace App\Repositories;

use App\Contracts\Repositories\PropertyRepositoryInterface;
use App\Models\Property;
use Carbon\Carbon;

class PropertyRepository extends AbstractBaseRepository implements PropertyRepositoryInterface{


    public function getPropertyList($user_id, $date){
        $query = Property::where('user_id', '<>', $user_id);
        if( empty($date) )
        {
            $query->where('bid_start_date_time', '>', Carbon::now())
                    ->orWhere('bid_close_date_time', '>', Carbon::now());
        }
        return $query->get();
    }
}