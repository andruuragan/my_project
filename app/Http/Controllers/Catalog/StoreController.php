<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description_id' => 'nullable|exists:descriptions,id',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $realPath = $file->getRealPath();
            if (!$realPath) {
                abort(500, 'File upload error');
            }

            $hash = sha1_file($realPath);

            $ext = strtolower($file->getClientOriginalExtension());
            if ($ext === 'jpeg') {
                $ext = 'jpg';
            }

            $filename = $hash . '.' . $ext;
            $path = 'images/' . $filename;

            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->putFileAs('images', $file, $filename);
            }

            $data['image'] = $path;
            $data['image_hash'] = $hash;
        }
        Catalog::create($data);

        return redirect()->route('catalog.index');
    }
}
