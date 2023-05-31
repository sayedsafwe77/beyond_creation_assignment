@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('eventdays')->post(route('dashboard.eventdays.store')) }}
    <x-adminlte.box>
        @slot('title', trans('eventdays.actions.create'))

        @include('dashboard.eventdays.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventdays.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
