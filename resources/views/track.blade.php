@extends('base')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
   					<input type="text" name="start" placeholder="From" class="form-control start">
   				</div>

   				<div class="form-group">
   					<label>Current Point</label>
   					<input type="text" name="end" placeholder="Current Location" class="form-control">
   				</div>
   					<input type="hidden" name="latitude" class="latitude">
   					<input type="hidden" name="longitude" class="longitude">
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


function get_address(lat, long) {

  $.get('http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+long+'&sensor=true/false', function(data) {
    
      $('.start').val(data.results[0].formatted_address);
  });
}


function get_position() {

	navigator.geolocation.getCurrentPosition(function(location) {
	  latitude = location.coords.latitude;
	  longitude = location.coords.longitude;
    $('.latitude').val(latitude);
	  $('.longitude').val(longitude);

    get_address(latitude, longitude);

	});

}


(function() {
  get_position();

})();


function insert_trip (bus_id, freq, from, to, status) {

    $.ajax({
        url: '/trip',
        type: 'post',
        dataType: 'json',
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'bus_id': bus_id,
          'frequency': freq,
          'from': from,
          'to': to, 
          'status': status
        },
        success: function( data, textStatus, jQxhr ){
            console.log(data);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });

}


function insert_track(trip_id, lat, long) {

}






$('.start').on('click', function() {
	get_position();
});


$('.end').on('click', function() {
	alert('you clicked end button');
});

</script>
@endsection