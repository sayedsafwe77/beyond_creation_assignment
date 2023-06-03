<x-components-box>
    {{ BsForm::resource('movie')->get(url()->current()) }}
    @slot('title', trans('movies.filter'))
    <div class="row">
        <div class="col-md-6">
            {{ BsForm::text('name')->value(request('name'))->label(trans('movies.attributes.name')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::text('description')->value(request('description'))->label(trans('movies.attributes.description')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')->value(request('perPage', 15))->min(1)->label(trans('movies.perPage')) }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa fa-fw fa-filter"></i>
        @lang('movies.actions.filter')
    </button>
</x-components-box>
{{ BsForm::close() }}
