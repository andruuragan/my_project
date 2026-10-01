@extends('layouts.main')

@section('content') <div class="container-1600">


    @php
        $isRu = app()->getLocale() === 'ru';
    @endphp

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>{{ $isRu ? 'Статьи' : 'Статті' }}</h4>

        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-icon">
            + {{ $isRu ? 'Создать статью' : 'Створити статтю' }}
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    {{-- DESKTOP --}}
    <div class="card shadow-sm d-none d-md-block">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
<th>{{ $isRu ? 'Изображение' : 'Зображення' }}</th>
<th>{{ $isRu ? 'Название' : 'Назва' }}</th>
                        <th>{{ $isRu ? 'Дата публикации' : 'Дата публікації' }}</th>
                        <th>{{ $isRu ? 'Статус' : 'Статус' }}</th>
                        <th width="220">{{ $isRu ? 'Действия' : 'Дії' }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($articles as $article)

                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="{{ $article->title }}"
             style="width: 80px; height: 60px; object-fit: cover;"
             class="rounded-3">
    @else
        <span class="text-muted small">—</span>
    @endif
</td>

                            <td>
                                {{ $isRu && $article->title_ru
                                    ? $article->title_ru
                                    : $article->title }}
                            </td>

                            <td>
                                {{ $article->published_at
                                    ? $article->published_at->format('d.m.Y')
                                    : '—' }}
                            </td>

                            <td>
                                @if($article->is_published)
                                    <span class="badge bg-success">
                                        {{ $isRu ? 'Опубликована' : 'Опублікована' }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ $isRu ? 'Черновик' : 'Чернетка' }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('articles.show', $article->id) }}"
                                       class="btn btn-sm btn-info"
                                       title="{{ $isRu ? 'Просмотр' : 'Перегляд' }}">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('articles.edit', $article->id) }}"
                                       class="btn btn-sm btn-warning"
                                       title="{{ $isRu ? 'Редактировать' : 'Редагувати' }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('articles.destroy', $article->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ $isRu ? 'Удалить статью?' : 'Видалити статтю?' }}')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="{{ $isRu ? 'Удалить' : 'Видалити' }}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                {{ $isRu ? 'Статей пока нет.' : 'Статей поки немає.' }}
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

    {{-- MOBILE --}}
    <div class="d-md-none">

        @forelse($articles as $article)

            <div class="card mb-3 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                    @if($article->image)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $article->image) }}"
             alt="{{ $article->title }}"
             class="img-fluid rounded-3"
             style="width: 100%; height: 180px; object-fit: cover;">
    </div>
@endif

                        <div>
                            <small class="text-muted">
                                ID: {{ $article->id }}
                            </small>

                            <h6 class="mb-1 mt-1">
                                {{ $isRu && $article->title_ru
                                    ? $article->title_ru
                                    : $article->title }}
                            </h6>

                            <small class="text-muted">
                                {{ $article->published_at
                                    ? $article->published_at->format('d.m.Y')
                                    : '—' }}
                            </small>
                        </div>

                        @if($article->is_published)
                            <span class="badge bg-success">
                                {{ $isRu ? 'Опубликована' : 'Опублікована' }}
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                {{ $isRu ? 'Черновик' : 'Чернетка' }}
                            </span>
                        @endif

                    </div>

                    <div class="d-flex gap-2 mt-3">

                        <a href="{{ route('articles.show', $article->id) }}"
                           class="btn btn-sm btn-outline-info"
                           title="{{ $isRu ? 'Просмотр' : 'Перегляд' }}">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('articles.edit', $article->id) }}"
                           class="btn btn-sm btn-outline-warning"
                           title="{{ $isRu ? 'Редактировать' : 'Редагувати' }}">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('articles.destroy', $article->id) }}"
                              method="POST"
                              onsubmit="return confirm('{{ $isRu ? 'Удалить статью?' : 'Видалити статтю?' }}')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    title="{{ $isRu ? 'Удалить' : 'Видалити' }}">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="text-center text-muted py-4">
                {{ $isRu ? 'Статей пока нет.' : 'Статей поки немає.' }}
            </div>

        @endforelse

    </div>

</div>


@endsection
