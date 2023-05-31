@extends('adminlte::page')

@section('content')
    @include('dashboard.showtimes.partials.filter')
    <x-adminlte.table-box>

        @slot('title')
            @lang('showtimes.actions.list') ({{ count_formatted($showtimes->total()) }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <x-check-all-force-delete type="{{ \App\Models\ShowTime::class }}" :resource="trans('showtimes.plural')">
                    </x-check-all-force-delete>
                    <x-check-all-restore type="{{ \App\Models\ShowTime::class }}" :resource="trans('showtimes.plural')"></x-check-all-restore>
                </th>
            </tr>
            <tr>
                <th>
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('showtimes.attributes.from')</th>
                <th>@lang('showtimes.attributes.to')</th>
                <th>@lang('showtimes.attributes.deleted_at')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($showtimes as $showtime)
                <tr>
                    <td class="text-center">
                        <x-check-all-item :model="$showtime"></x-check-all-item>
                    </td>
                    <td>
                        {{ $showtime->from }}
                    </td>
                    <td>
                        {{ $showtime->to }}
                    </td>


                    <td>{{ $showtime->deleted_at->format('Y-m-d') }}</td>


                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('showtimes.empty')</td>
                </tr>
            @endforelse

            @if ($showtimes->hasPages())
                @slot('footer')
                    {{ $showtimes->links() }}
                @endslot
            @endif
    </x-adminlte.table-box>
@endsection
