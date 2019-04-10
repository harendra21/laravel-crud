@include('parts/header')
<div class="row">
	<div class="col show table-responsive">
		<table class="table table-stripped table-bordered ">
			<thead>
				<tr>
					<th>S.No.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if (!empty($users))
					@foreach ($users as $user)
				        <tr>
							<td>{{ $no++ }}</td>
							<td>{{ $user->first_name }}</td>
							<td>{{ $user->last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->address }}</td>
							<td><a href="{{ url('/update/') }}/{{ $user->id }}" class="btn btn-primary btn-sm">Edit</a><a href="{{ url('/delete/') }}/{{ $user->id }}" class="btn btn-danger btn-sm">Delete</a></td>
						</tr>
			        @endforeach
			    @else
			    <tr>
			    	<td colspan="7" class="text-center">
			    		<h3>User not found !</h3>
			    	</td>
			    </tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@include('parts/footer')