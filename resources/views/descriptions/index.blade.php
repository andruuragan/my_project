@extends('layouts.main')

@section('content')
    <div class="container-1600">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Опис</h4>
            <a href="{{ route('descriptions.create') }}" class="btn btn-primary btn-icon">
                + Створити
            </a>
        </div>

        <div class="card shadow-sm d-none d-md-block">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th width="220">Дія</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($descriptions as $description)
                            <tr>
                                <td>{{ $description->id }}</td>
                                <td>{{ $description->name }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('descriptions.show', $description->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('descriptions.edit', $description->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('descriptions.destroy', $description->id) }}" method="POST" onsubmit="return confirm('Видалити?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-md-none">
            @foreach($descriptions as $description)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">ID: {{ $description->id }}</small>
                            <h6 class="mb-0 mt-1">{{ $description->name }}</h6>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('descriptions.show', $description->id) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('descriptions.edit', $description->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('descriptions.destroy', $description->id) }}" method="POST" onsubmit="return confirm('Видалити?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection