$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchExpense();
			function fetchExpense(){
				$.ajax({
					type: "GET",
					url: "/expense-list",
					dataType:"json",
					success: function(response){
						//console.log(response.expense);
						$('tbody').html("");
						$.each(response.expense, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.type+'</td>\
							<td>'+item.amount+'</td>\
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

			//Edit Expense
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var expenseId = $(this).val();
				//alert(expenseId);
				$('#EDITExpenseModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/expense-edit/"+expenseId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_type').val(response.expense.type);
							$('#edit_amount').val(response.expense.amount);
							$('#expenseid').val(expenseId);
						}
					}
				});
			});

			


			//Update Expense
			$(document).on('submit', '#UpdateExpenseFORM', function (e)
			{
				e.preventDefault();

				var id = $('#expenseid').val(); 

				let EditFormData = new FormData($('#UpdateExpenseFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/expense-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITExpenseModal').modal('hide');
							alert(response.message);
							fetchExpense();
						}
					}
				});
			});

			//Delete Expense
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var expenseId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "expense-delete/"+expenseId,
				        type: 'DELETE',
				        data: {
				            "expenseId": expenseId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchExpense();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#expense_table').DataTable();
    			// {
				//     pageLength : 6,
				//     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
				// }
			});



			