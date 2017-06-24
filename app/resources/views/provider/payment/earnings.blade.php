@extends('provider.layout.app')

@section('content')
<div class="pro-dashboard-head">
        <div class="container">
            <a href="{{url('provider/earnings')}}" class="pro-head-link active">Payment Statements</a>
             <a href="{{url('provider/upcoming')}}" class="pro-head-link">Upcoming</a>
   <!--         <a href="new-provider-patner-invoices.html" class="pro-head-link">Payment Invoices</a>
            <a href="new-provider-banking.html" class="pro-head-link">Banking</a> -->
        </div>
    </div>

    <div class="pro-dashboard-content">
        <!-- Earning head -->
        <div class="earning-head">
            <div class="container">
                <div class="earning-element">
                    <p class="earning-txt">TOTAL EARNINGS</p>
                    <p class="earning-price" id="set_fully_sum">00.00</p>
                </div>
                <div class="earning-element row no-margin">

                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="earning-box">
                            <p class="dashboard-count">{{$today}}</p>
                            <p class="dashboard-txt">TRIPS COMPLETED TODAY</p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="earning-box">
                            <p class="dashboard-count">{{Setting::get('daily_target',0)}}</p>
                            <p class="dashboard-txt">DAILY TRIP TARGET </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="earning-box">
                            <p class="dashboard-count">{{$provider[0]->accepted->count()}}</p>
                            <p class="dashboard-txt">FULLY COMPLETED TRIPS</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="earning-box">
                            <p class="dashboard-count">
                            @if($provider[0]->accepted->count() != 0)
                                {{$provider[0]->accepted->count()/$provider[0]->accepted->count()*100}}%
                            @else
                            	0%
                            @endif
                            </p>
                            <p class="dashboard-txt">ACCEPTANCE RATE</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
                        <div class="earning-box">
                            <p class="dashboard-count">
                                {{$provider[0]->cancelled->count()}}
                            </p>
                            <p class="dashboard-txt">DRIVER CANCELLATIONS</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End of earning head -->

        <!-- Earning Content -->
        <div class="earning-content gray-bg">
            <div class="container">

                <!-- Earning section -->
                <div class="earning-section pad20 row no-margin">
                    <div class="earning-section-head">
                        <h3 class="earning-section-tit">Weekly Earnings</h3>
                    </div>

                    <!-- Earning acc-wrapper -->
                    <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 no-padding"">
                        <div class="earn-acc-wrapper">
                            <div class="earning-acc pad20">
                                <!-- Earning acc head -->
                                <div class="row no-margin">
                                    <div class="pull-left trip-left">
                                        <h3 data-toggle="collapse" data-target="#demo1" class="accordion-toggle collapsed acc-tit">
                                            <span class="arrow-icon fa fa-chevron-right"></span>Trip Earnings
                                        </h3>
                                    </div>
                                </div>
                                <!-- End of eaning acc head -->
                                <!-- Earning acc body -->
                                <div class="accordian-body earning-acc-body collapse row" id="demo1">
                                    <table class="table table-condensed table-responsive" style="border-collapse:collapse;">
                                        <tbody>
                                        <?php $sum_weekly = 0; ?>
                                        @foreach($weekly as $day)
                                            <tr>
                                                <td>{{date('Y-m-d',strtotime($day->created_at))}} - {{$day->created_at->diffForHumans()}}</td>
                                                <td class="text-right">
                                                @if($day->payment != "")
                                                <?php 
                                                $current_sum = 0;
                                                $current_sum = $day->payment->tax + $day->payment->fixed + $day->payment->distance + $day->payment->commision;
                                                $sum_weekly += $current_sum; ?>
                                                	{{currency($current_sum)}}
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End of earning acc-body -->
                            </div>
                            <div class="earning-acc pad20 border-top">
                                <div class="row no-margin">
                                    <div class="pull-left trip-left">
                                        <h3 class="acc-tit estimate-tit">
                                            Estimated Payout
                                        </h3>
                                    </div>

                                    <div class="pull-right trip-right">
                                        <p class="earning-cost no-margin">{{currency($sum_weekly)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of earning acc-wrapper -->
                </div>
                <!-- End of earning section -->

                <!-- Earning section -->
                <div class="earning-section earn-main-sec pad20">
                    <!-- Earning section head -->
                    <div class="earning-section-head row no-margin">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-left-padding">
                            <h3 class="earning-section-tit">Daily Earnings</h3>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="daily-earn-right text-right">
                                <div class="status-block display-inline row no-margin">
                                    <form class="form-inline status-form">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select type="password" class="form-control mx-sm-3">
                                                <option>All Trips</option>
                                                <option>Completed</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- View tab -->
                                <!-- <div class="display-inline view-tab row no-margin">
                                    <p class="display-inline view-txt">View</p>
                                    <div class="view-options display-inline">
                                        <a href="javascript:void(0)" class="view-icon list-btn active"><i class="ion-ios-more"></i></a>
                                        <a href="javascript:void(0)" class="view-icon grid-btn"><i class="ion-navicon-round"></i></a>
                                    </div>
                                </div> -->
                                <!-- End of view tab -->
                            </div>
                        </div>
                    </div>
                    <!-- End of earning section head -->

                    <!-- Earning-section content -->
                    <div class="tab-content list-content">
                        <div class="list-view pad30 ">
                            <!-- <div class="week-list row no-margin">
                                <a href="#" class="week-list-item">
                                    <span>Mon, Feb 1</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Tues, Feb 2</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Wed, Feb 3</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Thurs, Feb 4</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Fri, Feb 5</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Sat, Feb 6</span>
                                    <span>-</span>
                                </a>
                                <a href="#" class="week-list-item">
                                    <span>Sun, Feb 7</span>
                                    <span>-</span>
                                </a>
                            </div> -->
                            <table class="earning-table table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Pickup Time</th>
                                        <th>Vehicle</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Distance(KM)</th>
                                        <th>Cash Collected</th>
                                        <th>Total Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $fully_sum = 0; ?>
                                @foreach($fully as $each)
                                    <tr>
                                        <td>{{date('Y D, M d - H:i A',strtotime($each->created_at))}}</td>
                                        <td>
                                        	@if($each->service_type)
                                        		{{$each->service_type->name}}
                                        	@endif
                                        </td>
                                        <td>
                                        	@if($each->finished_at != "" && $each->started_at != "") 
                                        		{{$each->finished_at->diffForHumans($each->started_at)}}
                                        	@else
                                        		-
                                        	@endif
                                        </td>
                                        <td>{{$each->status}}</td>
                                        <td>{{$each->distance}}Kms</td>
                                        <td>
                                        	@if($each->payment != "")
                                        		<?php $each_sum = 0;
                                        		$each_sum = $each->payment->tax + $each->payment->fixed + $each->payment->distance + $each->payment->commision;
                                        		$fully_sum += $each_sum;
                                        		?>

                                        		{{currency($each_sum)}}
                                        	@endif
                                        </td>
                                        <td>{{currency($fully_sum)}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="grid-view" style="display: none;">
                        
                            <div class="earning-acc grid-view-item pad20">
                                <div class="grid-view-head row no-margin">
                                    <div class="pull-left">
                                        <h3 data-toggle="collapse" data-target="#grid1" class="accordion-toggle collapsed acc-tit">
                                            <span class="arrow-icon fa fa-chevron-right"></span>
                                        </h3>
                                    </div>
                                    <div class="pull-right">
                                        <p class="earning-cost no-margin"></p>
                                    </div>
                                </div>
                                <div class="accordian-body grid-view-section earning-acc-body collapse row" id="grid1">
                                    <table class="earning-table table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Pickup Time</th>
                                                <th>Vehicle</th>
                                                <th>Duration</th>
                                                <th>Distance(KM)</th>
                                                <th>Cash Collected</th>
                                                <th>Total Earnings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>03.00PM</td>
                                                <td>Audi</td>
                                                <td></td>
                                                <td>10</td>
                                                <td>$10.00</td>
                                                <td>$100.00</td>
                                            </tr>
                                            <tr>
                                                <td>03.00PM</td>
                                                <td>Audi</td>
                                                <td>30Mins</td>
                                                <td>10</td>
                                                <td>$10.00</td>
                                                <td>$100.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            
                        </div> -->
                    </div>
                <!-- End of earning section -->
            </div>
        </div>
        <!-- Endd of earning content -->
    </div>                
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	document.getElementById('set_fully_sum').textContent = "{{currency($fully_sum)}}";
</script>
@endsection