@extends('layouts.master')
@section('title', 'Add Member')

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
	                <h5 class="m-0">Add Member</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Form -->
	                <div class="container">
										<form id="AddMemberFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->

										  <div class="form-group">
										    <label for="memberid">Member ID</label>
										    <input type="text" name="memberid" id="memberid" class="form-control"   placeholder="Enter member id">
										  </div>

										  <div class="form-group pt-2">
										    <label for="membername">Member Name</label>
										    <input type="text" name="membername" id="membername" class="form-control"   placeholder="Enter member name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="membertype">Member Type</label>
										    <select class="form-select " aria-label="Default select example"  id="membertype" name="membertype">
													<option disabled selected>Set Member Type</option>
													<option value="Charter">Charter Member</option>
													<option value="Regular">Regular Member</option>
													<option value="Reinstated">Reinstated Member</option>
													<option value="Reinstated Charter">Reinstated Charter Member</option>
													<option value="Transfer">Transfer Member</option>
													<option value="Transfer Charter">Transfer Charter Member</option>
												</select>
										  </div>

										  <div class="form-group pt-2">
										    <label for="memberclub">Member Club</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="memberclub" id="memberclub">
												  <option value="option_select" disabled selected>Clubs</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->serial_number }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>

										  <div class="form-group pt-2">
										    <label for="memberphone">Member Phone</label>
										    <input type="text" name="memberphone" id="memberphone" class="form-control"  placeholder="Enter phone number">
										  </div>

										  <div class="form-group pt-2">
										    <label for="memberemail">Member Email</label>
										    <input type="email" name="memberemail" id="memberemail" class="form-control"  placeholder="Enter email address">
										  </div>

										  <div class="form-group pt-2">
										    <label for="memberaddress">Member Address</label>
										    <input type="text" name="memberaddress" id="memberaddress" class="form-control"  placeholder="Enter address">
										  </div>

										  <div class="form-group pt-2">
										    <label for="memberfathername">Member Father's Name</label>
										    <input type="text" name="memberfathername" id="memberfathername" class="form-control"  placeholder="Enter father's name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="membermothername">Member Mother's Name</label>
										    <input type="text" name="membermothername" id="membermothername" class="form-control"  placeholder="Enter mother's name">
										  </div>

										  <div class="form-group py-2">
										    <label for="memberpicture">Member Picture</label>
										    <input type="file" name="memberpicture" id="memberpicture" class="form-control">
										  </div>

										  <button type="submit" class="btn btn-outline-primary">Save</button>
										  <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
										</form>	  
									</div>	
 
	              </div> <!-- /.card-body -->
	            </div> <!-- /.card -->
	        </div>   <!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function () {

			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			

			$(document).on('submit', '#AddMemberFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddMemberFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/member-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						console.log(response.message)
						$(location).attr('href','/member-list');
					}
				});
			});
		});
	</script>

@endsection

		



