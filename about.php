<?php
	include("config.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>faithMASH</title>

	<?php
		include("include/head-link.php");
	?>
</head>
<body>

	<?php
		include("include/nav.php");
	?>

	<section class="section">
	    <div class="container">
	      <div class="has-text-centered">
		      <div class="columns">
		      	<div class="column">
		        	<h1 class="title">ABOUT <span style="text-transform:lowercase">faith</span><strong>MASH</strong></h1>
		      	</div>
		      </div>
		      <br>
			    <div class="container">
			      	<div class="content has-text-centered">
				      <p >
				      	<span style="text-transform:lowercase">faith</span><strong>MASH</strong> is a realtime poll of the hottest chick in FAITH campus.
				      </p>
				      <p>
				      	So suck up your ass and vote for your hottest chick! And let's see who are the <a href="top20.php">TOP 20</a> smokin' hotties.
				      </p>
				      <a href="index.php" class="button is-primary is-outlined">
				      	Vote Now
				      </a>
			      	</div>
		      	</div>
	      </div>
	    </div>
	</section>

	<?php
		include("include/footer.php");
	?>
	

	<?php
		include("include/foot-link.php");
	?>
	<script>
		$('.nav-toggle').click(function(){
			$(".nav-menu").toggle();
		});
	</script>
</body>
</html>