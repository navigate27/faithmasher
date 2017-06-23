$(function(){
	// console.log("TEST");
	loadCandidate();
	selectWinner();

	$("#btnSkip").click(function(){
		$("#loading").fadeIn(150);
		$("#main").fadeOut(100);
		loadCandidate();
	});

	$("#img1").click(function(){
		selectWinner();
		var win = $(this).attr("data-id");
		var lose = $("#img2").attr("data-id");
		sendWin(win,lose);
	});

	$("#img2").click(function(){
		selectWinner();
		var win = $(this).data("id");
		var lose = $("#img1").data("id");
		sendWin(win,lose);
	});

	function loadCandidate(){
		$.getJSON("action/random.php", function(response){
			var img1 = response.candidate_1[0].img;
			var title1 = response.candidate_1[0].title;
			var realname1 = response.candidate_1[0].realname;
			var score_id1 = response.candidate_1[0].score_id;
			var total_wins1 = response.candidate_1[0].wins;
			var total_lose1 = response.candidate_1[0].lose;
			
			var img2 = response.candidate_2[0].img;
			var title2 = response.candidate_2[0].title;
			var realname2 = response.candidate_2[0].realname;
			var score_id2 = response.candidate_2[0].score_id;
			var total_wins2 = response.candidate_2[0].wins;
			var total_lose2 = response.candidate_2[0].lose;

			$("#img1").attr("src","img/"+img1);
			$("#img2").attr("src","img/"+img2);
			$("#title1").html(realname1);
			$("#title2").html(realname2);
			$("#img1").attr("data-id",score_id1);
			$("#img2").attr("data-id",score_id2);

			var winrate1 = 0;
			var winrate2 = 0;
			var wins1 = parseInt(total_wins1);
			var lose1 = parseInt(total_lose1);

			var winrate2 = 0;
			var wins2 = parseInt(total_wins2);
			var lose2 = parseInt(total_lose2);

			if(wins1+lose1!=0){
				winrate1 = ((wins1/(wins1+lose1))*100).toFixed(1);
			}

			if(wins2+lose2!=0){
				winrate2 = ((wins2/(wins2+lose2))*100).toFixed(1);
			}

			console.log(winrate1);
			console.log(winrate2);


			$("#wins1").text(winrate1+"%");
			$("#wins2").text(winrate2+"%");

			$("#loading").fadeOut(100);
			$("#main").fadeIn(150);
		});
	}

	function selectWinner(){
		$("#loading").fadeIn(150);
		$("#main").fadeOut(100);
	}

	function sendWin(win,lose){
		console.log("WIN: "+win);
		console.log("LOSE: "+lose);
		$.get("action/win.php",{
			win: win,
			lose: lose
		},function(response){
			if(response.trim()=="ok"){
				loadCandidate();
			}else{
				location.reload();
			}
		});
	}
});