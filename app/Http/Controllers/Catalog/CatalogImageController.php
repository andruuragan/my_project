<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;


class CatalogImageController extends Controller
{

    public function removeImage(Catalog $catalog)
    {
        $image = $catalog->image;
        $hash = $catalog->image_hash;

        // очищаємо у товару
        $catalog->update([
            'image' => null,
            'image_hash' => null,
        ]);

        if ($hash) {

            $isUsed = Catalog::where('image_hash', $hash)->exists();

            if (!$isUsed && $image) {
                Storage::disk('public')->delete($image);
            }
        }

        return back();
    }
}
