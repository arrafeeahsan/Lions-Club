@extends('layouts.master')
@section('title', 'Members')

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
	                <h5 class="m-0">Members</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<a href="/member-add"><button type="button" class="btn btn-primary">Add Member</button></a>
                	
                    <div class="pt-2">
											<table id="member_table" class="display">
										    <thead>
										        <tr>
										        		<th>Member ID</th>
										            <th>Name</th>
										            <th>Type</th>
										            <th>Club</th>
										            <th>Phone</th>
										            <th>Email</th>
										            <th>Address</th>
										            <th>Father's Name</th>
										            <th>Mother's name</th>
										            <th>Picture</th>
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


					<!-- Edit Member Modal -->
					<div class="modal fade" id="EDITMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Member Information</h5>	        
					      </div>


					      <!-- Member Form -->
					      <form id="UPDATEMemberFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="id" id="id">

					      		<div class="form-group mb-3">
										    <label for="xmemberid">Member ID</label>
										    <input type="text" name="memberid" id="edit_memberid" class="form-control">
										</div>

										<div class="form-group mb-3">
					      			<label>Name</label>
					      			<input type="text" id="edit_membername" name="membername" class="form-control">
					      		</div>

										<div class="form-group mb-3">
										    <label for="membertype">Member Type</label>
										    <select class="form-select " aria-label="Default select example"  id="edit_membertype" name="membertype">
													<option disabled selected>Set Member Type</option>
													<option value="Charter">Charter Member</option>
													<option value="Regular">Regular Member</option>
													<option value="Reinstated">Reinstated Member</option>
													<option value="Reinstated Charter">Reinstated Charter Member</option>
													<option value="Transfer">Transfer Member</option>
													<option value="Transfer Charter">Transfer Charter Member</option>
												</select>
										  </div>  

					      		<div class="form-group mb-3">
										    <label for="memberclub">Club</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="memberclub" id="edit_memberclub">
												  <option value="option_select" disabled selected>Clubs</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->serial_number }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>





					      		<div class="form-group mb-3">
					      			<label>Phone</label>
					      			<input type="text" id="edit_memberphone" name="memberphone" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Email</label>
					      			<input type="emial" id="edit_memberemail" name="memberemail" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Address</label>
					      			<input type="text" id="edit_memberaddress" name="memberaddress" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Father's Name</label>
					      			<input type="text" id="edit_memberfathername" name="memberfathername" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Mother's Name</label>
					      			<input type="text" id="edit_membermothername" name="membermothername" class="form-control">
					      		</div>

										<div class="form-group mb-3">
							      			<label>Picture</label>
							      			<input type="file" id="edit_memberpicture" name="memberpicture" class="form-control">
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
					<!-- End Edit Member Modal -->
			
@endsection

@section('script')
<script type="text/javascript" src="js/memberlist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#member_table').DataTable();
	});
</script>

@endsection


	
