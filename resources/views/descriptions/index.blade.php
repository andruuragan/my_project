
@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Описания</h4>

        <a href="{{ route('descriptions.create') }}" class="btn btn-primary btn-icon">
            + Создать
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th width="220">Действия</th>
                </tr>
                </thead>

                <tbody>
                @foreach($descriptions as $description)
                    <tr>
                        <td>{{ $description->id }}</td>
                        <td>{{ $description->name }}</td>

                        <td class="d-flex gap-2">

                            <a href="{{ route('descriptions.show', $description->id) }}"
                               class="btn btn-sm btn-info btn-icon">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('descriptions.edit', $description->id) }}"
                               class="btn btn-sm btn-warning btn-icon">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('descriptions.destroy', $description->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Ты точно хочешь удалить это описание?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger btn-icon">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

@endsection
