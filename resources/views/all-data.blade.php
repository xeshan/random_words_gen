@php
    use \App\Http\Controllers\UserNameController;
    use App\Models\UserDetail;
@endphp
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto m-5">
			<a href="{{ url ('username') }}" class="btn btn-primary float-end">Add New</a>
			<table class="table table-striped">
		 		<thead>
		    		<tr>
		      			<th>#</th>
		      			<th scope="col">User Name</th>
		      			<th scope="col"></th>
		    		</tr>
		  		</thead>
		  		<tbody>
		  			@foreach($user_name_data as $user_data)
		    			<tr>
		    				<td>{{ $loop->iteration }}</td>
		      				<td>{{ $user_data->user_name }}</td>
		      				<td> 
		      					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#generated-words{{ $user_data->id }}">
									View Generated Words
				  				</button>
				  			</td>
		    			</tr>
		    		@endforeach
		  		</tbody>
			</table>
			@foreach($user_name_data as $data)
			@php
		  		$randomwords = UserNameController::UserDetail($data->id);
		  	@endphp
		 	<!-- The Modal -->
			<div class="modal" id="generated-words{{ $data->id }}">
  				<div class="modal-dialog">
    				<div class="modal-content">
      					<!-- Modal Header -->
      					<div class="modal-header">
        					<h4 class="modal-title"></h4>
        					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      					</div>
      					<!-- Modal body -->
      					<div class="modal-body">
          					<table class="table table-striped">
    							<thead>
    								<tr>
      									<th>#</th>
      									<th scope="col">Generated Random Words</th>
    								</tr>
  								</thead>
  								<tbody>
  								@foreach($randomwords as $word_rec)
    								<tr>
    									<td>{{ $loop->iteration }}</td>
      									<td>{{ $word_rec->random_words }}</td>
									</tr>
    							@endforeach
  								</tbody>
  							</table>
  						</div>
      					<!-- Modal footer -->
      					<div class="modal-footer">
        					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      					</div>
    				</div>
  				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
</body>
</html>