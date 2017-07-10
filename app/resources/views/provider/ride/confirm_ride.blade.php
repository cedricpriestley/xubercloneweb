@extends('provider.layout.app')

@section('title', 'View Contract ')

@section('content')
<div class="row no-margin">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{url('create/ride')}}" method="POST" id="create_ride">
        {{ csrf_field() }}
            <dl class="dl-horizontal left-right">
                <dt>Price</dt>
                <dd>{{currency($service->fixed)}}</dd>
                <dt>Solicitation #</dt>
                <dd>{{ $service->solnbr }}</dd>
                <dt>Posted Date</dt>
                <dd>{{ $service->date }}</dd>
                <dt>Type</dt>
                <dd>{{ $service->type }}</dd>
                <dt>Subject</dt>
                <dd>{{ $service->subject }}</dd>
                <dt>Agency</dt>
                <dd>{{ $service->agency }}</dd>
                <dt>Office</dt>
                <dd>{{ $service->office }}</dd>
                <dt>Location</dt>
                <dd>{{ $service->location }}</dd>
                <dt>Set-aside</dt>
                <dd>{{ $service->setaside }}</dd>
                <dt>Description</dt>
                <dd>{{ $service->desc }}</dd>
                <hr>
                @if(Auth::user()->wallet_balance > 0)

                <input type="checkbox" name="use_wallet" value="1"><span style="padding-left: 15px;">@lang('user.use_wallet_balance')</span>
                <br>
                <br>
                    <dt>@lang('user.available_wallet_balance')</dt>
                    <dd>{{currency(Auth::user()->wallet_balance)}}</dd>
                @endif
            </dl>

            <input type="hidden" name="s_address" value="{{Request::get('s_address')}}">
            <input type="hidden" name="d_address" value="{{Request::get('d_address')}}">
            <input type="hidden" name="s_latitude" value="{{Request::get('s_latitude')}}">
            <input type="hidden" name="s_longitude" value="{{Request::get('s_longitude')}}">
            <input type="hidden" name="d_latitude" value="{{Request::get('d_latitude')}}">
            <input type="hidden" name="d_longitude" value="{{Request::get('d_longitude')}}">
            <input type="hidden" name="service_type" value="{{Request::get('service_type')}}">
            <input type="hidden" name="distance" value="{{$fare->distance}}">

    </div>
    <div class="col-md-3"></div>
</div>
@endsection