@extends('layouts.default')

@section('content')

<div class="panel panel-success">
		<div class="panel-heading">Search Stock</div>
		<form action="/search" method="get">
		<div class="panel-body">
			<label class="label-control">Stock Name</label> 
			<input type="text" name="sname" class="form-control" placeholder="Please input stock name/description" required="required">
			<br>
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
		
	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">Search</button>
	</div>
	</form>
</div>

<!-- check if $search variable is set, display search result -->
@if (isset($search))
	<div class="panel panel-success">
		<div class="panel-heading">Search Result</div>
		<div class="panel-body">

			<div class='table-responsive'>
			  <table class='table table-bordered table-hover'>
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>TYPE</th>
			        <th>NAME/DESCRIPTION</th>
			        <th>SIZE</th>
			        <th>QUANTITY</th>
			      </tr>
			    </thead>
			    <tbody>

				@foreach($search as $searchs) 
					<tr>
						<td>{{$searchs->STK_ID}}</td>
						<td>{{$searchs->STK_TYPE}}</td>
						<td>{{$searchs->STK_NAME}}</td>
						<td>{{$searchs->STK_SIZE}}</td>
						<td>{{$searchs->STK_QTY}}</td>
					</tr>
				@endforeach

				</tbody>
					</table>
					<center>{{ $search->appends(Request::only('sname'))->links() }}</center>
				</div>

		</div>
		<div class="panel-footer">
			<a href="/search" class="btn btn-warning">Back To Search</a>
		</div>
	</div>
@endif

@stop