@extends('layouts.admin')

@section('content')

    <div class="text-center text-white row">
        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-gamepad fa-4x fa-fw"></i>
                    </div>
                    <h4 class="card-title">Number of Games</h4>
                    <p class="card-text">{{ $gameCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-dollar-sign fa-4x fa-fw"></i>
                    </div>
                    <h4 class="card-title">Average Price</h4>
                    <p class="card-text">{{ currency($gamePrice) }}</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-sitemap fa-4x fa-fw"></i>
                    </div>
                    <h4 class="card-title">Number of Genres</h4>
                    <p class="card-text">{{ $genreCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light mt-3">
        <div class="card-body" id="chart-container-average" style="max-height: 400px;">
            <div class="text-center">
                <i class="fas fa-spinner fa-spin text-black-50 fa-3x" id="loading"></i>
            </div>
        </div>
    </div>

    <div class="card bg-light mt-3">
        <div class="card-body" id="chart-container-genres" style="max-height: 400px;">
            <div class="text-center">
                <i class="fas fa-spinner fa-spin text-black-50 fa-3x" id="loading"></i>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" charset="utf-8"></script>
    <script>
        $.get('{{ route('admin.report.average') }}', function(data) {
            var labels = [];
            var prices = [];
            for (var element of data) {
                labels.push(element.genre.name);
                prices.push(element.averagePrice);
            }

            makeChart('average', 'Average Price by Genre', labels, prices);
        });

        $.get('{{ route('admin.report.genres') }}', function(data) {
            var labels = [];
            var prices = [];
            for (var element of data) {
                labels.push(element.name);
                prices.push(element.games_count);
            }

            makeChart('genres', 'Numbers of Games by Genre', labels, prices);
        });

        function makeChart(id, title, labels, data) {
            $('#chart-container-' + id).html('<canvas id="chart-'+ id +'"></canvas>');
            var ctx = document.getElementById('chart-' + id).getContext('2d');

            return new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: title,
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 255, 255, 0.2)',
                            'rgba(245, 111, 211, .2)',
                            'rgba(59,252,75,.2)',
                            'rgba(248,252,59,.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 255, 255, 1)',
                            'rgba(245, 111, 211, 1)',
                            'rgba(59,252,75,1)',
                            'rgba(248,252,59,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    </script>
@endsection
