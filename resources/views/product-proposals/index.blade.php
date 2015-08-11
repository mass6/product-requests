@extends('main')

@section('content')

    <h3>Product Proposals</h3>
    <blockquote>This page shows all product proposals in the system. A product proposal is generated in response to
        a product request. Product proposals are linked to their originating product request.

        Click any proposal name to see the individual contents.
    </blockquote>

    @if($proposals)

        <table class="table table-hover table-striped table-bordered">
        	<thead>
        		<tr>
        			<th></th>
        			<th>Proposal No</th>
        			<th>Proposed Product</th>
        			<th>Product Request</th>
        			<th>Price</th>
        			<th>Price Comparison</th>
        			<th>Status</th>
        			<th>Assigned To</th>
        			<th style="width: 150px;">Actions</th>
        		</tr>
        	</thead>
        	<tbody>
            @foreach($proposals as $proposal)
        		<tr>
                    <td align="center">{!! Form::checkbox('') !!}</td>
                    <td>{{ $proposal->id }}</td>
        			<td><a href="{{route('product-proposals.edit', $proposal->id)}}">{{ $proposal->product_name }}</a></td>
        			<td>{{ $proposal->productRequest->product_description }} <a href="{{ route('product-requests.edit', $proposal->productRequest->id) }}"><small>[view]</small></a></td>
        			<td>{{ $proposal->price }}</td>
        			<td>
                        {{ (int)$proposal->productRequest->current_price > (int)$proposal->price ? 'Discount' :
                            ((int)$proposal->productRequest->current_price === (int)$proposal->price ? 'Match' : 'Increase')
                        }}
                    </td>
        			<td>{{ $proposal->state }}</td>
        			<td>{{ $proposal->assignedTo->name }}</td>
                    <td>Appprove | Reject</td>
        		</tr>
            @endforeach
        	</tbody>
        </table>

    @endif

@stop