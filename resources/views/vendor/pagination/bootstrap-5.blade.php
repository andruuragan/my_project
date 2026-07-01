@if ($paginator->hasPages())
<nav class="d-flex justify-content-between align-items-center flex-wrap gap-2">

    {{-- LEFT INFO --}}
    <div class="small text-muted">
        @if ($paginator->firstItem())
            {{ $paginator->firstItem() }}
            –
            {{ $paginator->lastItem() }}
            из
            {{ $paginator->total() }}
        @endif
    </div>

    {{-- RIGHT BLOCK --}}
    <div class="d-flex align-items-center gap-2">

        {{-- STEP SELECT --}}
        <select id="jumpStep" class="form-select form-select-sm" style="width: 80px;">
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
        </select>

        <ul class="pagination mb-0">

            {{-- PREVIOUS --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                @if ($paginator->onFirstPage())
                    <span class="page-link">&lsaquo;</span>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
                @endif
            </li>

            {{-- JUMP BACK --}}
            <li class="page-item">
                <a class="page-link jump-back" href="#">«</a>
            </li>

            {{-- PAGES --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            @if ($page == $paginator->currentPage())
                                <span class="page-link">{{ $page }}</span>
                            @else
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- JUMP FORWARD --}}
            <li class="page-item">
                <a class="page-link jump-forward" href="#">»</a>
            </li>

            {{-- NEXT --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
                @else
                    <span class="page-link">&rsaquo;</span>
                @endif
            </li>

        </ul>
    </div>
</nav>

{{-- JS --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const stepSelect = document.getElementById('jumpStep');

    function getStep() {
        return parseInt(stepSelect.value || 10);
    }

    function getCurrentPage() {
        const url = new URL(window.location.href);
        return parseInt(url.searchParams.get('page') || 1);
    }

    function go(page) {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page);
        window.location.href = url.toString();
    }

    document.addEventListener('click', function (e) {

        const step = getStep();
        const current = getCurrentPage();

        // BACK
        if (e.target.closest('.jump-back')) {
            e.preventDefault();

            let target = current - step;
            if (target < 1) target = 1;

            go(target);
        }

        // FORWARD
        if (e.target.closest('.jump-forward')) {
            e.preventDefault();

            let target = current + step;
            const lastPage = {{ $paginator->lastPage() }};

            if (target > lastPage) target = lastPage;

            go(target);
        }
    });

});
</script>
@endif