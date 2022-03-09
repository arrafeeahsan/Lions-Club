@extends('layouts.master')
@section('title', 'Payments')

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
	                <h5 class="m-0">Payments</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<a href="/payment-add"><button type="button" class="btn btn-primary">Add Payment</button></a>
                	
                    <div class="pt-2">
											<table id="payment_table" class="display">
										    <thead>
										        <tr>
										            <th>ID</th>
										            <th>Past Due</th>
										            <th>Current Payment</th>
										            <th>Payment Due</th>
										            <th>Payment Note</th>
										            <th>Club Serial</th>
										            <th>Action</th>
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


					<!-- Edit Payment Modal -->
					<div class="modal fade" id="EDITPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Payment Information</h5>	        
					      </div>


					      <!-- Payment Form -->
					      <form id="UPDATEPaymentFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="paymentid" id="paymentid">

					      		<div class="form-group mb-3">
					      			<label>Past Due</label>
					      			<input type="number" id="edit_pastdue" name="pastdue" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Current Payment</label>
					      			<input type="number" id="edit_currentpayment" name="currentpayment" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Payment Due</label>
					      			<input type="number" id="edit_paymentdue" name="paymentdue" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Payment Note</label>
					      			<input type="text" id="edit_paymentnote" name="paymentnote" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Club Serial</label>
					      			 <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="clubserial" id="edit_clubserial">
												  <option value="option_select" disabled selected>Clubs</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->serial_number }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>
					      		</div>

								    <div class="modal-footer">
								        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-primary">Update</button>
								    </div>

							    </form>
					    </div>
					  </div>
					</div>
					<!-- End Edit Payment Modal -->
			
@endsection

@section('script')
<script type="text/javascript" src="js/paymentlist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#payment_table').DataTable();
	});
</script>

@endsection


	
