<?php


namespace App\Services\Admin;

use Throwable;
use Illuminate\Support\Facades\DB;

class ListingService
{
    /**
     * @param array <string,mix> $data
     */
    public static function save(array $data) :void
    {
        DB::beginTransaction();
        try
        {
            $listing = auth('web')->user()->listing()->create($data);
        
            $listing->amenities()->attach($data['amenities']);

            DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}