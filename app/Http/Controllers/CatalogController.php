<?php

namespace App\Http\Controllers;
use App\Models\Catalog;



use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
         $items = Catalog::paginate(20); // или 20, сколько нужно

    return view('catalog.index', compact('items'));

        //return response()->json(Catalog::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function create()
    {
        return view('catalog.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'type' => 'string|nullable',
            'thickness' => 'string|nullable',
            'grade' => 'integer|nullable',
            'diameter' => 'integer|nullable',
            'casing' => 'string|nullable',
            'chimneyType' => 'string|nullable',
            'price' => 'numeric|required',
            'image' => 'string|nullable',
            'description_id' => 'nullable|exists:descriptions,id',




        ]);
        Catalog::create($data);
        return redirect()->route('catalog.index');
    }

    public function show(Catalog $catalog)
    {
       return view('catalog.show', compact('catalog'));
    }
    public function edit(Catalog $catalog)
    {
       return view('catalog.edit', compact('catalog'));
    }
    public function update(Request $request, Catalog $catalog){
        $data = $request->validate([
            'name' => 'string|required',
            'type' => 'string|nullable',
            'thickness' => 'string|nullable',
            'grade' => 'integer|nullable',
            'diameter' => 'integer|nullable',
            'casing' => 'string|nullable',
            'chimneyType' => 'string|nullable',
            'price' => 'numeric|required',
            'image' => 'string|nullable',
        ]);
        $catalog->update($data);
        return redirect()->route('catalog.show',$catalog->id);
    }


    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->route('catalog.index');
    }

    public function search()
    {
        return view('catalog.search');
    }
    public function publicShow($id)
    {
        $catalog = Catalog::findOrFail($id);

        return view('catalog.public-show', compact('catalog'));
    }
}
