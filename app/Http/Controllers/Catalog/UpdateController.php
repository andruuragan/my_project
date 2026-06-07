<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Catalog $catalog)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'type' => 'string|nullable',
            'thickness' => 'string|nullable',
            'grade' => 'integer|nullable',
            'diameter' => 'string|nullable',
            'casing' => 'string|nullable',
            'chimneyType' => 'string|nullable',
            'price' => 'numeric|required',
            'description_id' => 'nullable|exists:descriptions,id',
            'image' => 'nullable|image|mimes:webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $hash = sha1_file($file->getRealPath());

            $ext = $file->extension();

            $filename = $hash . '.' . $ext;
            $path = 'images/' . $filename;

            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->putFileAs('images', $file, $filename);
            }

            $oldHash = $catalog->image_hash;
            $oldImage = $catalog->image;

            $data['image'] = $path;
            $data['image_hash'] = $hash;

            // сначала update
            $catalog->update($data);

            // потом удаление старого файла
            if ($oldHash) {

                $isUsed = Catalog::where('image_hash', $oldHash)
                    ->where('id', '!=', $catalog->id)
                    ->exists();

                if (
                    !$isUsed &&
                    $oldImage &&
                    Storage::disk('public')->exists($oldImage)
                ) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            return redirect()->route('admin.catalog.show', $catalog->id);
        }

        $catalog->update($data);

        return redirect()->route('admin.catalog.show', $catalog->id);
    }
}
