<?php

namespace Flits\Clavertap\API;
use Flits\Clavertap\ClavertapProvider;

class Upload extends ClavertapProvider {

    public $METHOD = "POST";
    public $URL = 'upload';

    function __construct($config) {
        parent::__construct($config);
    }

}