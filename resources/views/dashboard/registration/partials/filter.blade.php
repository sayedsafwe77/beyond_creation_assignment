<x-components-box>
    {{ BsForm::resource('registrations')->get(url()->current()) }}
    @slot('title', trans('registeration.filter'))
    <div class="row">
        <div class="col-md-6">
            {{ BsForm::text('name')->value(request('name'))->label(trans('registration.attributes.name')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::text('email')->value(request('email'))->label(trans('registration.attributes.email')) }}
        </div>
        <div class="col-md-6">
            {{ BsForm::text('mobile')->value(request('mobile'))->label(trans('registration.attributes.mobile')) }}
        </div>
        {{-- <div class="col-md-6">
            {{ BsForm::text('movie')->value(request('description'))->label(trans('registration.attributes.description')) }}
        </div> --}}
        <div class="col-md-6">
            {{ BsForm::number('perPage')->value(request('perPage', 15))->min(1)->label(trans('registration.perPage')) }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa fa-fw fa-filter"></i>
        @lang('registration.actions.filter')
    </button>
</x-components-box>
{{ BsForm::close() }}
