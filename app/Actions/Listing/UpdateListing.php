<?php


namespace App\Actions\Listing;

use App\Models\Listing;
use Throwable;
use Illuminate\Support\Facades\DB;

class UpdateListing
{
    /**
     * @param array <string,mix> $data
     * @param Listing $listing
     */
    public function update(array $data,Listing $listing) :void
    {
        DB::beginTransaction();
        try
        {
            $listing->update($data);
        
            if(isset($data['amenities'])) $listing->amenities()->sync($data['amenities']);
          
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