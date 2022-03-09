@extends('layouts.master')
@section('title', 'Report')

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
	                <h5 class="m-0">Add Payment</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Form -->
	                <div class="container">
										<form id="AddPaymentFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										  <div class="form-group">
										    <label for="pastdue">Past Due</label>
										    <input type="number" name="pastdue" id="pastdue" class="form-control"   placeholder="Enter past due">
										  </div>

										  <div class="form-group pt-2">
										    <label for="currentpayment">Current Payment</label>
										    <input type="text" name="currentpayment" id="currentpayment" class="form-control"  placeholder="Enter current payment">
										  </div>

										  <div class="form-group pt-2">
										    <label for="paymentdue">Due Amount</label>
										    <input type="number" name="paymentdue" id="paymentdue" class="form-control"  placeholder="Enter due amount">
										  </div>

										  <div class="form-group pt-2">
										    <label for="paymentnote">Note</label>
										    <input type="text" name="paymentnote" id="paymentnote" class="form-control" placeholder="Enter note">
										  </div>

										  <div class="form-group pt-2">
										    <label for="clubserial">Club Serial</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="clubserial" id="clubserial">
												  <option value="option_select" disabled selected>Clubs</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->serial_number }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
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
			

			$(document).on('submit', '#AddPaymentFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddPaymentFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/payment-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						console.log(response.message)
						$(location).attr('href','/payment-list');
					}
				});
			});
		});
	</script>

@endsection

		



