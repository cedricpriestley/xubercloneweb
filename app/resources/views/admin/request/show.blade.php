@extends('admin.layout.base')

@section('title', 'Request details ')

@section('content')
<pre>
<?php //var_dump($request->service_type);exit;?>
</pre>
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
                        <dt class="col-sm-4">Client Name :</dt>
                        <dd class="col-sm-8">{{$request->user->first_name}} {{$request->user->last_name}}</dd>

                        <dt class="col-sm-4">Contractor Name :</dt>
                        @if($request->provider)
                        <dd class="col-sm-8">{{$request->provider->first_name}} {{$request->provider->last_name}}</dd>
                        @else
                        <dd class="col-sm-8">Provider not yet assigned!</dd>
                        @endif

                        <dt class="col-sm-4">Solicitation # :</dt>
                        <dd class="col-sm-8">{{$request->service_type->solnbr}}</dd>

                        <dt class="col-sm-4">Subject :</dt>
                        <dd class="col-sm-8">{{$request->service_type->subject}}</dd>

                        <dt class="col-sm-4">Agency :</dt>
                        <dd class="col-sm-8">{{$request->service_type->agency}}</dd>

                        <dt class="col-sm-4">Office :</dt>
                        <dd class="col-sm-8">{{$request->service_type->office}}</dd>

                        <dt class="col-sm-4">Address :</dt>
                        <dd class="col-sm-8">{{$request->service_type->location}}</dd>

                        <dt class="col-sm-4">Type :</dt>
                        <dd class="col-sm-8">{{$request->service_type->type}}</dd>

                        <dt class="col-sm-4">Set-aside :</dt>
                        <dd class="col-sm-8">{{$request->service_type->setaside}}</dd>

                        <dt class="col-sm-4">Posted Date :</dt>
                        <dd class="col-sm-8">{{$request->service_type->date}}</dd>
<!--
                        <dt class="col-sm-4">Description :</dt>
                        <dd class="col-sm-8">{{$request->service_type->desc}}</dd>
-->
                        @if($request->payment)
<!--
                        <dt class="col-sm-4">Price :</dt>
                        <dd class="col-sm-8">{{ currency($request->payment->fixed) }}</dd>
-->
                        <dt class="col-sm-4">Total Amount :</dt>
                        <dd class="col-sm-8">{{ currency($request->payment->total) }}</dd>
                        @endif

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