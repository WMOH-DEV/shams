@extends('admin.main-layout')

@section('title')
    الرئيسية
@endsection

@section('navbar')
    <x-top-nav />
@endsection

@section('content')
    <!-- Hero -->
    <div class="content">
        <div
            class="d-md-flex rtl justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
            <div>
                <h5 class="h5 mb-1">
                    {{ __('global.Dashboard') }}
                </h5>

            </div>
            <div class="mt-4 mt-md-0">
                <p class="mb-0">
                    {{ __('global.welcome') }} <span>
                        {{Auth::user()->name}}
                    </span>
                </p>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <!-- Latest Orders + Stats -->
        <div class="row">
            <div class="col-md-9">
                <!--  Latest Orders -->
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header block-header-default">
                        <h3 class="block-title" style="font-size: 0.8rem">
                            {{ __('global.sales_report') }}
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <canvas class="js-chartjs-analytics-bars chartjs-render-monitor"
                                style="display: block; height: 345px; width: 690px;" width="828" height="350"></canvas>
                        {{-- <h5 class="text-center">{{ $chart->options['chart_title'] }}</h5>
                        {!! $chart->renderHtml() !!} --}}

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="block block-rounded block-mode-loading-refresh">
                            <div class="block-header block-header-default">
                                <h3 class="block-title" style="font-size: 0.8rem">
                                    {{ __('global.latest_requests') }}
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="timeline">
{{--                                    @foreach ($lastOrders as $order)--}}
                                        <li class="timeline-event">
                                            <div class="timeline-event-icon bg-danger">
                                                <i class="fas fa-donate"></i>
                                            </div>
                                            <div
                                                class="timeline-event-block block block-rounded js-appear-enabled animated fadeIn"
                                                data-toggle="appear">
                                                <div class="block-header block-header-default">
                                                    <div class="head">
                                                        <h3 class="block-title font-w600" style="font-size: 0.8rem">
                                                           username
                                                        </h3>
                                                        <div class="d-flex justify-between">
                                                            <span class="font-size-xs">
                                                                <i class="far fa-envelope"></i>
                                                                email@email.com
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="block-options">
                                                        <div
                                                            class="timeline-event-time block-options-item font-size-sm font-w400">
                                                            10/10/10
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        {{--                                    @endforeach--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="block block-rounded block-mode-loading-refresh">
                            <div class="block-header block-header-default">
                                <h3 class="block-title" style="font-size: 0.8rem">
                                    {{ __('global.latest_register') }}
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="timeline">

                                {{--                                @foreach ($lastRegisteredClients as $client)--}}
                                <!-- new buy -->
                                    <li class="timeline-event">
                                        <div class="timeline-event-icon bg-default">
                                            <i class="fas fa-user-alt"></i>
                                        </div>
                                        <div
                                            class="timeline-event-block block block-rounded js-appear-enabled animated fadeIn"
                                            data-toggle="appear">
                                            <div class="block-header block-header-default">
                                                <div class="head">
                                                    <h3 class="block-title font-w600" style="font-size: 0.8rem">
                                                       Ahmed
                                                    </h3>
                                                    <div class="d-flex justify-between">
                                                            <span class="font-size-xs">
                                                                <i class="far fa-envelope"></i>
                                                               ahmed@ahmed.com
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="block-options">
                                                    <div
                                                        class="timeline-event-time block-options-item font-size-sm font-w400">
                                                       20/20/20
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END new buy -->
                                    {{--                                    @endforeach--}}

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <div class="col-md-3 d-flex flex-column">
                <!-- Stats -->
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 p-2">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">32</div>
                        <div class="text-muted mb-3">عدد التجار</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="#">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 p-2">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">32</div>
                        <div class="text-muted mb-3">عدد العملاء</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="#">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1 p-2">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">32</div>
                        <div class="text-muted mb-3">عدد الطلبات</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="#">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>

                <!-- END Stats -->
            </div>
        </div>
        <!-- END Latest Orders + Stats -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/chart.js/Chart.bundle.min.js"></script>

    {{--    {!! $chart->renderChartJsLibrary() !!}--}}
    {{--    {!! $chart->renderJs() !!}--}}

    <script>
        class pageDashboard {
            /*
             * Chart.js, for more examples you can check out http://www.chartjs.org/docs
             *
             */
            static initChartsBars() {
                // Set Global Chart.js configuration
                Chart.defaults.global.defaultFontColor = '#495057';
                Chart.defaults.scale.gridLines.color = 'transparent';
                Chart.defaults.scale.gridLines.zeroLineColor = 'transparent';
                Chart.defaults.scale.ticks.beginAtZero = true;
                Chart.defaults.global.elements.line.borderWidth = 1;
                Chart.defaults.global.legend.labels.boxWidth = 12;

                // Get Chart Containers
                let chartBarsCon = jQuery('.js-chartjs-analytics-bars');

                // Set Chart and Chart Data variables
                let chartBars, chartLinesBarsData;

                // Bars Chart Data
                chartLinesBarsData = {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر',
                        'أكتوبر', 'نوقمبر', 'ديسمبر'
                    ],
                    datasets: [{
                        label: 'مبيعات الشهر',
                        fill: true,
                        backgroundColor: 'rgba(6, 101, 208, .6)',
                        borderColor: 'transparent',
                        pointBackgroundColor: 'rgba(6, 101, 208, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(6, 101, 208, 1)',
                        data: [23, 60, 59, 20, 59, 56, 73, 20, 15, 3, 60, 33]
                    }]
                };

                // Init Chart
                if (chartBarsCon.length) {
                    chartBars = new Chart(chartBarsCon, {
                        type: 'bar',
                        data: chartLinesBarsData,
                        options: {
                            tooltips: {
                                intersect: false,
                                callbacks: {
                                    label: function (tooltipItems, data) {
                                        return data.datasets[tooltipItems.datasetIndex].label + ': ' +
                                            tooltipItems.yLabel + ' تذكرة ';
                                    }
                                }
                            }
                        }
                    });
                }
            }

            /*
             * Init functionality
             *
             */
            static init() {
                this.initChartsBars();
            }
        }

        // Initialize when page loads
        jQuery(() => {
            pageDashboard.init();
        });

    </script>
@endsection
