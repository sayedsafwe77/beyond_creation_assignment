@can('viewTrash', \App\Models\EventDay::class)
    <a href="{{ route('dashboard.eventdays.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('eventdays.trashed')
    </a>
@endcan
