@extends('adminlte::page')
@section('content')
    @include('dashboard.showtimes.partials.filter')
    <x-adminlte.table-box>
        @slot('title')
            @lang('showtimes.actions.list') ({{ $showtimes->total() }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <div class="d-flex">
                        <x-check-all-delete type="{{ \App\Models\Showtime::class }}" :resource="trans('showtimes.plural')"></x-check-all-delete>
                        <div class="ml-2 d-flex justify-content-between flex-grow-1">
                            @include('dashboard.showtimes.partials.actions.create')
                            @include('dashboard.showtimes.partials.actions.trashed')
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="width: 30px;" class="text-center">
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('showtimes.attributes.from')</th>
                <th>@lang('showtimes.attributes.to')</th>
                <th style="width: 160px">...</th>
            </tr>
        </thead>

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
                <td style="width: 160px">
                    @include('dashboard.showtimes.partials.actions.show')
                    @include('dashboard.showtimes.partials.actions.edit')
                    @include('dashboard.showtimes.partials.actions.delete')
                </td>
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
