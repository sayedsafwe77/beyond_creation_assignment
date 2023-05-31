<x-components-box>
    {{ BsForm::resource('showtime')->get(url()->current()) }}
    @slot('title', trans('showtimes.filter'))
    <div class="row">
        <div class="col-md-6">
            {{ BsForm::time('from')->value(request('from'))->label(trans('showtimes.attributes.from')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::time('to')->value(request('to'))->label(trans('showtimes.attributes.to')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')->value(request('perPage', 15))->min(1)->label(trans('showtimes.perPage')) }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa fa-fw fa-filter"></i>
        @lang('showtimes.actions.filter')
    </button>
</x-components-box>
{{ BsForm::close() }}
