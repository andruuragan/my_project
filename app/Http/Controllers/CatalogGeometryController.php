<?php

namespace App\Http\Controllers;

use App\Models\CatalogGeometry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogGeometryController extends Controller
{
    public function index()
    {
         
        $catalogGeometries = CatalogGeometry::orderBy('id', 'desc')->paginate(15);

        return view('catalog-geometry.index', compact('catalogGeometries'));
    }

    public function create()
    {
        return view('catalog-geometry.create');
    }

    public function show(string $id)
{
    $catalogGeometry = CatalogGeometry::findOrFail($id);

    return view('catalog-geometry.show', compact('catalogGeometry'));
}

    public function edit(string $id)
{
    $catalogGeometry = CatalogGeometry::findOrFail($id);

    return view('catalog-geometry.edit', compact('catalogGeometry'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parameters' => 'nullable|array',
            'parameters.*.code' => 'nullable|string|max:50',
            'parameters.*.name' => 'nullable|string|max:255',
            'parameters.*.name_ru' => 'nullable|string|max:255',
            'parameters.*.value' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $data['image_hash'] = $hash;
        }

        CatalogGeometry::create($data);

        return redirect()->route('catalog-geometry.index');
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, string $id)
{
    $catalogGeometry = CatalogGeometry::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',

        'parameters' => 'nullable|array',
        'parameters.*.code' => 'nullable|string|max:50',
        'parameters.*.name' => 'nullable|string|max:255',
        'parameters.*.name_ru' => 'nullable|string|max:255',
        'parameters.*.value' => 'nullable|string|max:255',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    /*
     * Старое изображение
     */
    $oldHash = $catalogGeometry->image_hash;


    /*
     * Новое изображение
     */
    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $realPath = $file->getRealPath();

        if (!$realPath) {
            abort(500, 'File upload error');
        }

        $newHash = sha1_file($realPath);

        $ext = strtolower($file->getClientOriginalExtension());

        if ($ext === 'jpeg') {
            $ext = 'jpg';
        }

        $filename = $newHash . '.' . $ext;
        $path = 'images/' . $filename;

        /*
         * Если такой файл уже существует —
         * повторно его не загружаем.
         */
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->putFileAs(
                'images',
                $file,
                $filename
            );
        }

        $data['image_hash'] = $newHash;


        /*
         * Если hash действительно изменился,
         * проверяем, используется ли старое изображение
         * другими геометриями.
         */
        if ($oldHash && $oldHash !== $newHash) {

            $isUsed = CatalogGeometry::where('image_hash', $oldHash)
                ->where('id', '!=', $catalogGeometry->id)
                ->exists();

            if (!$isUsed) {

                /*
                 * Сейчас все изображения WebP.
                 */
                $oldPath = 'images/' . $oldHash . '.webp';

                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }
    }

    /*
     * Сохраняем изменения геометрии
     */
    $catalogGeometry->update($data);

    return redirect()->route(
        'catalog-geometry.show',
        $catalogGeometry->id
    );
}



    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id) { 
    $catalogGeometry = CatalogGeometry::findOrFail($id); 
    /* * Запоминаем hash картинки перед удалением записи */
     $imageHash = $catalogGeometry->image_hash; 
     /* * Удаляем запись геометрии */ 
     $catalogGeometry->delete(); 
     /* * Если у геометрии была картинка — * проверяем, используется ли она ещё где-нибудь. */ 
     if ($imageHash) { $isUsed = CatalogGeometry::where('image_hash', $imageHash) ->exists(); 
     /* * Если картинка больше нигде не используется — * удаляем физический файл. */
      if (!$isUsed) { $imagePath = 'images/' . $imageHash . '.webp';
       if (Storage::disk('public')->exists($imagePath))
         { Storage::disk('public')->delete($imagePath); 
       } } } return redirect()->route('catalog-geometry.index'); }
}