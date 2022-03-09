$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchMember();
			function fetchMember(){
				$.ajax({
					type: "GET",
					url: "/member-list",
					dataType:"json",
					success: function(response){
						//console.log(response.member);
						$('tbody').html("");
						$.each(response.member, function(key, item) {
							$('tbody').append('<tr>\
		        					<td>'+item.member_id+'</td>\
									<td>'+item.member_name+'</td>\
									<td>'+item.member_type+'</td>\
									<td>'+item.member_club+'</td>\
									<td>'+item.member_phone+'</td>\
									<td>'+item.member_email+'</td>\
									<td>'+item.member_address+'</td>\
									<td>'+item.member_father_name+'</td>\
									<td>'+item.member_mother_name+'</td>\
									<td><img src="uploads/member/'+item.member_picture+'" width="50px" height="50px" alt="image" class="rounded-circle"></td>\
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

			//Edit Member
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var memberId = $(this).val();
				//alert(memberId);
				$('#EDITMemberModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/member-edit/"+memberId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_memberid').val(response.member.member_id);
							$('#edit_membername').val(response.member.member_name);
							$('#edit_membertype').val(response.member.member_type);
							$('#edit_memberclub').val(response.member.member_club);
							$('#edit_memberphone').val(response.member.member_phone);
							$('#edit_memberemail').val(response.member.member_email);
							$('#edit_memberaddress').val(response.member.member_address);
							$('#edit_memberfathername').val(response.member.member_father_name);
							$('#edit_membermothername').val(response.member.member_mother_name);
							//$('#edit_memberpicture').val(response.member.member_picture);
							$('#id').val(memberId);
						}
					}
				});
			});

			


			//Update Member
			$(document).on('submit', '#UPDATEMemberFORM', function (e)
			{
				e.preventDefault();

				var id = $('#id').val(); 

				let EditFormData = new FormData($('#UPDATEMemberFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/member-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITMemberModal').modal('hide');
							alert(response.message);
							fetchMember();
						}
					}
				});
			});

			//Delete Member
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var memberId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "member-delete/"+memberId,
				        type: 'DELETE',
				        data: {
				            "memberId": memberId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchMember();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#member_table').DataTable({
				     pageLength : 5,
				     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});



			