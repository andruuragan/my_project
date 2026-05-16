@extends('layouts.main')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">
                👤 Пользователь #{{ $user->id }}
            </h3>

            <div class="d-flex gap-2">

                <a href="{{ route('users.edit', $user) }}"
                   class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Редактировать
                </a>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Назад
                </a>

            </div>
        </div>

        {{-- CARD --}}
        <div class="card shadow-sm border-0 p-3 p-md-4">
            <div class="card-body">

                <div class="row g-4">

                    {{-- LEFT --}}
                    <div class="col-md-4 text-center">

                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                             style="width:120px; height:120px; font-size:40px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <h5 class="mt-3 mb-1">{{ $user->name }}</h5>

                        <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }}">
                        {{ $user->role }}
                    </span>

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-8">

                        <table class="table table-sm table-borderless">

                            <tr>
                                <th style="width:180px;">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <th>Телефон</th>
                                <td>{{ $user->phone ?? '—' }}</td>
                            </tr>

                            <tr>
                                <th>Роль</th>
                                <td>
                                    @if($user->isAdmin())
                                        <span class="badge bg-danger">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Дата регистрации</th>
                                <td>{{ optional($user->created_at)->format('d.m.Y H:i') }}</td>
                            </tr>

                            <tr>
                                <th>ID</th>
                                <td>#{{ $user->id }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>
        </div>

        {{-- DELETE --}}
        <div class="mt-4">

            <form action="{{ route('users.destroy', $user) }}"
                  method="POST"
                  onsubmit="return confirm('Удалить пользователя?')">

                @csrf
                @method('DELETE')

                <button class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> Удалить пользователя
                </button>

            </form>

        </div>

    </div>
@endsection
