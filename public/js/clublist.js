$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchClub();
			function fetchClub(){
				$.ajax({
					type: "GET",
					url: "/club-list",
					dataType:"json",
					success: function(response){
						//console.log(response.club);
						$('tbody').html("");
						$.each(response.club, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
									<td>'+item.serial_number+'</td>\
									<td>'+item.club_name+'</td>\
									<td>'+item.president_name+'</td>\
									<td>'+item.secretary_name+'</td>\
									<td>'+item.address+'</td>\
									<td>'+item.total_deposit+'</td>\
									<td>'+item.paid_amount+'</td>\
									<td>'+item.due_amount+'</td>\
									<td>'+item.payment_status+'</td>\
									<td><img src="uploads/club/'+item.club_logo+'" width="50px" height="50px" alt="image" class="rounded-circle"></td>\
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

			//Edit Club
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var clubId = $(this).val();
				//alert(clubId);
				$('#EDITClubModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/club-edit/"+clubId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_serialnumber').val(response.club.serial_number);
							$('#edit_clubname').val(response.club.club_name);
							$('#edit_presidentname').val(response.club.president_name);
							$('#edit_secretaryname').val(response.club.secretary_name);
							$('#edit_address').val(response.club.address);
							$('#edit_totaldeposit').val(response.club.total_deposit);
							$('#edit_paidamount').val(response.club.paid_amount);
							$('#edit_dueamount').val(response.club.due_amount);
							$('#edit_paymentstatus').val(response.club.payment_status);
							//$('#edit_clublogo').val(response.club.club_logo);
							$('#clubid').val(clubId);
						}
					}
				});
			});

			


			//Update Club
			$(document).on('submit', '#UPDATEClubFORM', function (e)
			{
				e.preventDefault();

				var id = $('#clubid').val(); 

				let EditFormData = new FormData($('#UPDATEClubFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/club-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITClubModal').modal('hide');
							alert(response.message);
							fetchClub();
						}
					}
				});
			});

			//Delete Club
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var clubId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "club-delete/"+clubId,
				        type: 'DELETE',
				        data: {
				            "clubId": clubId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchClub();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#club_table').DataTable({
				    pageLength : 5,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});



			