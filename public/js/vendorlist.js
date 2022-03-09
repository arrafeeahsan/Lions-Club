$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVendor();
			function fetchVendor(){
				$.ajax({
					type: "GET",
					url: "/vendor-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.vendor, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.vendor_name+'</td>\
							<td>'+item.vendor_address+'</td>\
							<td>'+item.vendor_contact+'</td>\
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

			//Edit Vendor
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var vendorId = $(this).val();
				//alert(vendorId);
				$('#EDITVendorModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/vendor-edit/"+vendorId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_vendorname').val(response.vendor.vendor_name);
							$('#edit_vendoraddress').val(response.vendor.vendor_address);
							$('#edit_vendorcontact').val(response.vendor.vendor_contact);
							$('#vendorid').val(vendorId);
						}
					}
				});
			});

			


			//Update Vendor
			$(document).on('submit', '#UpdateVendorFORM', function (e)
			{
				e.preventDefault();

				var id = $('#vendorid').val(); 

				let EditFormData = new FormData($('#UpdateVendorFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/vendor-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITVendorModal').modal('hide');
							alert(response.message);
							fetchVendor();
						}
					}
				});
			});

			//Delete Passport
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var vendorId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "vendor-delete/"+vendorId,
				        type: 'DELETE',
				        data: {
				            "vendorId": vendorId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchVendor();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#vendor_table').DataTable();
    			// {
				//     pageLength : 6,
				//     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
				// }
			});



			