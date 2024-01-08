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
        
            $listing->amenities()->sync($data['amenities']);

            DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}