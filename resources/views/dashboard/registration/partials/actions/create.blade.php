@can('create', \App\Models\Movie::class)
    <a href="{{ route('dashboard.movies.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('movies.actions.create')
    </a>
@endcan
