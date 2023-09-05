<?php

namespace Flits\Clavertap\API;
use Flits\Clavertap\ClaverTapProvider;

class Upload extends ClaverTapProvider {

    public $METHOD = "POST";
    public $URL = '<APP_ID>/upload';

    function __construct($config) {
        parent::__construct($config);
    }

}