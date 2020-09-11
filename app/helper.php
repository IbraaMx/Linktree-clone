<?php

    if(!function_exists('activeURL')) {
        function activeURL($path, $class = 'c-active') {
            return Request::is($path) ? " $class" : "";
        }
    }
