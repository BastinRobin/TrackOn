@extends('base')

@section('content')
<div class="container">
 	
 	   <div class="row">
    	<div class="col-md-6 col-md-offset-3">	
    	 <h2>Todo List</h2>

    	 @if(Session::has('message'))
    	 <div class="alert alert-success">
		 	{{ Session::get('message') }}
		 </div>
		 @endif

    	 <form method="POST" action="/">
    	 @csrf
    	 <input type="text" name="body" class="form-control" placeholder="Enter you todo task">
    	 <button type="submit" class="btn btn-success pull-right">Add</button>
    	 </form>
    	 <hr>
    	 <ul class="list-group">

    	   @foreach($todos as $todo)
    	   <li class="list-group-item">

    	   	@if($todo->is_complete)
    	   	<strike>{{ $todo->body }}</strike>
    	   	@else
    	   	{{ $todo->body }}
    	   	@endif
    	   	<div class="pull-right">
	    	   	<a href="/{{ $todo->id }}/done" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-check"></span></a>
	    	   	|
	    	   	<a href="/{{ $todo->id }}/delete" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
	    	</div>
    	   </li>
    	   @endforeach
    	  
    	 </ul>
    	</div>

    </div>
</div>
@endsection
