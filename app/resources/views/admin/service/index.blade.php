@extends('admin.layout.base')

@section('title', 'FBO Contracts ')

@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">FBO Contracts</h5>
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
                        <td>{{ $service->subject }}</td>
                        <td>{{ $service->agency }}<br/>{{ $service->office }}<br/>{{ $service->location }}</td>
                        <td>{{ $service->type }} / {{ $service->setaside }}</td>
                        <td>{{ currency($service->fixed) }}</td>
                        <td>{{ $service->date }}</td>
                        <td>
                            <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-info btn-block">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <!--
                                <button class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                                -->
                            </form>
                        </td>
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
@endsection