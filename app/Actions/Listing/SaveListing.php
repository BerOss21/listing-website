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
            $user=User::find(1);
            
            $listing = $user->listings()->create($data);
        
            $listing->amenities()->attach($data['amenities']);

            DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}