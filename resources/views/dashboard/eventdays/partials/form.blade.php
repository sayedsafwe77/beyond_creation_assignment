@include('dashboard.errors')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        {{ BsForm::time('from') }}
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        {{ BsForm::time('to') }}
    </div>
</div>
