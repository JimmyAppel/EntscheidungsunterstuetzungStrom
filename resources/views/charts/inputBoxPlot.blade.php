<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>


<div id="app">
    @include('layouts.partials._navigation')
    <div class="container">
        <main class="py-4">
            @include('layouts.partials.alerts._alerts')
            <div class="row justify-content-center">
                <div class="col-md-3">
                    @include('account.layouts.partials._navigation')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <h5 class="card-header">Box-Plot</h5>
                        <div class="card-body">
                            <form class="form-horizontal" method="GET" action="{{ route('chart.boxplot') }}" >
                                {{ csrf_field() }}
                                <br>
                                <div class="card row">
                                    <div class="card-header">
                                        <h6>Date</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-group">
                                            <div class="card " style="width: 18rem;">
                                                <div class="card-header">
                                                    <h7>
                                                        <span data-feather="calendar"></span>
                                                        Start month
                                                    </h7>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group {{$errors->has('start_day') ? 'has-error':''}}">
                                                        <input class="date form-control" type="text" name="start_month" id="start">
                                                        @error('start_month')
                                                        <small class = "form-text text-danger">{{$errors->first('start_month')}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><div class="card" style="width: 18rem;">
                                                <div class="card-header">
                                                    <h7>
                                                        <span data-feather="calendar"></span>
                                                        End month</h7>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group {{$errors->has('end_month') ? 'has-error':''}} ">
                                                        <input class="date form-control" type="text" name="end_month" id="end_day">
                                                        @error('end_month')
                                                        <small class = "form-text text-danger">{{$errors->first('end_month')}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-check"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts.footer')
</div>
@yield('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script type="text/javascript">
    feather.replace();


    var end = {!! json_encode($end) !!};
    var start = {!! json_encode($start) !!};

    $('.date').datepicker( {
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months",
        startDate: start,
        endDate: end
    });

</script>


</body>
</html>


