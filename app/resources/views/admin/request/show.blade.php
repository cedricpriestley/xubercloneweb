@extends('admin.layout.base')

@section('title', 'Request details ')

@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h4>Request details</h4>
            <a href="{{ route('admin.requests.index') }}" class="btn btn-default pull-right">
                <i class="fa fa-angle-left"></i> Back
            </a>
            <div class="row">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">User Name :</dt>
                        <dd class="col-sm-8">{{$request->user->first_name}}</dd>

                        <dt class="col-sm-4">Provider Name :</dt>
                        @if($request->provider)
                        <dd class="col-sm-8">{{$request->provider->first_name}}</dd>
                        @else
                        <dd class="col-sm-8">Provider not yet assigned!</dd>
                        @endif

                        <dt class="col-sm-4">Total Distance :</dt>
                        <dd class="col-sm-8">{{$request->distance ? $request->distance : '-'}}</dd>

                        @if($request->status == 'SCHEDULED')
                        <dt class="col-sm-4">Ride Scheduled Time :</dt>
                        <dd class="col-sm-8">
                            @if($request->schedule_at != "0000-00-00 00:00:00")
                                {{date('jS \of F Y h:i:s A', strtotime($request->schedule_at)) }} 
                            @else
                                - 
                            @endif
                        </dd>
                        @else
                        <dt class="col-sm-4">Ride Start Time :</dt>
                        <dd class="col-sm-8">
                            @if($request->started_at != "0000-00-00 00:00:00")
                                {{date('jS \of F Y h:i:s A', strtotime($request->started_at)) }} 
                            @else
                                - 
                            @endif
                         </dd>

                        <dt class="col-sm-4">Ride End Time :</dt>
                        <dd class="col-sm-8">
                            @if($request->finished_at != "0000-00-00 00:00:00") 
                                {{date('jS \of F Y h:i:s A', strtotime($request->finished_at)) }}
                            @else
                                - 
                            @endif
                        </dd>
                        @endif

                        <dt class="col-sm-4">Pickup Address :</dt>
                        <dd class="col-sm-8">{{$request->s_address ? $request->s_address : '-' }}</dd>

                        <dt class="col-sm-4">Drop Address :</dt>
                        <dd class="col-sm-8">{{$request->d_address ? $request->d_address : '-' }}</dd>

                        @if($request->payment)
                        <dt class="col-sm-4">Base Price :</dt>
                        <dd class="col-sm-8">{{ currency($request->payment->fixed) }}</dd>

                        <dt class="col-sm-4">Tax Price :</dt>
                        <dd class="col-sm-8">{{ currency($request->payment->tax) }}</dd>

                        <dt class="col-sm-4">Total Amount :</dt>
                        <dd class="col-sm-8">{{ currency($request->payment->total) }}</dd>
                        @endif

                        <dt class="col-sm-4">Ride Status : </dt>
                        <dd class="col-sm-8">
                            {{ $request->status }}
                        </dd>

                    </dl>
                </div>
                <?php 
                $map_icon = asset('asset/img/marker-start.png');
                $static_map = "https://maps.googleapis.com/maps/api/staticmap?autoscale=1&size=1000x400&maptype=roadmap&format=png&visual_refresh=true&markers=icon:".$map_icon."%7C".$request->s_latitude.",".$request->s_longitude."&markers=icon:".$map_icon."%7C".$request->d_latitude.",".$request->d_longitude."&path=color:0x191919|weight:8|".$request->s_latitude.",".$request->s_longitude."|".$request->d_latitude.",".$request->d_longitude."&key=".env('GOOGLE_MAP_KEY'); ?>
                    <div class="col-md-6">
                        <div id="map" style="background-image: url({{ $static_map }}); background-repeat: no-repeat;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style type="text/css">
    #map {
        height: 100%;
        min-height: 400px;
    }
</style>
@endsection