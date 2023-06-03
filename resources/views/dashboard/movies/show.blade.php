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
                            <td>{{ $movie->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('movies.attributes.description')</th>
                            <td>{{ $movie->description }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('movies.attributes.eventdays')</th>
                        </tr>
                        @foreach ($movie_event_days as $movie_event_day)
                            {{-- @dd($movie_event_day->eventDay) --}}
                            <tr>
                                <th colspan="2">

                                    {{ $movie_event_day->eventDay->event_day }} ( {{ $movie_event_day->showTime->from }}
                                    -
                                    {{ $movie_event_day->showTime->to }})
                                </th>
                            </tr>
                        @endforeach
                        @if ($movie->getFirstMedia('movie_images'))
                            <tr>
                                <th width="200">@lang('movies.attributes.image')</th>
                                <td id="app">
                                    <file-preview :media="{{ $movie->getMediaResource('movie_images') }}"></file-preview>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.movies.partials.actions.edit')
                    @include('dashboard.movies.partials.actions.delete')
                @endslot
            </x-adminlte.box>
        </div>
    </div>
@endsection
