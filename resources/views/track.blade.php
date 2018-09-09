@extends('base')

@section('content')
<div class="container">
 	
 	   <div class="row">
    	<div class="col-md-6 col-md-offset-3 alert alert-warning" style="margin-top: 100px">	
   			<h3>Driver App</h3>
   			<form method="POST" action="/track" class="formSubmit">
   			@csrf
	   			<div class="form-group">
	   				<label>Bus Number</label>
	   				<select class="form-control" name="trip_id">
	   					@foreach($buses as $bus)
	   					<option value="{{ $bus->id}}">{{ $bus->reg_no }}</option>
	   					@endforeach

	   				</select>
	   			</div>
   				<div class="form-group">
   					<label>Starting Point</label>
   					<input type="text" name="start" placeholder="From" class="form-control">
   				</div>

   				<div class="form-group">
   					<label>Current Point</label>
   					<input type="text" name="end" placeholder="Current Location" class="form-control">
   				</div>
   					<input type="hidden" name="latitude">
   					<input type="hidden" name="longitude">



   				<button type="submit">Submit</button>
   			</form>


    		<a href="#" class="btn btn-lg btn-info start">Start Journey</a>

    		<a href="#" class="btn btn-lg btn-danger end">End Journey</a>

    		<table class="table table-bordered" style="margin-top:20px">
    			<thead>
    				<th>Latitude</th>
    				<th>Longitude</th>
    				<th>Time</th>
    			</thead>
    			<tbody>
    				<tr>
    					<td class="lat">12121</td>
    					<td class="lon">12121</td>
    					<td></td>

    				</tr>
    			</tbody>
    		</table>
    	
    	</div>
       </div>
</div>
@endsection

@section('script')
<script type="text/javascript">


function get_position() {

	navigator.geolocation.getCurrentPosition(function(location) {
	  latitude = location.coords.latitude;
	  longitude = location.coords.longitude;

	  $('.latitude').val(latitude);
	  $('.longitude').val(longitude);


	  $.ajax({
	      url: '/track',
	      dataType: 'json',
	      type: 'post',
	      contentType: 'application/json',
	      data: $('.formSubmit').serializeArray(),
	      success: function( data, textStatus, jQxhr ){
	          console.log(data);
	      },
	      error: function( jqXhr, textStatus, errorThrown ){
	          console.log( errorThrown );
	      }
	  });


	});

}



$('.start').on('click', function() {

	get_position();
});


$('.end').on('click', function() {
	alert('you clicked end button');
});

</script>
@endsection