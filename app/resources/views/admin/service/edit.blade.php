@extends('admin.layout.base')

@section('title', 'Update Service Type ')

@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="{{ route('admin.service.index') }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> Back</a>

            <h5 style="margin-bottom: 2em;">Update Contract</h5>

            <form class="form-horizontal" action="{{route('admin.service.update', $service->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div style="display:none;" class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">Service Name</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->name }}" name="name" required id="name" placeholder="Service Name">
                    </div>
                </div>

                <div style="display:none;" class="form-group row">
                    <label for="provider_name" class="col-xs-2 col-form-label">Provider Name</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->provider_name }}" name="provider_name" required id="provider_name" placeholder="Provider Name">
                    </div>
                </div>

                <div style="display:none;" class="form-group row">
                    
                    <label for="image" class="col-xs-2 col-form-label">Picture</label>
                    <div class="col-xs-10">
                        @if(isset($service->image))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{ $service->image }}">
                        @endif
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="image" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="solnbr" class="col-xs-2 col-form-label">Sol #.</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->solnbr }}" name="solnbr" required id="solnbr" placeholder="Solicitation #">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="subject" class="col-xs-2 col-form-label">Subject</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->subject }}" name="subject" required id="subject" placeholder="Subject">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="agency" class="col-xs-2 col-form-label">Agency</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->agency }}" name="agency" required id="agency" placeholder="Agency">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="office" class="col-xs-2 col-form-label">Office</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->office }}" name="office" required id="office" placeholder="Office">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-xs-2 col-form-label">Location</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->location }}" name="location" required id="location" placeholder="Location">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-xs-2 col-form-label">Type</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->type }}" name="type" required id="type" placeholder="Type">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="setaside" class="col-xs-2 col-form-label">Set-aside</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->setaside }}" name="setaside" required id="setaside" placeholder="Set-aside">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="desc" class="col-xs-2 col-form-label">Description</label>
                    <div class="col-xs-10">
                        <textarea readonly class="form-control" type="text" name="desc" required id="desc" placeholder="Description">{{ $service->desc }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-xs-2 col-form-label">Posted On</label>
                    <div class="col-xs-10">
                        <input readonly class="form-control" type="text" value="{{ $service->date }}" name="date" required id="date" placeholder="Posted On">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fixed" class="col-xs-2 col-form-label">Price ({{ currency('') }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->fixed }}" name="fixed" required id="fixed" placeholder="Price">
                    </div>
                </div>

                <div style="display:none;" class="form-group row">
                    <label for="minute" class="col-xs-2 col-form-label">Unit Time Pricing (For Rental amount per hour / 60) ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->minute }}" name="minute" required id="minute" placeholder="Unit Time Pricing">
                    </div>
                </div>

                <div style="display:none;" class="form-group row">
                    <label for="price" class="col-xs-2 col-form-label">Unit Distance Price ({{ distance() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->price }}" name="price" required id="price" placeholder="Unit Distance Price">
                    </div>
                </div>

                 <div style="display:none;" class="form-group row">
                    <label for="capacity" class="col-xs-2 col-form-label">Seat Capacity</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ $service->capacity }}" name="capacity" required id="capacity" placeholder="Seat Capacity">
                    </div>
                </div>

                <div style="display:none;" class="form-group row">
                    <label for="calculator" class="col-xs-2 col-form-label">Pricing Logic</label>
                    <div class="col-xs-10">
                        <select class="form-control" id="calculator" name="calculator">
                            <option value="MIN" @if($service->calculator =='MIN') selected @endif>@lang('servicetypes.MIN')</option>
                            <option value="HOUR" @if($service->calculator =='HOUR') selected @endif>@lang('servicetypes.HOUR')</option>
                            <option value="DISTANCE" @if($service->calculator =='DISTANCE') selected @endif>@lang('servicetypes.DISTANCE')</option>
                            <option value="DISTANCEMIN" @if($service->calculator =='DISTANCEMIN') selected @endif>@lang('servicetypes.DISTANCEMIN')</option>
                            <option value="DISTANCEHOUR" @if($service->calculator =='DISTANCEHOUR') selected @endif>@lang('servicetypes.DISTANCEHOUR')</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="{{route('admin.service.index')}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 offset-md-6 col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">Update Contract</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection