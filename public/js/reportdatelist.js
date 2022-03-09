$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchReport();
			function fetchReport(){
				$.ajax({
					type: "GET",
					url: "/report-date",
					dataType:"json",
					success: function(response){
						console.log(response.report);
						$('tbody').html("");
						$.each(response.report, function(key, item) {
							$('tbody').append('<tr>\
		        				</tr>');
						})
					}
				});
			}


			$(document).ready( function () {
    			$('#reportdate_table').DataTable({
				     pageLength : 5,
				     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});



			