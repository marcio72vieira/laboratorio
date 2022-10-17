@extends('template.templateadmin')

@section('content-page')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">CHARTS JS</h1>
    {{-- https://www.nicesnippets.com/blog/laravel-8-charts-js-chart-example-tutorial --}}

    <div class="row">

        <div class="container">

            <div class="row">

                <div class="col-md-10 offset-md-1">

                    <div class="panel panel-default">

                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            {{ $etinia}} <br> {{ $associado }}

                            <canvas id="canvas" height="280" width="600"></canvas>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>

        //var etinia = <?php echo $etinia; ?>;
        //var associado = <?php echo $associado; ?>;
 

        var etinia = @php echo $etinia; @endphp;
        var associado = @php echo $associado; @endphp;
 
        var barChartData = {
            labels: etinia,
            datasets: [{
                label: 'Associado',
                backgroundColor: "blue",   // ou um código de cor qualquer "#e3e3e3",
                data: associado
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'line',    // bar, pie, line, 
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,

                    title: {
                        display: true,
                        text: 'Raça / Cor'
                    }
                }
            });
        };
    </script>


@endsection

