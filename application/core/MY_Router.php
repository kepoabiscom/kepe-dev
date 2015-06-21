<?php

defined('BASEPATH') || exit('No direct script access allowed');

class MY_Router extends CI_Router {

    function _set_request ($seg = array()) {
        parent::_set_request(str_replace('-', '_', $seg));
    }

}

