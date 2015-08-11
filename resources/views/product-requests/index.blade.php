@extends('main')

@section('content')

    <h2>Product Requests: All Requests Page</h2>
    <blockquote>This page shows the entire list of product requests. Each entry represents a unique product.
        Click the view/edit link to view the complete request details.</blockquote>
    <hr/>
    <br>

    <div class="row">

        <table class="table table-hover table-striped table-bordered" style="font-size: .85em;">
        	<thead>
        		<tr>
                    <th></th>
        			<th>Req No.</th>
        			<th>Requested By</th>
        			<th>Produt List</th>
        			<th>Product Description</th>
        			<th>Volume</th>
        			<th>Created</th>
                    <th>Status</th>
                    <th>Options</th>
        		</tr>
        	</thead>
        	<tbody>
            @foreach($product_requests as $product_request)
        		<tr>
                    <td align="center">{!! Form::checkbox('') !!}</td>
        			<td>{{ $product_request->id }}</td>
        			<td>{{ $product_request->user->name }}</td>
        			<td>
                        @if($product_request->productRequestList)
                            <a href="{{route('product-request-lists.show', $product_request->list_id)}}">{{ $product_request->productRequestList->name }}</a></td>
                        @endif
        			<td>{{ $product_request->product_description }}</td>
        			<td>{{ $product_request->volume_requested }}</td>
        			<td>{{ $product_request->created_at->format('d-m-Y') }}</td>
                    <td>{{ $product_request->state }}</td>
                    <td><a href="{{route('product-requests.edit', $product_request->id)}}">Edit</a></td>
        		</tr>
            @endforeach
        	</tbody>
        </table>

    </div>
    <div>
        {!! $product_requests->render() !!}
    </div>





@stop