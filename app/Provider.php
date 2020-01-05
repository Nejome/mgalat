<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    public function city() {

        return $this->belongsTo('App\City');

    }

    public function specialty() {

        return $this->belongsTo('App\Specialty');

    }

    public function location() {

        return $this->hasOne('App\ProviderLocation');

    }

    public function workingDays() {

        return $this->hasOne('App\WorkingDayes');

    }

    public function images() {

        return $this->hasMany('App\ProviderImage');

    }

    public function rate() {

        return $this->hasMany('App\ProviderRating');

    }

    public function ratingTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->total;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function teamTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->team;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function timeTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->time;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function goodTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->good;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function anotherTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->another;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function priceTotal() {
        $rating = $this->rate;
        $total = 0;
        foreach ($rating as $row) {
            $total = $total + $row->price;
        }

        if($rating->count() == 0){
            return 0;
        }else {
         return $total/$rating->count();
        }
    }

    public function week() {

        $week = $this->workingDays;

        $week['saturday'] = json_decode($week['saturday'], true);
        $week['sunday'] = json_decode($week['sunday'], true);
        $week['monday'] = json_decode($week['monday'], true);
        $week['tuesday'] = json_decode($week['tuesday'], true);
        $week['wednesday'] = json_decode($week['wednesday'], true);
        $week['thursday'] = json_decode($week['thursday'], true);
        $week['friday'] = json_decode($week['friday'], true);

        return $week;

    }

}
