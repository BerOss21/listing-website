<?php


namespace App\Actions\Listing;

use Throwable;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SaveListing
{
    /**
     * @param array <string,mix> $data
     */
    public function save(array $data) :void
    {
        DB::beginTransaction();
        try
        {          
            $listing = auth()->user()->listings()->create($data);
        
            if(isset($data['amenities'])) $listing->amenities()->attach($data['amenities']);
          
            if(isset($data['images'])) $listing->images()->createMany(array_map(fn($item)=>['image'=>$item],$data['images']));

            if(isset($data['videos'])) $listing->videos()->createMany(array_map(fn($item)=>['url'=>$item],$data['videos']));
    
            DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}