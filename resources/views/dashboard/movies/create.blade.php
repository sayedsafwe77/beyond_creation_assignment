@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('movies')->post(route('dashboard.movies.store')) }}
    <x-adminlte.box>
        @slot('title', trans('movies.actions.create'))

        @include('dashboard.movies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('movies.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
