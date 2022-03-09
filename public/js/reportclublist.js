
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	fetchReport();
	function fetchReport(){
		$.ajax({
			type: "GET",
			url: "/report-club",
			dataType:"json",
			success: function(response){
				//console.log(response.report);
				$('tbody').html("");
				$.each(response.report, function(key, item) {
					$('tbody').append('<tr>\
					<td>'+item.club_serial+'</td>\
					<td>'+item.past_due+'</td>\
					<td>'+item.current_payment+'</td>\
					<td>'+item.payment_due+'</td>\
					<td>'+item.payment_note+'</td>\
			        </tr>');
				})
			}
		});
	}

	

	$(document).on('change', '#clubwise', function (e) {
		e.preventDefault();

		var clubId = $(this).val();
		alert(clubId);
						
		$.ajax({
			type: "GET",
			url: "/report-club/"+clubId,
			dataType:"json",
			success: function(response){
				if (response.status == 200) {
					console.log(response.data);
					$('tbody').html("");
					$.each(response.data, function(key, item) {
						$('tbody').append('<tr>\
						<td>'+item.club_serial+'</td>\
						<td>'+item.past_due+'</td>\
						<td>'+item.current_payment+'</td>\
						<td>'+item.payment_due+'</td>\
						<td>'+item.payment_note+'</td>\
				        </tr>');
					})
				}		
			}
		});
	});		


	$(document).ready( function () {
	    	$('#reportclub_table').DataTable({
				pageLength : 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				scrollY:        380,
				scrollCollapse: true,
				scroller:       true
			});
		});




			