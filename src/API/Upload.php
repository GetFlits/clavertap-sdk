<?php

namespace Flits\Clavertap\API;
use Flits\Clavertap\ClaverTapProvider;

class Upload extends ClaverTapProvider {

    public $METHOD = "POST";
    public $URL = 'upload';

    function __construct($config) {
        parent::__construct($config);
    }

}