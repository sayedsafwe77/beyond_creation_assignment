@extends('adminlte::page')
@section('content')
    @include('dashboard.movies.partials.filter')
    <x-adminlte.table-box>
        @slot('title')
            @lang('movies.actions.list') ({{ $movies->total() }})
        @endslot
        <thead>
            <tr>
                <th colspan="100">
                    <div class="d-flex">
                        <x-check-all-delete type="{{ \App\Models\Movie::class }}" :resource="trans('movies.plural')"></x-check-all-delete>
                        <div class="ml-2 d-flex justify-content-between flex-grow-1">
                            @include('dashboard.movies.partials.actions.create')
                            @include('dashboard.movies.partials.actions.trashed')
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="width: 30px;" class="text-center">
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('movies.attributes.name')</th>
                <th>@lang('movies.attributes.description')</th>
                <th style="width: 160px">...</th>
            </tr>
        </thead>

        @forelse($movies as $movie)
            <tr>
                <td class="text-center">
                    <x-check-all-item :model="$movie"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.movies.show', $movie) }}" class="text-decoration-none text-ellipsis">
                        <img src="{{ $movie->getFirstMediaUrl('movie_images') }}" alt="{{ $movie->name }}"
                            class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $movie->name }}
                    </a>
                </td>
                <td>
                    {{ $movie->description }}
                </td>


                <td style="width: 160px">
                    @include('dashboard.movies.partials.actions.show')
                    @include('dashboard.movies.partials.actions.edit')
                    @include('dashboard.movies.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('movies.empty')</td>
            </tr>
        @endforelse

        @if ($movies->hasPages())
            @slot('footer')
                {{ $movies->links() }}
            @endslot
        @endif
    </x-adminlte.table-box>
@endsection
