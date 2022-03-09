$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchPassport();
			function fetchPassport(){
				$.ajax({
					type: "GET",
					url: "/passport-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.passport, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.client_id+'</td>\
							<td>'+item.passport_number+'</td>\
							<td>'+item.submission_date+'</td>\
							<td>'+item.withdraw_date+'</td>\
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

			//Edit Passport
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var passportId = $(this).val();
				//alert(passportId);
				$('#EDITPassportModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/passport-edit/"+passportId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_clientid').val(response.passport.client_id);
							$('#edit_passportnumber').val(response.passport.passport_number);
							$('#edit_submissiondate').val(response.passport.submission_date);
							$('#edit_withdrawdate').val(response.passport.withdarw_date);
							$('#passportid').val(passportId);
						}
					}
				});
			});

			


			//Update Passport
			$(document).on('submit', '#UpdatePassportFORM', function (e)
			{
				e.preventDefault();

				var id = $('#passportid').val(); 

				let EditFormData = new FormData($('#UpdatePassportFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/passport-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITPassportModal').modal('hide');
							alert(response.message);
							fetchPassport();
						}
					}
				});
			});

			//Delete Passport
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var passportId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "passport-delete/"+passportId,
				        type: 'DELETE',
				        data: {
				            "passportId": passportId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchPassport();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#passport_table').DataTable();
    			// {
				//    pageLength : 6,
				//    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
				// }
			});



			