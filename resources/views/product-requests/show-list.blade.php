@extends('main')

@section('content')

    <h3>{{ $product_request_list->name }} <small>[produt list] <a href="{{route('product-request-lists.index')}}" class="btn btn-info btn-xs">show all lists</a></small></h3>
    <small>Created On: <strong>{{ $product_request_list->created_at }}</strong></small><br/>
    <small>Created By: <strong>{{ $product_request_list->user->name }}</strong></small>
    <br/><br/>
    <blockquote>
        This page shows the contents of an individual Product Request List, which is comprised of one or
        more product requests, usually created by bulk upload/import.
        Product request lists allow grouping of similar request together for the purpose of easier filtering and
        performing of bulk actions.
    </blockquote>
    <hr>

    @if(count($product_request_list->productRequests))

        <h4>Product Requests</h4>
        <table class="table table-hover table-bordered">
        	<thead>
        		<tr>
                    <th></th>
                    <th>Req No.</th>
        			<th>Product Description</th>
        			<th>Volume</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            @foreach($product_request_list->productRequests as $product_request)
                <tr>
                    <td align="center">{!! Form::checkbox('') !!}</td>
        			<td><a href="{{route('product-requests.edit', $product_request->id)}}">{{ $product_request->id }}</a></td>
                    <td>{{ $product_request->product_description }}</td>
                    <td>{{ $product_request->volume_requested }}</td>
                    <td>{{ $product_request->state }}</td>
                    <td><a href="{{route('product-requests.edit', $product_request->id)}}">View/Edit</a></td>
                </tr>
            @endforeach
        	</tbody>
        </table>

    @endif


@stop