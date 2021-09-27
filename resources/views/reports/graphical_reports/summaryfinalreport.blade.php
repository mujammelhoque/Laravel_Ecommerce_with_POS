@extends('layout.main')
@section('title')
   Reports
@endsection
@section('style')
@endsection


@section('content')
<div class="text-end mb-2">
  
    <a href="javascript:void (0)" id="print" class=" btn mybtn-info fw-light"><i class="fas fa-print"></i> &nbsp; Print</a>
  </div>
<h1 class="text-center">New {{$tital}} Growth, {{ $startdate }} <strong>To</strong> {{ $enddate }}</h1>
    <div id="container">

    </div>
@endsection
@section('script')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
     var tital = <?php echo $tital;?>;
</script>

<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;

    Highcharts.chart('container', {
        // title: {
        //     text: 'New Customer Growth, 2020'
        // },
        // subtitle: {
        //     text: 'Source:ospos.io'
        // },

        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: '{{ $name }}',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>


    
@endsection


