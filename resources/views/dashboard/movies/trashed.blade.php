@extends('adminlte::page')

@section('content')
    @include('dashboard.movies.partials.filter')
    <x-adminlte.table-box>

        @slot('title')
            @lang('movies.actions.list') ({{ count_formatted($movies->total()) }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <x-check-all-force-delete type="{{ \App\Models\Movie::class }}" :resource="trans('movies.plural')">
                    </x-check-all-force-delete>
                    <x-check-all-restore type="{{ \App\Models\Movie::class }}" :resource="trans('movies.plural')"></x-check-all-restore>
                </th>
            </tr>
            <tr>
                <th>
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('movies.attributes.name')</th>
                <th>@lang('movies.attributes.description')</th>
                {{-- <th>@lang('movies.attributes.to')</th> --}}
                <th>@lang('movies.attributes.deleted_at')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movies as $movie)
                <tr>
                    <td class="text-center">
                        <x-check-all-item :model="$movie"></x-check-all-item>
                    </td>
                    <td>
                        <img src="{{ $movie->getFirstMediaUrl('movie_images') }}" alt="{{ $movie->name }}"
                            class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $movie->name }}
                    </td>
                    <td>
                        {{ $movie->description }}
                    </td>
                    <td>{{ $movie->deleted_at->format('Y-m-d') }}</td>
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
