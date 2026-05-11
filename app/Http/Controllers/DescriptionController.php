<?php
namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index()
    {
        $descriptions = Description::latest()->get();

        return view('descriptions.index', compact('descriptions'));
    }

    public function create()
    {
        return view('descriptions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'advantages' => 'nullable|string',
            'usage' => 'nullable|string',
            'why_choose_us' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);

        Description::create($data);

        return redirect()->route('descriptions.index')
            ->with('success', 'Опис створено');
    }

    public function show(Description $description)
    {
        return view('descriptions.show', compact('description'));
    }

    public function edit(Description $description)
    {
        return view('descriptions.edit', compact('description'));
    }

    public function update(Request $request, Description $description)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'advantages' => 'nullable|string',
            'usage' => 'nullable|string',
            'why_choose_us' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);

        $description->update($data);

        return redirect()->route('descriptions.index')
            ->with('success', 'Опис оновлено');
    }

    public function destroy(Description $description)
    {
        $description->delete();

        return redirect()->route('descriptions.index')
            ->with('success', 'Опис видалено');
    }
}
