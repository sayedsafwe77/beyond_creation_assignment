@section('content_header')
    <div class="md-6 filter-section">
        {{ $slot }}
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection
