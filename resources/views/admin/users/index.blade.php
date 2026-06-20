@extends('layouts.main')

@section('content')
    <div class="container-1600">
        <h3>Клієнти</h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Добавити клієнта
        </a>

        <table class="table d-none d-md-table">
            <thead>
                <tr>
                    <th>ID</th><th>Ім'я</th><th>Email</th><th>Роль</th><th>Дія</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-md-none">
            @foreach($users as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text mb-3"><strong>Роль:</strong> {{ $user->role }}</p>
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                            
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Видалити?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $users->links() }}
    </div>
@endsection
<style>
@media (max-width: 767px) {
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
    }
}
</style>