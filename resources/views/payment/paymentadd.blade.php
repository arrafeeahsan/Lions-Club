@extends('layouts.master')
@section('title', 'Payment')

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

											<div class="form-group pt-2">
										    <label for="clubid">Club Name</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="clubid" id="clubid">
												  <option value="option_select" disabled selected>Select Club</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->id }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>

											<div class="form-group">
										    <label for="clubserial">Club Serial</label>
										    <select class="form-select s-states browser-default select2" data-live-search="true" aria-label="Default select example" name="clubserial" id="clubserial">
												  <option value="option_select" disabled selected>Select Club</option>
												  @foreach($clubs as $club)
						            	<option value="{{ $club->serial_number }}">
						            		{{ $club->club_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>

										  

										  <div class="form-group  pt-2">
										    <label for="pastdue">Previous Due</label>
										    
										    <input type="number" name="pastdue" id="pastdue" class="form-control"   placeholder="Select club to see the due amount"
										    >
										   
										  </div>



										  <div class="form-group pt-2">
										    <label for="currentpayment">Current Payment</label>
										    <input type="text" name="currentpayment" id="currentpayment" class="form-control"  placeholder="Enter current payment">
										  </div>

										  <!-- <div class="form-group pt-2">
										    <label for="paymentdue">Due Amount</label>
										    <input type="number" name="paymentdue" id="paymentdue" class="form-control"  placeholder="Auto calculated">
										  </div> -->

										  <div class="form-group pt-2">
										    <label for="paymentnote">Note</label>
										    <input type="text" name="paymentnote" id="paymentnote" class="form-control" placeholder="Enter note">
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

			$(document).on('change', '#clubid', function (e) {
				e.preventDefault();

				var clubId = $(this).val();
				//alert(clubId);
						
							$.ajax({
							type: "GET",
							url: "/payment-add/"+clubId,
							success: function(response){
								if (response.status == 200) {
									$('#pastdue').val(response.data.due_amount);
								}
									// $('#paymentid').val(clubId);
								
							}
						});
				});
			

			$(document).on('submit', '#AddPaymentFORM', function (e) {
				e.preventDefault();

				var id = $('#clubid').val();
				console.log(id); 

				let formData = new FormData($('#AddPaymentFORM')[0]);


				$.ajax({
					type: "POST",
					url: "/payment-add/"+id,
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						if (response.status == 200) {
							console.log(response.message)
							$(location).attr('href','/payment-list');
						}	
					}
				});
			});

		});

</script>



@endsection

		



