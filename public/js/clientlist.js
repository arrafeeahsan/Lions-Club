$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchClient();
			function fetchClient(){
				$.ajax({
					type: "GET",
					url: "/client-list",
					dataType:"json",
					success: function(response){
						//console.log(response.client);
						$('tbody').html("");
						$.each(response.client, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.client_name+'</td>\
							<td>'+item.client_father+'</td>\
							<td>'+item.client_address+'</td>\
							<td>'+item.client_phone+'</td>\
							<td>'+item.client_nid+'</td>\
							<td>'+item.client_dob+'</td>\
							<td><img src="uploads/client/'+item.client_pp+'" width="50px" height="50px" alt="image" class="rounded-circle"></td>\
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

			//Edit Client
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var clientId = $(this).val();
				//alert(clientId);
				$('#EDITClientModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/client-edit/"+clientId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_clientname').val(response.client.client_name);
							$('#edit_clientfather').val(response.client.client_father);
							$('#edit_clientaddress').val(response.client.client_address);
							$('#edit_clientphone').val(response.client.client_phone);
							$('#edit_clientnid').val(response.client.client_nid);
							$('#edit_clientpassport').val(response.clientPassport);
							$('#edit_clientdob').val(response.client.client_dob);
							$('#clientid').val(clientId);
						}
					}
				});
			});

			


			//Update Client
			$(document).on('submit', '#UpdateClientFORM', function (e)
			{
				e.preventDefault();

				var id = $('#clientid').val(); 

				let EditFormData = new FormData($('#UpdateClientFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/client-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITClientModal').modal('hide');
							alert(response.message);
							fetchClient();
						}
					}
				});
			});

			//Delete Client
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var clientId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "client-delete/"+clientId,
				        type: 'DELETE',
				        data: {
				            "clientId": clientId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchClient();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#client_table').DataTable({
				    pageLength : 6,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     // scrollY:        200,
				     // scrollCollapse: true,
				     // scroller:       true
				 });
			});



			