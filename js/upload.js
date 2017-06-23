$(document).ready(function(){
	$("#errormsg").hide();
	$("#invalid").hide();
	$("#success").hide();
	function readURL(input) {
	    $("#invalid").hide();
	    $("#preview").empty();
	    if (input.files && input.files[0]) {
	    	var upload = false;

	    	var file = input.files[0];
	    	var fileType = file["type"];
	    	var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
	    	if ($.inArray(fileType, ValidImageTypes) < 0) {
	    	     upload = false;
	    	}else{
	    		 upload = true;
	    	}

	    	if(upload){
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#preview').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
	    	}else{
	    		$("#upload").val("");
	    		$("#preview").attr("src","#");
	    		$("#invalid").fadeIn();
	    	}
	    }
	}
	
	$("#upload").change(function(){
	    readURL(this);
	});

	$("#btnSubmit").click(function(){
		console.log("click");

		if($("#realname").val()!=""){
			if($("#screenname").val()!=""){
				if($("#details").val()!=""){
					if($("#upload").val()!=""){
						$("#errormsg").hide();
						$(this).addClass("is-loading");
						var fd = new FormData();

						fd.append('realname',$("#realname").val());
						fd.append('screenname',$("#screenname").val());
						fd.append('details',$("#details").val());
						var files = $("#upload").prop('files');
						fd.append('img',$('#upload')[0].files[0]);


						 $.ajax({
						     url: "action/submit.php",
						     type: "POST",
						     data:  fd,
						     contentType: false,
						     cache: false,
						     processData:false,
						     success: function(response)
						     {
								 $("#btnSubmit").removeClass("is-loading");
						         if(response.trim()=="ok"){
						         	console.log("Success!");
						         	$("#success").fadeIn();
						         	clearAll();
						         }else{
						         	console.log(response);
						         }
						     },
						     error: function() 
						     {
						         alert("Error!");
						     }           
						});
					}else{
						scrollTop();
						$("#errormsg").fadeIn();
					}
				}else{
					scrollTop();
					$("#errormsg").fadeIn();
				}
			}else{
				scrollTop();
				$("#errormsg").fadeIn();
			}
		}else{
			scrollTop();
			$("#errormsg").fadeIn();
		}
	});

	function scrollTop(){
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, '500', 'swing', function() { 
		});
	}

	function clearAll(){
		scrollTop();
		$("#realname").val("");
		$("#screenname").val("");
		$("#details").val("");
		$("#upload").val("");
		$("#preview").attr("src","#");
	}

	$("#delNotif").click(function(){
		$("#errormsg").fadeOut();
	});
	$("#delValid").click(function(){
		$("#invalid").fadeOut();
	});
	$("#delSuccess").click(function(){
		$("#success").fadeOut();
	});

	$("#btnReset").click(function(){
		clearAll();
	});
});