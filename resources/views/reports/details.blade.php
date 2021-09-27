@extends('layout.main')
@section('title')
    {{ ucwords(str_replace('_', ' ', Request::segment(2)) . ' ' . Request::segment(1)) }}
@endsection
@section('style')
@endsection


@section('content')


    <div class="m-auto" style="width: 50%"><a class="btn btn-danger" href="{{ url('/reports') }}"><i
                class="fas fa-chevron-left"></i></a></div>
    @php
    $seg = Request::segment(2);
    $arr = explode('_', $seg);
    $id = $arr[1];
    @endphp
    <form action="{{ url('reports/detailed_' . $id) }}" method="post">
        @csrf
        <div class="card m-auto" style="width: 50%">
            <div class="card-header bg-success text-center text-white">
                Report Input
            </div>
            <div class="card-body">
                <div class="daterange mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Start Date
                        </div>
                        <div class="col-md-9">
                            {!! Form::date('startdate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="daterange mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            End Date
                        </div>
                        <div class="col-md-9">
                            {!! Form::date('enddate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>

                <div class="button mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">

                        </div>
                        <div class="col-md-9 text-center">
                            <input type="submit" name="submit" id="submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var startDate = $("#startdate").val()
            var endDate = $("#enddate").val()
            $('#submit').click(function() {
                // alert('Hello');
                window.location = [window.location, startDate, endDate, $("#sale_type").val() || 0, $(
                    "#location_id").val()].join("/");
            });
        });
        {{-- $(document).ready(function() --}}
        {{-- { --}}
        {{-- <?php $this->load->view('partial/daterangepicker'); ?> --}}

        {{-- $("#generate_report").click(function() --}}
        {{-- { --}}
        {{-- window.location = [window.location, start_date, end_date, $("#input_type").val() || 0, $("#location_id").val()].join("/"); --}}
        {{-- }); --}}
        {{-- }); --}}
    </script>
@endsection
