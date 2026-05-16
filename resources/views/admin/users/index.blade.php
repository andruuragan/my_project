@extends('layouts.main')

@section('content')
    <div class="container-1600">
        <h3>Пользователи</h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Добавить пользователя
        </a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Действия</th>
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
                           title="Просмотр">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('users.edit', $user) }}"
                           class="btn btn-sm btn-outline-warning btn-icon"
                           title="Редактировать">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger btn-icon"
                                    title="Удалить"
                                    onclick="return confirm('Удалить пользователя?')">
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
