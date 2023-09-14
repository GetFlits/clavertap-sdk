<?php

namespace Flits\Clevertap\API;
use Flits\Clevertap\ClevertapProvider;

class Upload extends ClevertapProvider {

    public $METHOD = "POST";
    public $URL = 'upload';

    function __construct($config) {
        parent::__construct($config);
    }

}