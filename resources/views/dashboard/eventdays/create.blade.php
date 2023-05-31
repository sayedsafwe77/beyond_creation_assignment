@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('showtimes')->post(route('dashboard.showtimes.store')) }}
    <x-adminlte.box>
        @slot('title', trans('showtimes.actions.create'))

        @include('dashboard.showtimes.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('showtimes.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
