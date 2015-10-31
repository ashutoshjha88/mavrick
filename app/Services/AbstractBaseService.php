<?php
/**
 * Created by PhpStorm.
 * User: macrosys
 * Date: 8/22/2015
 * Time: 7:21 PM
 */

namespace App\Services;

use App\AbstractBaseClass;

class AbstractBaseService extends AbstractBaseClass {

    /**
     * @var string
     */
    public $api_error_message;

    public function __construct(){
        parent::__construct();
    }
}