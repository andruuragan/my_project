<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Список статей.
     */
    public function index()
    {
        $articles = Article::latest('published_at')->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Форма создания статьи.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Сохранение новой статьи.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'title_ru' => ['nullable', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug'],

            'excerpt' => ['nullable', 'string'],
            'excerpt_ru' => ['nullable', 'string'],

            'content' => ['nullable', 'string'],
            'content_ru' => ['nullable', 'string'],

            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
    $validated['image'] = $request->file('image')->store('articles', 'public');
}

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статтю успішно створено.');
    }

    /**
     * Просмотр статьи в админке.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Форма редактирования.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Обновление статьи.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'title_ru' => ['nullable', 'string', 'max:255'],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:articles,slug,' . $article->id,
            ],

            'excerpt' => ['nullable', 'string'],
            'excerpt_ru' => ['nullable', 'string'],

            'content' => ['nullable', 'string'],
            'content_ru' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],

            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

if ($request->hasFile('image')) {
    if ($article->image) {
        Storage::disk('public')->delete($article->image);
    }

    $validated['image'] = $request->file('image')->store('articles', 'public');
}

$article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статтю успішно оновлено.');
    }

    /**
     * Удаление статьи.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статтю успішно видалено.');
    }

    public function publicIndex()
{
    $articles = Article::where('is_published', true)
        ->whereNotNull('published_at')
        ->whereDate('published_at', '<=', now())
        ->latest('published_at')
        ->get();

    return view('articles.index', compact('articles'));
}

public function publicShow(string $slug)
{
    $article = Article::where('slug', $slug)
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->whereDate('published_at', '<=', now())
        ->firstOrFail();

    return view('articles.show', compact('article'));
}
}