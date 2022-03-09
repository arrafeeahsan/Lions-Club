@extends('layouts.master')
@section('title', 'Create Club')

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
	                <h5 class="m-0">Create Club</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Form -->
	                <div class="container">
										<form id="AddClubFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										  <div class="form-group">
										    <label for="serialnumber">Serial Number</label>
										    <input type="text" name="serialnumber" id="serialnumber" class="form-control"   placeholder="Enter serial number">
										  </div>

										  <div class="form-group pt-2">
										    <label for="clubname">Club Name</label>
										    <input type="text" name="clubname" id="clubname" class="form-control"  placeholder="Enter club name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="presidentname">President Name</label>
										    <input type="text" name="presidentname" id="presidentname" class="form-control"  placeholder="Enter president name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="secretaryname">Secretary Name</label>
										    <input type="text" name="secretaryname" id="secretaryname" class="form-control" placeholder="Enter secretary name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="address">Address</label>
										    <input type="text" name="address" id="address" class="form-control"  placeholder="Enter address">
										  </div>

										  <div class="form-group pt-2">
										    <label for="totaldeposit">Total Deposit</label>
										    <input type="number" name="totaldeposit" id="totaldeposit" class="form-control" placeholder="Enter total deposit amount">
										  </div>

										  <div class="form-group pt-2">
										    <label for="paidamount">Paid Amount</label>
										    <input type="number" name="paidamount" id="paidamount" class="form-control" placeholder="Enter total paid amount">
										  </div>

										  <!-- <div class="form-group pt-2">
										    <label for="dueamount">Due Amount</label>
										    <input type="number" name="dueamount" id="dueamount" class="form-control">
										  </div> -->

										  <div class="form-group pt-2">
										    <label for="paymentstatus">Payment Status</label>
										    <select class="form-select " aria-label="Default select example"  id="paymentstatus" name="paymentstatus">
													<option disabled selected>Set Payment Status</option>
													<option value="Paid">Paid</option>
													<option value="Due">Due</option>
												</select>
										  </div>

										  <div class="form-group py-2">
										    <label for="clublogo">Club Logo</label>
										    <input type="file" name="clublogo" id="clublogo" class="form-control">
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
			

			$(document).on('submit', '#AddClubFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddClubFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/club-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						console.log(response.message)
						$(location).attr('href','/club-list');
					}
				});
			});
		});
	</script>

@endsection

		



