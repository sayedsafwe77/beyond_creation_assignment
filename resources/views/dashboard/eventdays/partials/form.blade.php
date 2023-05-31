@include('dashboard.errors')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        {{ BsForm::date('event_day') }}
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        {{ BsForm::select('showtimes[]')->options($showtimes_array)->multiple(true)->placeholder('Select Showtime')->label(trans('showtimes.singular')) }}
    </div>
</div>
