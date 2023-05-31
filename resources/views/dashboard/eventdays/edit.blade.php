@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('eventdays')->putModel($eventday, route('dashboard.eventdays.update', $eventday)) }}
    <x-adminlte.box>
        @slot('title', trans('eventdays.actions.edit'))

        @include('dashboard.eventdays.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('eventdays.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
