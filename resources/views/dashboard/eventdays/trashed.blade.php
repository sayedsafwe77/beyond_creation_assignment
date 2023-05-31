@extends('adminlte::page')

@section('content')
    @include('dashboard.eventdays.partials.filter')
    <x-adminlte.table-box>

        @slot('title')
            @lang('eventdays.actions.list') ({{ count_formatted($eventdays->total()) }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <x-check-all-force-delete type="{{ \App\Models\EventDay::class }}" :resource="trans('eventdays.plural')">
                    </x-check-all-force-delete>
                    <x-check-all-restore type="{{ \App\Models\EventDay::class }}" :resource="trans('eventdays.plural')"></x-check-all-restore>
                </th>
            </tr>
            <tr>
                <th>
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('eventdays.attributes.event_day')</th>
                <th>@lang('showtimes.attributes.from')</th>
                <th>@lang('showtimes.attributes.to')</th>
                <th>@lang('eventdays.attributes.deleted_at')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eventdays as $eventday)
                <tr>
                    <td class="text-center">
                        <x-check-all-item :model="$eventday"></x-check-all-item>
                    </td>
                    <td>
                        {{ $eventday->event_day }}
                    </td>
                    <td>
                        {{ $eventday->showtimes->first()->from }}
                    </td>
                    <td>
                        {{ $eventday->showtimes->first()->to }}
                    </td>

                    <td>{{ $eventday->deleted_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('eventdays.empty')</td>
                </tr>
            @endforelse

            @if ($eventdays->hasPages())
                @slot('footer')
                    {{ $eventdays->links() }}
                @endslot
            @endif
    </x-adminlte.table-box>
@endsection
