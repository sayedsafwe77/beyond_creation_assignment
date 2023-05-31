@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-adminlte.box>
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')
                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('showtimes.attributes.from')</th>
                            <td>{{ $showtime->from }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('showtimes.attributes.to')</th>
                            <td>{{ $showtime->to }}</td>
                        </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.showtimes.partials.actions.edit')
                    @include('dashboard.showtimes.partials.actions.delete')
                @endslot
            </x-adminlte.box>
        </div>
    </div>
@endsection
