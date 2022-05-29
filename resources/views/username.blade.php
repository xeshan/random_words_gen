<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Insert UserName</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto m-5">
			@if(session()->has('message'))
    			<div class="alert alert-success">
        			{{ session()->get('message') }}
    			</div>
			@endif
    		<form action="{{ route('submit-data') }}" method="post" enctype="multipart/form-data">
    			{{ csrf_field() }}
        		<div class="mb-3 ">
		            <label class="form-label" for="inputName">Name</label>
		            <input type="text" class="form-control" id="inputName" name="UserName" placeholder="User Name" required>
        		</div>
        		<div class="mb-3">
        			<label class="form-label" for="inputName">Select Character</label>
            		<select class="form-control" id="alph-selction" name="alphabetselction" required >
                  		<option value="1" selected>Alphabet</option>        
                  		<option value="2">Numerical</option>        
                  		<option value="3">Both</option>
              		</select>
        		</div>
         		<div class="mb-3">
         			<label class="form-label" for="inputName">Select Word Range</label>
            		<select class="form-control" id="inputNumber" name="inputNumber" required >
                  		<option value="1">1</option>        
                  		<option value="100" selected>100</option>        
                  		<option value="1000">1000</option>
                  		<option value="10000">10,000</option>        
              		</select>
        		</div>
        		<button type="submit" class="btn btn-primary float-end">Submit</button>
    		</form>
		</div>
	</div>
</div>
</body>
</html>