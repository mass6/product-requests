@extends('main')

@section('content')

    <h3>Edit Product Request Page</h3>
    <blockquote>
        This page allows the viewing and editing of an individual Product Request. Any associated product proposals
        will be listed at the bottom of the page.
    </blockquote>
    @if($product_request->list_id)
        <p>
            1 of {{$product_request->productRequestList->count()}} requests in list: <a href="{{route('product-request-lists.show', $product_request->list_id)}}">{{$product_request->productRequestList->name}}</a>
        </p>
    @endif
    <hr/>
    <br/>

    <div class="row">
        {!! Form::model($product_request, ['route' => ['product-requests.update', $product_request->id], 'method'=>'PATCH']) !!}

                <!-- Product_description Form Input -->
        <div class="form-group">
            {!! Form::label('product_description', 'Product_description:') !!}
            {!! Form::text('product_description', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Sku Form Input -->
        <div class="form-group">
            {!! Form::label('sku', 'Sku:') !!}
            {!! Form::text('sku', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Uom Form Input -->
        <div class="form-group">
            {!! Form::label('uom', 'UOM:') !!}
            {!! Form::text('uom', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Volume_requested Form Input -->
        <div class="form-group">
            {!! Form::label('volume_requested', 'Volume_requested:') !!}
            {!! Form::text('volume_requested', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Purchase_recurrence Form Input -->
        <div class="form-group">
            {!! Form::label('purchase_recurrence', 'Purchase_recurrence:') !!}
            {!! Form::text('purchase_recurrence', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Current_price Form Input -->
        <div class="form-group">
            {!! Form::label('current_price', 'Current_price:') !!}
            {!! Form::text('current_price', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Supplier Form Input -->
        <div class="form-group">
            {!! Form::label('current_supplier', 'Supplier:') !!}
            {!! Form::text('current_supplier', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Status Form Input -->
        <div class="form-group">
            {!! Form::label('state', 'Status:') !!}
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Remarks Form Input -->
        <div class="form-group">
            {!! Form::label('remarks', 'Remarks:') !!}
            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 5]) !!}
        </div>



        {!! Form::close() !!}
    </div>

    @if($product_request->proposals)
    <hr>
    <div class="row">

        <h4>Product Proposals</h4>

        <table class="table table-hover table-bordered table-striped" style="font-size: .85em;">
        	<thead>
        		<tr>
        			<th>Product Name</th>
        			<th>Price</th>
        			<th>Price Comparison</th>
        			<th>Status</th>
        			<th>Assigned To</th>
        			<th>Actions</th>
        		</tr>
        	</thead>
        	<tbody>
            @foreach($product_request->proposals as $proposal)
        		<tr>
        			<td><a href="{{route('product-proposals.edit', $proposal->id)}}">{{$proposal->product_name}}</a></td>
        			<td>{{$proposal->price}}</td>
        			<td>
                        {{ (int)$proposal->productRequest->current_price > (int)$proposal->price ? 'Discount' :
                            ((int)$proposal->productRequest->current_price === (int)$proposal->price ? 'Match' : 'Increase')
                        }}
                    </td>
                    <td>{{$proposal->state}}</td>
                    <td>{{ $proposal->assignedTo->name }}</td>
                    <td>Appprove | Reject</td>
                </tr>
            @endforeach
        	</tbody>
        </table>
    </div>

    @endif

@stop