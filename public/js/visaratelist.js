$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVisarate();
			function fetchVisarate(){
				$.ajax({
					type: "GET",
					url: "/visarate-list",
					dataType:"json",
					success: function(response){
						//console.log(response.visarate);
						$('tbody').html("");
						$.each(response.visarate, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
		        			<td>'+item.visa_id+'</td>\
							<td>'+item.visa_number+'</td>\
							<td>'+item.vendor_rate+'</td>\
							<td>'+item.agent_rate+'</td>\
							<td>'+item.passenger_rate+'</td>\
							<td>'+item.payment_date+'</td>\
							<td>'+item.payment_status+'</td>\
							<td>'+item.benefit_loss+'</td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>\
		                    	</button>\
		                    	<button type="button" value="'+item.id+'" class="delete_btn btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>\
		                    	</button>\
		        			</td>\
		        		</tr>');
						})	
					}
				});
			}

			//Edit Visa
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var visarateId = $(this).val();
				//alert(visarateId);
				$('#EDITVisarateModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/visarate-edit/"+visarateId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_visaid').val(response.visarate.visa_id);
							$('#edit_visanumber').val(response.visarate.visa_number);
							$('#edit_vendorrate').val(response.visarate.vendor_rate);
							$('#edit_agentrate').val(response.visarate.agent_rate);
							$('#edit_passengerrate').val(response.visarate.passenger_rate);
							$('#edit_paymentdate').val(response.visarate.payment_date);
							$('#edit_paymentstatus').val(response.visarate.payment_status);
							$('#visarateid').val(visarateId);
						}
					}
				});
			});

			


			//Update Visa
			$(document).on('submit', '#UpdateVisarateFORM', function (e)
			{
				e.preventDefault();

				var id = $('#visarateid').val(); 

				let EditFormData = new FormData($('#UpdateVisarateFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/visarate-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITVisarateModal').modal('hide');
							alert(response.message);
							fetchVisarate();
						}
					}
				});
			});

			//Delete Visa
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var visarateId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "visarate-delete/"+visarateId,
				        type: 'DELETE',
				        data: {
				            "visarateId": visarateId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchVisarate();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#visarate_table').DataTable();
    			// {
				//     pageLength : 6,
				//     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
				// }
			});



			