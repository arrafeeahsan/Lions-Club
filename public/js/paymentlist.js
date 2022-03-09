$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchPayment();
			function fetchPayment(){
				$.ajax({
					type: "GET",
					url: "/payment-list",
					dataType:"json",
					success: function(response){
						//console.log(response.payment);
						$('tbody').html("");
						$.each(response.payment, function(key, item) {
							$('tbody').append('<tr>\
		        					<td>'+item.id+'</td>\
									<td>'+item.past_due+'</td>\
									<td>'+item.current_payment+'</td>\
									<td>'+item.payment_due+'</td>\
									<td>'+item.payment_note+'</td>\
									<td>'+item.club_serial+'</td>\
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

			//Edit Payment
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var paymentId = $(this).val();
				//alert(paymentId);
				$('#EDITPaymentModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/payment-edit/"+paymentId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_pastdue').val(response.payment.past_due);
							$('#edit_currentpayment').val(response.payment.current_payment);
							$('#edit_paymentdue').val(response.payment.payment_due);
							$('#edit_paymentnote').val(response.payment.payment_note);
							$('#edit_clubserial').val(response.payment.club_serial);
							$('#paymentid').val(paymentId);
						}
					}
				});
			});

			


			//Update Payment
			$(document).on('submit', '#UPDATEPaymentFORM', function (e)
			{
				e.preventDefault();

				var id = $('#paymentid').val(); 

				let EditFormData = new FormData($('#UPDATEPaymentFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/payment-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITPaymentModal').modal('hide');
							alert(response.message);
							fetchPayment();
						}
					}
				});
			});

			//Delete Payment
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var paymentId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "payment-delete/"+paymentId,
				        type: 'DELETE',
				        data: {
				            "paymentId": paymentId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchPayment();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#payment_table').DataTable({
				     pageLength : 10,
				     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});



			