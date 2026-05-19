@extends('layouts.main')

@section('content')
    <div class="container py-4">

        <h3 class="mb-4">👤 Профіль</h3>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                @include('profile.partials.update-profile-information-form')

            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                @include('profile.partials.update-password-form')

            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                @include('profile.partials.delete-user-form')

            </div>
        </div>

    </div>
@endsection
