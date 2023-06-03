<x-components-box>
    {{ BsForm::resource('eventday')->get(url()->current()) }}
    @slot('title', trans('eventdays.filter'))
    <div class="row">
        <div class="col-md-6">
            {{ BsForm::date('from')->value(request('from'))->label(trans('showtimes.attributes.from')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::date('to')->value(request('to'))->label(trans('showtimes.attributes.to')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')->value(request('perPage', 15))->min(1)->label(trans('eventdays.perPage')) }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa fa-fw fa-filter"></i>
        @lang('eventdays.actions.filter')
    </button>
</x-components-box>
{{ BsForm::close() }}
