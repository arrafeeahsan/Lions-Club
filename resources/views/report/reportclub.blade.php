@extends('layouts.master')
@section('title', 'Report Club-wise')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          	<div class="col-lg-12">
            
	          	<div class="card card-primary card-outline">
	              <div class="card-header">
	                <h5 class="m-0">Club-Wise Reports</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<!-- <a href="/payment-add"><button type="button" class="btn btn-primary">Add Payment</button></a> -->
                	<div class="row">
                	<div class="form-group pt-2 col-4">
										    <label for="memberclub">Select club to see club-wise report</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="clubwise" id="clubwise">
												  <option value="option_select" disabled selected>Clubs</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->id}}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>
										  </div>
                	
                    <div class="pt-2">
											<table id="reportclub_table" class="display">
										    <thead>
										        <tr>
										            <th>Club Serial</th>
										            <th>Past Due</th>
										            <th>Current Payment</th>
										            <th>Payment Due</th>
										            <th>Payment Note</th>    
										        </tr>
										    </thead>
										    <tbody>

										    </tbody>
									    </table>
										</div>

	              </div> <!-- Card-body -->
	            </div>	<!-- Card -->           
	        </div>   <!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- content-wrapper -->
	
@endsection

@section('script')
<script type="text/javascript" src="js/reportclublist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#reportclub_table').DataTable();
	});
</script>

@endsection


	
