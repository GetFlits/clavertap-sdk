<?php

namespace Flits\ClavertapSdk\API;
use Flits\ClavertapSdk\ClaverTapProvider;

class ClavertapSdk extends ClaverTapProvider {

    public $METHOD = "POST";

    function __construct($config) {
        parent::__construct($config);
    }

}