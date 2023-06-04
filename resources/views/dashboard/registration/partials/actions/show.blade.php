@can('view', $registration)
    <a href="{{ route('dashboard.registrations.show', $registration) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
