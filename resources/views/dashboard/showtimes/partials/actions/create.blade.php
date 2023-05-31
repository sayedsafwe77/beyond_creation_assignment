@can('create', \App\Models\Product::class)
    <a href="{{ route('dashboard.showtimes.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('showtimes.actions.create')
    </a>
@endcan
