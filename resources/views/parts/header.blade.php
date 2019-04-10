<!DOCTYPE html>
<html>
	<head>
		<title>Laravel Crud App</title>
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/style.css">
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/bootstrap.min.css">
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		  <!-- Links -->
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link" href="{{ url('/') }}">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="{{ url('/add') }}">Add New</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="{{ url('/show-all') }}">View All</a>
		    </li>
		  </ul>

		</nav>
		<div class="container">
			@if (Session::has('form_error'))
				@if (Session::get('form_error')[0] == 'error')
					<br><div class="alert alert-danger">
				        <ul>{{ Session::get('form_error')[1] }}</ul>
				    </div>
				@elseif(Session::get('form_error')[0] == 'success')
					<br><div class="alert alert-success">
				        <ul>{{ Session::get('form_error')[1] }}</ul>
				    </div>
				@endif    
			@endif