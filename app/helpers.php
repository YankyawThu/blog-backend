<?php

function kFormat($value) {
    if($value >= 1000) {
        return bcdiv($value/1000, 1, 1) . "k";
    }
    else {
        return $value;
    }
}