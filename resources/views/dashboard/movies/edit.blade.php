@extends('adminlte::page')
@section('content')
    {{ BsForm::resource('movies')->putModel($movie, route('dashboard.movies.update', $movie)) }}
    <x-adminlte.box>
        @slot('title', trans('movies.actions.edit'))

        @include('dashboard.movies.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('movies.actions.save')) }}
        @endslot
    </x-adminlte.box>
    {{ BsForm::close() }}
@endsection
