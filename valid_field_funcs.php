<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

The funcs that take care of null fields.

17/02/13 - creation date.
**shye1

28/02/13
fixed the date_res_comparable.

**shye

03/03/13

two new function:
        1.name_h_comparable
        2.name_f_comparable
        for the vacation check

**shye 
-->
<?php
    // take care of null date field.
    function date_null ($d, $m, $y) {
        if (!$d || !$m || !$y) {
            return '00-00-00';
             print $y;
        } else {
            return "$y-$m-$d";
        }
    }
    // take care of null int field.
    function int_null (&$int) {
        if (!$int) {
            $int = '0';
        }
    }
    function char_comparable(&$char){
        if (!$char){
            $char = " >= 'a'";
        }
        else{
            $char="like '%$char%'"; 
        }
    }

    function name_h_comparable(&$char){
        if (!$char){
            $char = "is null OR Name_h  >= 'a'";
        }
        else{
            $char="like '$char'"; 
        }
    }

    function name_f_comparable(&$char){
        if (!$char){
            $char = "is null OR Name_f  >= 'a'";
        }
        else{
            $char="like '$char'"; 
        }
    }

    function price_comparable(&$price){
        if ($price==0){
            $price = " >= '0'";
        }
        else{
            $price="<= '$price'";
        }
    }

    function price_Min_comparable(&$price){
        if ($price==0){
            $price = " >= '0'";
        }
        else{
            $price=">= '$price'";
        }
    }



    function discount_comparable(&$dis){
        $dis=" >= '$dis'";
    }
    function date_comparable(&$date){
        if ($date == NULL){
            $date = " >= '0'";
        }
        else{
            $date=">= '$date'";
        }
    }
    function date_res_comparable(&$date){
        if ($date == '0000-00-00'){
            $date = " >= '0000-00-00'";
        }
        else{
            $date="<= '$date'";
        }
    }
    function date_e_comparable(&$date){
        if ($date == NULL){
            $date = " >= '0'";
        }
        else{
            $date="<= '$date'";
        }
    }

    function date_e_res_comparable(&$date){
        if ($date == NULL){
            $date = " >= '0'";
        }
        else{
            $date=">= '$date'";
        }
    }
?>