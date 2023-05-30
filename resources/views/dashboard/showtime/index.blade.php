@extends('adminlte::page')

@include('dashboard.showtime.partials.filter')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@component('dashboard::components.table-box')
    @slot('title')
        @lang('showtimes.actions.list') ({{ $showtimes->total() }})
    @endslot

    <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete type="{{ \App\Models\Showtime::class }}" :resource="trans('showtimes.plural')"></x-check-all-delete>
                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.showtime.partials.actions.create')
                        @include('dashboard.showtime.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
                <x-check-all></x-check-all>
            </th>
            <th>@lang('showtimes.attributes.code')</th>
            <th>@lang('showtimes.attributes.name')</th>
            <th>@lang('showtimes.attributes.price')</th>
            <th>@lang('showtimes.attributes.interface')</th>
            <th>@lang('showtimes.attributes.discount')</th>
            <th>@lang('showtimes.attributes.quantity')</th>
            <th>@lang('categories.attributes.%name%')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    {{-- <tbody> --}}
    @forelse($showtimes as $product)
        <tr>
            <td class="text-center">
                <x-check-all-item :model="$product"></x-check-all-item>
            </td>
            <td>
                {{ $product->code }}
            </td>
            <td>
                <a href="{{ route('dashboard.showtimes.show', $product) }}" class="text-decoration-none text-ellipsis">

                    <img src="{{ $product->getFirstMediaUrl() }}" alt="{{ $product->name }}"
                        class="img-circle img-size-32 mr-2" style="height: 32px;">
                    {{ $product->name }}
                </a>
            </td>

            <td>
                {{ $product->price }}
            </td>
            <td>
                {{ $product->interface == 0 ? 'no' : 'yes' }}
            </td>
            <td>
                {{ $product->discount }}
            </td>
            <td>
                {{ $product->quantity }}
            </td>
            <td>
                {{ $product->category ? $product->category->name : '' }}
            </td>
            <td>{{ $product->created_at->format('Y-m-d') }}</td>
            <td style="width: 160px">
                {{-- @include('dashboard.showtimes.partials.actions.show')
                    @include('dashboard.showtimes.partials.actions.edit')
                    @include('dashboard.showtimes.partials.actions.delete') --}}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('showtimes.empty')</td>
        </tr>
    @endforelse

    @if ($showtimes->hasPages())
        @slot('footer')
            {{ $showtimes->links() }}
        @endslot
    @endif
@endcomponent
