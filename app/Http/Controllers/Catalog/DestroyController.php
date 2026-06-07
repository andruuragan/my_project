<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke(Catalog $catalog)
    {
        $image = $catalog->image;
        $hash = $catalog->image_hash;

        $catalog->delete();

        if ($hash) {

            $isUsed = Catalog::where('image_hash', $hash)->exists();

            if (
                !$isUsed &&
                $image &&
                Storage::disk('public')->exists($image)
            ) {
                Storage::disk('public')->delete($image);
            }
        }

        return redirect()->route('catalog.index');
    }
}
