<?php


namespace App\Actions\Listing;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\Location;

class FormData
{
    /**
     * @return array <string,\Illuminate\Database\Eloquent\Collection> 
     */
    public function getData() :array 
    {
        $categories=Category::select('id','name')->latest()->get();
        $locations=Location::select('id','name')->latest()->get();
        $amenities=Amenity::select('id','name','icon')->latest()->get();
        $max_amenities=auth()->user()->latestOrder?->package?->number_of_amenities;

        return compact('amenities','categories','locations','max_amenities');
    }
}