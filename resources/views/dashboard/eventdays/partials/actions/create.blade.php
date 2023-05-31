@can('create', \App\Models\EventDay::class)
    <a href="{{ route('dashboard.eventdays.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('eventdays.actions.create')
    </a>
@endcan
