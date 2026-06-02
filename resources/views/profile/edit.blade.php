@extends('layouts.main')

@section('content')
    <div class="container py-4">
      <a href="#" onclick="smartBack(); return false;" class="btn btn-secondary mb-3">
    ← Назад
</a>
    

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
   
<script>
function smartBack() {
    // document.referrer — це адреса сторінки, з якої прийшов користувач
    const previousPage = document.referrer;
    
    // Якщо попередньою сторінкою був сам профіль (петля), 
    // або ми не знаємо звідки прийшли — йдемо на головну.
    // Якщо ж є реальна попередня сторінка — йдемо туди.
    if (previousPage && !previousPage.includes('/profile')) {
        window.location.href = previousPage;
    } else {
        window.location.href = "{{ route('main.index') }}";
    }
}
</script>
@endsection
