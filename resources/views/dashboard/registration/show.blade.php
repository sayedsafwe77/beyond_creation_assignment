@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-adminlte.box>
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')
                <table class="table table-striped table-middle">
                    <tbody class="text-center">
                        <tr>
                            <th width="200">@lang('movies.attributes.name')</th>
                            <td>{{ $registration->movieEventday->movie->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('registration.attributes.name')</th>
                            <td>{{ $registration->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('registration.attributes.email')</th>
                            <td>{{ $registration->email }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('registration.attributes.mobile')</th>
                            <td>{{ $registration->mobile }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('movies.attributes.eventdays')</th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                {{ $registration->movieEventday->eventDayShowTime->eventday->event_day }} (
                                {{ $registration->movieEventday->eventDayShowTime->showtime->from }}
                                -
                                {{ $registration->movieEventday->eventDayShowTime->showtime->to }})
                            </th>
                        </tr>
                        @if ($registration->movieEventday->movie->getFirstMedia('movie_images'))
                            <tr>
                                <th width="200">@lang('movies.attributes.image')</th>
                                <td id="app">
                                    <file-preview
                                        :media="{{ $registration->movieEventday->movie->getMediaResource('movie_images') }}">
                                    </file-preview>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </x-adminlte.box>
        </div>
    </div>
@endsection
