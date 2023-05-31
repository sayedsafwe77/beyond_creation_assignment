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
                            <th width="200">@lang('eventdays.attributes.event_day')</th>
                            <td>{{ $eventday->event_day }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">{{ trans('showtimes.plural') }}</th>
                        </tr>
                        <tr>
                            <th>@lang('showtimes.attributes.from')</th>
                            <th>@lang('showtimes.attributes.to')</th>
                        </tr>
                        @foreach ($eventday->showtimes as $showtime)
                            <tr>
                                <td>{{ $showtime->from }}</td>
                                <td>{{ $showtime->to }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.eventdays.partials.actions.edit')
                    @include('dashboard.eventdays.partials.actions.delete')
                @endslot
            </x-adminlte.box>
        </div>
    </div>
@endsection
