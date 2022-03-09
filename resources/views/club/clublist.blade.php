@extends('layouts.master')
@section('title', 'Clubs')

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
	                <h5 class="m-0">Clubs</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<a href="/club-add"><button type="button" class="btn btn-primary">Create Club</button></a>
                	
                    <div class="pt-2">
											<table id="club_table" class="display">
										    <thead>
										        <tr>
										            <th>ID</th>
										            <th>Serial Number</th>
										            <th>Club Name</th>
										            <th>President Name</th>
										            <th>Secretary Name</th>
										            <th>Address</th>
										            <th>Total Deposit</th>
										            <th>Paid Amount</th>
										            <th>Due Amount</th>
										            <th>Payment Status</th>
										            <th>Club Logo</th>
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


					<!-- Edit Club Modal -->
					<div class="modal fade" id="EDITClubModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Club</h5>	        
					      </div>


					      <!-- Club Form -->
					      <form id="UPDATEClubFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="clubid" id="clubid">

					      		<div class="form-group mb-3">
					      			<label>Serial Number</label>
					      			<input type="" id="edit_serialnumber" name="serialnumber" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Club Name</label>
					      			<input type="text" id="edit_clubname" name="clubname" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>President Name</label>
					      			<input type="text" id="edit_presidentname" name="presidentname" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Secreatary Name</label>
					      			<input type="text" id="edit_secretaryname" name="secretaryname" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Address</label>
					      			<input type="text" id="edit_address" name="address" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Total Deposit</label>
					      			<input type="number" id="edit_totaldeposit" name="totaldeposit" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Paid Amount</label>
					      			<input type="number" id="edit_paidamount" name="paidamount" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Due Amount</label>
					      			<input type="number" id="edit_dueamount" name="dueamount" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Payment Status</label>
					      			<select class="form-select " aria-label="Default select example"  id="edit_paymentstatus" name="paymentstatus">
													<option disabled selected>Set Payment Status</option>
													<option value="Paid">Paid</option>
													<option value="Due">Due</option>
												</select>
					      		</div>

										<div class="form-group mb-3">
							      			<label>Club Logo</label>
							      			<input type="file" id="edit_clublogo" name="clublogo" class="form-control">
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
					<!-- End Edit Club Modal -->
			
@endsection

@section('script')
<script type="text/javascript" src="js/clublist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#club_table').DataTable();
	});
</script>

@endsection


	
