@extends('main')

@section('content')

    <h3>Product Request Lists</h3>
    <blockquote>This page shows all product request lists in the system. A product request list is a group of one or
        more product requests, usually created by bulk upload/import.
        Product request lists allow grouping of similar request together for the purpose of easier filtering and
        performing of bulk actions.

        Click any list name to see the individual contents.
    </blockquote>
    <hr/>
    <br/>

@if($productRequestLists)
    <table class="table table-hover table-striped table-bordered">
    	<thead>
    		<tr>
    			<th>Id</th>
    			<th>Name</th>
    			<th>Description</th>
    			<th># Req</th>
    			<th>Created by</th>
    			<th>Created on</th>
    		</tr>
    	</thead>
    	<tbody>
        @foreach($productRequestLists as $productRequestList )
    		<tr>
                <td>{{$productRequestList->id}}</td>
    			<td><a href="{{route('product-request-lists.show', $productRequestList->id)}}">{{ $productRequestList->name }}</a></td>
    			<td>{{ $productRequestList->description }}</td>
    			<td>{{ $productRequestList->productRequests->count() }}</td>
    			<td>{{ $productRequestList->user->name }}</td>
    			<td>{{ $productRequestList->created_at }}</td>
    		</tr>
        @endforeach
    	</tbody>
    </table>
@endif


@stop