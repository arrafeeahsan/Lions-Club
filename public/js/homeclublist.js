$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchClub();
			function fetchClub(){
				$.ajax({
					type: "GET",
					url: "/home",
					dataType:"json",
					success: function(response){
						//console.log(response.club);
						$('tbody').html("");
						$.each(response.club, function(key, item) {
							$('tbody').append('<tr>\
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
		        		</tr>');
						})	
					}
				});
			}

			


			$(document).ready( function () {
    			$('#club_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});



			