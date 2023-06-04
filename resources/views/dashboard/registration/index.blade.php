@extends('adminlte::page')
@section('content')
    @include('dashboard.registration.partials.filter')
    <x-adminlte.table-box>
        @slot('title')
            @lang('registration.actions.list') ({{ $registrations->total() }})
        @endslot
        <thead>
            <tr>
                <th>@lang('movies.attributes.name')</th>
                <th>@lang('registration.attributes.name')</th>
                <th>@lang('registration.attributes.email')</th>
                <th>@lang('registration.attributes.mobile')</th>
                <th style="width: 160px">...</th>
            </tr>
        </thead>

        @forelse($registrations as $registration)
            <tr>
                <td>
                    <a href="{{ route('dashboard.registrations.show', $registration) }}"
                        class="text-decoration-none text-ellipsis">
                        <img src="{{ $registration->movieEventday->movie->getFirstMediaUrl('movie_images') }}"
                            alt="{{ $registration->movieEventday->movie->name }}" class="img-circle img-size-32 mr-2"
                            style="height: 32px;">
                        {{ $registration->movieEventday->movie->name }}
                    </a>
                </td>
                <td>
                    {{ $registration->name }}
                </td>
                <td>
                    {{ $registration->email }}
                </td>
                <td>
                    {{ $registration->mobile }}
                </td>
                <td style="width: 160px">
                    @include('dashboard.registration.partials.actions.show')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('registration.empty')</td>
            </tr>
        @endforelse

        @if ($registrations->hasPages())
            @slot('footer')
                {{ $registrations->links() }}
            @endslot
        @endif
    </x-adminlte.table-box>
@endsection
