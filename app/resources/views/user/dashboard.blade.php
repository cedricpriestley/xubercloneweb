@extends('user.layout.base2')

@section('title', 'Dashboard ')

@section('content')

<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title">Browse Contracts</h4>
            </div>
        </div>
        @include('common.notify')
        <div class="row no-margin">
            <div class="col-md-12"> 
            <!--<a href="{{ route('admin.service.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Contract</a>-->
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <!--<th>ID</th>-->
                        <th>Sol #</th>
                        <th>Subject</th>
                        <th>Agency/Office/Location</th>
                        <th>Type/Set-aside</th>
                        <th>Price</th>
                        <th>Posted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($services as $index => $service)
                    <tr>
                        <!--<td>{{ $index + 1 }}</td>-->
                        <td>{{ $service->solnbr }}</td>
                        <td>{{ str_replace(",", ", ", $service->subject) }}</td>
                        <td>{{ $service->agency }}/{{ $service->office }}/{{ $service->location }}</td>
                        <td>{{ $service->type }} / {{ $service->setaside }}</td>
                        <td>{{ currency($service->fixed) }}</td>
                        <td>{{ $service->date }}</td>
                        <td><form action="{{url('confirm/ride')}}" method="GET" onkeypress="return disableEnterKey(event);">
                        <input type="hidden" 
                                name="service_type"
                                value="{{$service->id}}"
                                id="service_{{$service->id}}">
                    <div class="input-group dash-form">
                        <input type="text" class="form-control" id="origin-input" name="s_address"  placeholder="Enter pickup location" value="301 5th Avenue, New York, NY, United States">
                    </div>

                    <div class="input-group dash-form">
                        <input type="text" class="form-control" id="destination-input" name="d_address"  placeholder="Enter drop location" value="Chobani SoHo, Prince Street, New York, NY, United States">
                    </div>

                    <input type="hidden" name="s_latitude" id="origin_latitude" value="40.74653850">
                    <input type="hidden" name="s_longitude" id="origin_longitude" value="-73.98595190">
                    <input type="hidden" name="d_latitude" id="destination_latitude" value="40.72575360">
                    <input type="hidden" name="d_longitude" id="destination_longitude" value="-74.00113820">
                    <input type="hidden" name="current_longitude" id="long">
                    <input type="hidden" name="current_latitude" id="lat">
                    <button type="submit"  class="full-primary-btn fare-btn">View</button>
                </form></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <!--<th>ID</th>-->
                        <th>Sol #</th>
                        <th>Subject</th>
                        <th>Agency/Office/Location</th>
                        <th>Type/Set-aside</th>
                        <th>Price</th>
                        <th>Posted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

            </div>
        </div>
    </div>
</div>
<style>
    table {
        font-size:12px; 
    }
</style>
@endsection

@section('scripts')    
<!--
<script type="text/javascript">
    var current_latitude = 13.0574400;
    var current_longitude = 80.2482605;
</script>

<script type="text/javascript">
    if( navigator.geolocation ) {
       navigator.geolocation.getCurrentPosition( success, fail );
    } else {
        console.log('Sorry, your browser does not support geolocation services');
        initMap();
    }

    function success(position)
    {
        document.getElementById('long').value = position.coords.longitude;
        document.getElementById('lat').value = position.coords.latitude

        if(position.coords.longitude != "" && position.coords.latitude != ""){
            current_longitude = position.coords.longitude;
            current_latitude = position.coords.latitude;
        }
        initMap();
    }

    function fail()
    {
        // Could not obtain location
        console.log('unable to get your location');
        initMap();
    }
</script> 

<script type="text/javascript" src="{{ asset('asset/js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initMap" async defer></script>
-->
<script type="text/javascript">
    function disableEnterKey(e)
    {
        var key;
        if(window.e)
            key = window.e.keyCode; // IE
        else
            key = e.which; // Firefox

        if(key == 13)
            return e.preventDefault();
    }
</script>
<style>
    #origin-input
    ,#destination-input {
        display:none;
    }
</style>
@endsection