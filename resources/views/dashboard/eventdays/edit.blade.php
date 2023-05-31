@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('showtimes')->putModel($showtime, route('dashboard.showtimes.update', $showtime)) }}
    <x-adminlte.box>
        @slot('title', trans('showtimes.actions.edit'))

        @include('dashboard.showtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('showtimes.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
