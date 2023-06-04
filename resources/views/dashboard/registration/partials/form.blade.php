@include('dashboard.errors')
@bsMultilangualFormTabs
    {{ BsForm::text('name') }}
    {{ BsForm::text('description') }}
@endBsMultilangualFormTabs
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        {{ BsForm::select('event_days_show_times[]')->options($eventShowTimes_array)->multiple(true)->placeholder('Select Event Day')->label(trans('eventdays.singular')) }}
    </div>

</div>
{{-- @dd($movie->getMedia('movie_images')[0]->collection_name) --}}
<div class="row" id="app">
    {{-- {{ BsForm::image('movie_images')->collection('avatars')->maxWidth(500)->maxHeight(500) }} --}}
    <file-uploader :media="{{ isset($movie) ? $movie->getMediaResource('movie_images') : '[]' }}" :unlimited="true"
        collection="movie_images" :tokens="{{ json_encode(old('movie_images', [])) }}" label="Upload movie images"
        notes="Supported types: jpeg, png,jpg,gif" accept="image/jpeg,image/png,image/jpg,image/gif">
    </file-uploader>
</div>
