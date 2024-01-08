<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile as Uploaded;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UploadedFile implements CastsAttributes
{
    public function __construct(
        protected string $disk = 'public',
        protected string $sub_folder=''
    ) {}
 
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value && Storage::disk($this->disk)->exists($value)) 
        {
            return Storage::disk($this->disk)->url($value);
        }

        return $value;
    }
   
    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return ($value instanceof Uploaded) ? $value->store($this->sub_folder, ['disk' => $this->disk]):null;
    }
}
