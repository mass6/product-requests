@extends('main')

@section('content')
    <?php
        $product_request = $proposal->productRequest;
    ?>

    <h3>Product Proposal</h3>
    <hr>
    <h4><small>Product Request: </small><a href="{{route('product-requests.edit', $product_request->id)}}">{{ $proposal->productRequest->product_description }}</a></h4>

    <table class="table table-hover table-bordered" style="font-size: .85em;">
    	<thead>
    		<tr>
    			<th>Requested By</th>
    			<th>Category</th>
    			<th>Current Supplier</th>
    			<th>Current Price</th>
                <th>Recurrence</th>
                <th>SKU</th>
                <th>UOM</th>
                <th>Volume</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>{{ $product_request->user->name}}</td>
    			<td>{{ $product_request->category }}</td>
    			<td>{{ $product_request->current_supplier }}</td>
    			<td>{{ $product_request->current_price }}</td>
                <td>{{ $product_request->purchase_recurrence }}</td>
                <td>{{ $product_request->sku }}</td>
                <td>{{ $product_request->uom }}</td>
                <td>{{ $product_request->volume_requested }}</td>
    		</tr>
    	</tbody>
    </table>

    <hr/>
    <br/>

    <div class="row">
        {!! Form::model($proposal, ['route' => ['product-proposals.update', $proposal->id], 'method'=>'PATCH']) !!}

                <!-- Product_name Form Input -->
        <div class="form-group">
            {!! Form::label('product_name', 'Product_name:') !!}
            {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
        </div>
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

        <!-- price Form Input -->
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Supplier Form Input -->
        <div class="form-group">
            {!! Form::label('supplier', 'Supplier:') !!}
            {!! Form::text('supplier', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Remarks Form Input -->
        <div class="form-group">
            {!! Form::label('remarks', 'Remarks:') !!}
            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 5]) !!}
        </div>

        <!-- Submit button -->
        <div class="form-group">
            {!! Form::submit('Approve', ['class' => 'btn btn-success', 'name' => 'approve']) !!}
            {!! Form::submit('Reject', ['class' => 'btn btn-danger', 'name' => 'reject']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop