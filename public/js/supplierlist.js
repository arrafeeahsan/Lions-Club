$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchSupplier();
			function fetchSupplier(){
				$.ajax({
					type: "GET",
					url: "/supplier-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.supplier, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.supplier_name+'</td>\
							<td>'+item.supplier_address+'</td>\
							<td>'+item.supplier_contact+'</td>\
							<td>'+item.supplier_nid+'</td>\
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

			//Edit Supplier
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var supplierId = $(this).val();
				//alert(supplierId);
				$('#EDITSupplierModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/supplier-edit/"+supplierId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_suppliername').val(response.supplier.supplier_name);
							$('#edit_supplieraddress').val(response.supplier.supplier_address);
							$('#edit_suppliercontact').val(response.supplier.supplier_contact);
							$('#edit_suppliernid').val(response.supplier.supplier_nid);
							$('#supplierid').val(supplierId);
						}
					}
				});
			});

			


			//Update Supplier
			$(document).on('submit', '#UpdateSupplierFORM', function (e)
			{
				e.preventDefault();

				var id = $('#supplierid').val(); 

				let EditFormData = new FormData($('#UpdateSupplierFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/supplier-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITSupplierModal').modal('hide');
							alert(response.message);
							fetchSupplier();
						}
					}
				});
			});

			//Delete Supplier
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var supplierId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "supplier-delete/"+supplierId,
				        type: 'DELETE',
				        data: {
				            "supplierId": supplierId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchSupplier();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#supplier_table').DataTable();
    			// {
				//     pageLength : 6,
				//     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
				// }
			});



			