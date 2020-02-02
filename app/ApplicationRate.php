<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationRate extends Model
{

    public static function securityTotal() {
        $rates = static::all();
        $total = 0;
        foreach ($rates as $rate) {
            $total = $total + $rate->security;
        }
        if($rates->count() == 0){
            return 0;
        }else{
            return round($total/$rates->count());
        }
    }

    public static function effectivenessTotal() {
        $rates = static::all();
        $total = 0;
        foreach ($rates as $rate) {
            $total = $total + $rate->effectiveness;
        }
        if($rates->count() == 0){
            return 0;
        }else{
            return round($total/$rates->count());
        }
    }

    public static function technicalSupportTotal() {
        $rates = static::all();
        $total = 0;
        foreach ($rates as $rate) {
            $total = $total + $rate->technical_support;
        }
        if($rates->count() == 0){
            return 0;
        }else{
            return round($total/$rates->count());
        }
    }

    public static function responsivenessTotal() {
        $rates = static::all();
        $total = 0;
        foreach ($rates as $rate) {
            $total = $total + $rate->responsiveness;
        }
        if($rates->count() == 0){
            return 0;
        }else{
            return round($total/$rates->count());
        }
    }

}
