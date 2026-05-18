@extends('layouts.main')

@section('content')
    <div class="container-1600">
       <h2> страница админа</h2>

        <div>
            <a class="btn btn-warning fw-semibold px-4"
               href="{{ route('catalog.index') }}">
                Catalog
            </a>
    </div>

        <div>


            <a class=" btn btn-primary {{ request()->routeIs('descriptions.*') ? 'active' : '' }}"
               href="{{ route('descriptions.index') }}">
                Опис (admin)
            </a>

    </div>
    </div>
@endsection
