@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white border shadow text-center">
                <div class="card-body">
                    <h1>Athena Science Academy</h1>
                    <h5>You are at <span class="text-capitalize">{{ auth()->user()->type }}</span> Mode for creating Full Course</h5>
                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.components.module.dashboard.dashboard_course_table')
    @include('backend.admin.components.module.dashboard.admin_tools')
    @include('backend.admin.components.module.dashboard.front_dashboard')
{{--    @include('backend.admin.components.module.dashboard.chart_one')--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-dark border">
                <div class="card-header">
                    <h3>Disk Information</h3>
                </div>
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Total Disk : {{ $arr['total_limit'] }} GB</h4>
                        </div>
                        <div class="col-md-4">
                            <h4>Total Disk Used: {{ $arr['total_using'] }} GB</h4>
                        </div>
                        <div class="col-md-4">
                            <h4>Disk Remaining Space: {{ $arr['total_limit'] - $arr['total_using'] }} GB</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="col-12">
                        <div class="card border shadow">
                            <div class="card-header bg-dark">
                                <h4 class="header-title text-white">Total website visitors</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="visitorCountChart" style="width: 100%;height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card border shadow">
                        <div class="card-header bg-dark">
                            <h4 class="header-title text-white">Registered Student </h4>
                        </div>
                        <div class="card-body">
                            <canvas id="userChart" style="width: 100%;height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
                {{--<div class="col-md-12 mb-3">
                    <div class="col-12">
                        <div class="card border shadow">
                            <div class="card-header bg-dark">
                                <h4 class="header-title text-white">Website User By Browser</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="browserUsageChart" style="width: 100%;height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                --}}


            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border shadow">
                        <div class="card-header bg-dark">
                            <h4 class="header-title text-white">Total website visitors</h4>
                        </div>
                        <div class="card-body">
                            <h1>{{ $totalVisitor ?? '0' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border shadow">
                        <div class="card-header bg-dark">
                            <h4 class="header-title text-white">Top Course</h4>
                        </div>
                        <div class="card-body">
                            @foreach($topCourse as $course)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="" style="width: 50px;height: 50px;overflow:hidden">
                                        <img style="width:100%;height: 100%" src="{{ asset($course->image) ?? defaultImage() }}" alt="">
                                    </div>
                                    <div class="text-left">{{ $course->title ?? '' }}</div>
                                    <div class="">{{ $course->view_count }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($months) ?>,
                datasets: [{
                    label: 'Number of Users',
                    data: <?= json_encode($userCounts) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



        var visitorData = <?= json_encode($visitorData) ?>;
        var dateLabels = [];
        var visitorCounts = [];

        visitorData.forEach(function(item) {
            dateLabels.push(item.date);
            visitorCounts.push(item.count);
        });

        var ctx = document.getElementById('visitorCountChart').getContext('2d');
        var visitorCountChart = new Chart(ctx, {
            type: 'line', // Line chart is suitable for displaying trends over time
            data: {
                labels: dateLabels,
                datasets: [{
                    label: 'Visitor Count',
                    data: visitorCounts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
{{--var browserData = <?= json_encode($browserData) ?>;--}}
{{--var browserLabels = [];--}}
{{--var browserCounts = [];--}}
{{--var randomColors = [];--}}

{{--// Function to generate a random color--}}
{{--function getRandomColor() {--}}
{{--var letters = '0123456789ABCDEF';--}}
{{--var color = '#';--}}
{{--for (var i = 0; i < 6; i++) {--}}
{{--color += letters[Math.floor(Math.random() * 16)];--}}
{{--}--}}
{{--return color;--}}
{{--}--}}
{{--browserData.forEach(function(item) {--}}
{{--// Extract browser names from user agent strings--}}
{{--//var browserName = parseUserAgent(item.browser);--}}
{{--browserLabels.push(item.browser);--}}
{{--browserCounts.push(item.count);--}}
{{--// Generate a random color for each browser--}}
{{--randomColors.push(getRandomColor());--}}
{{--});--}}

{{--var ctx = document.getElementById('browserUsageChart').getContext('2d');--}}
{{--var browserUsageChart = new Chart(ctx, {--}}
{{--type: 'pie', // Pie chart is suitable for displaying proportions--}}
{{--data: {--}}
{{--labels: browserLabels,--}}
{{--datasets: [{--}}
{{--data: browserCounts,--}}
{{--backgroundColor: randomColors,--}}
{{--borderWidth: 1--}}
{{--}]--}}
{{--},--}}
{{--options: {--}}
{{--responsive: true,--}}
{{--legend: {--}}
{{--display: true,--}}
{{--position: 'bottom'--}}
{{--}--}}
{{--}--}}
{{--});--}}

