@can('view', $eventday)
    <a href="{{ route('dashboard.eventdays.show', $eventday) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
