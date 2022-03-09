@extends('layouts.master')
@section('title', 'Report Date-wise')

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
	                <h5 class="m-0">Date Wise Reports</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<!-- <a href="/payment-add"><button type="button" class="btn btn-primary">Add Payment</button></a> -->
                	
                    <div class="pt-2">
											<table id="reportdate_table" class="display">
										    <thead>
										        <tr>
										            <th>Club Name</th>
										            <th>Club Serial</th>
										            <th>Due Amount</th>
										            <th>Paid Amount</th>
										            <th>Total Amount</th>
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
<script type="text/javascript" src="js/reportdatelist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#reportdate_table').DataTable();
	});
</script>

@endsection


	
