@extends('adminlte::page')
@section('content')
    @include('dashboard.eventdays.partials.filter')
    <x-adminlte.table-box>
        @slot('title')
            @lang('eventdays.actions.list') ({{ $eventdays->total() }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <div class="d-flex">
                        <x-check-all-delete type="{{ \App\Models\EventDay::class }}" :resource="trans('eventdays.plural')"></x-check-all-delete>
                        <div class="ml-2 d-flex justify-content-between flex-grow-1">
                            @include('dashboard.eventdays.partials.actions.create')
                            @include('dashboard.eventdays.partials.actions.trashed')
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="width: 30px;" class="text-center">
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('eventdays.attributes.event_day')</th>
                <th>@lang('showtimes.attributes.from')</th>
                <th>@lang('showtimes.attributes.to')</th>
                <th style="width: 160px">...</th>
            </tr>
        </thead>

        @forelse($eventdays as $eventday)
            <tr>
                <td class="text-center">
                    <x-check-all-item :model="$eventday"></x-check-all-item>
                </td>
                <td>
                    {{ $eventday->getEventDayStringFormatted() }}
                </td>
                <td>
                    {{ $eventday->showtimes->first()->from }}
                </td>
                <td>
                    {{ $eventday->showtimes->first()->to }}
                </td>
                <td style="width: 160px">
                    @include('dashboard.eventdays.partials.actions.show')
                    @include('dashboard.eventdays.partials.actions.edit')
                    @include('dashboard.eventdays.partials.actions.delete')
                </td>
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
