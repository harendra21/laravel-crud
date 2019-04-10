@include('parts/header')
<div class="row">
	<div class="col">
		<form class="form-group form" action="{{ url('/') }}/add-update-record" method ='POST' >
		<div class="form-group">
				@if (!empty($user) && !empty($user->id))
					<input type="hidden" name="userId" value="{{ $user->id }}">
				@endif
				<label>First Name : </label>
				<input type="text" name="fName" class="form-control" id="_fName" @if (!empty($user->first_name)) value="{{ $user->first_name }}" @else value={{old('fName')}} @endif>
				@if ($errors->has('fName'))
				    <div class="error">{{ $errors->first('fName') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label>Last Name : </label>
				<input type="text" name="lName" class="form-control" id="_lName" @if (!empty($user->last_name)) value="{{ $user->last_name }}" @else value={{old('lName')}} @endif>
				@if ($errors->has('lName'))
				    <div class="error">{{ $errors->first('lName') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label>Email : </label>
				<input type="email" name="email" class="form-control" id="_email" @if (!empty($user->email)) value="{{ $user->email }}" @else value={{old('email')}} @endif>
				@if ($errors->has('email'))
				    <div class="error">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label>Phone : </label>
				<input type="text" name="phone" class="form-control" id="_phone" @if (!empty($user->phone)) value="{{ $user->phone }}" @else value={{old('phone')}} @endif>
				@if ($errors->has('phone'))
				    <div class="error">{{ $errors->first('phone') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label>Address : </label>
				<textarea name="address" class="form-control" id="_address">@if (!empty($user->address)) {{ $user->address }} @else {{old('address')}} @endif</textarea>
				@if ($errors->has('address'))
				    <div class="error">{{ $errors->first('address') }}</div>
				@endif
			</div>
			<div class="form-group text-right">
				@if (!empty($user))
					<input type="submit" name="edit" class="btn btn-success" value="Update">
				@else
					<input type="submit" name="add" class="btn btn-primary" value="Add">
				@endif
				
			</div>
		</form>
	</div>
</div>
@include('parts/footer')