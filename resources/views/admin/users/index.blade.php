@extends('layouts.main')

@section('content')
    <div class="container-1600">
        <h3>Клієнт</h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Добавити клієнта
        </a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Им'я</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Дія</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                        <a href="{{ route('users.show', $user) }}"
                           class="btn btn-sm btn-outline-info btn-icon"
                           title="Інфо">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('users.edit', $user) }}"
                           class="btn btn-sm btn-outline-warning btn-icon"
                           title="Редагувати">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger btn-icon"
                                    title="Видалити"
                                    onclick="return confirm('Видалити клієнта?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $users->links() }}
    </div>
@endsection
