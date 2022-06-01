<div>
    <!-- He who is contented is rich. - Laozi -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-2">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            @foreach(request()->breadcrumbs()->segments() as $segment)
                <li class="breadcrumb-item"><a href="{{ $segment->url() }}">{{ $segment->name() }}</a></li>
            @endforeach
        </ol>
    </nav>
</div>
