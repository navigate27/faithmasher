<div style="display:none">
<?php
	include("config.php");
?>
</div>
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

	<section class="section" style="background-color: #F6F6F6">
	    <div class="container">
	      <div class="heading has-text-centered">
		      <div class="columns">
		      	<div class="column">
		        	<h1 class="title is-1">Who is <span class="is-text-danger">hotter</span>?</h1>
		        	<h2 class="subtitle">Click to choose</h2>
		      	</div>
		      </div>
		      <br>
		      <div class="">
			      <div class="container">
			      	<div class="">
				      	<div id="loading" class="loading">
				      		<img src="img/loading.svg" alt="Loading...">
				      	</div>

				      	<div class="columns is-desktop" id="main">
				      		<div class="column">
					      		<figure class="image">
					      			<div class="thumbnail hvr-shadow">
					      			  <img src="" alt="Image" data-id="" class="portrait" id="img1" />
					      			</div>
					      		</figure>
				      			<h4 id="title1" class="title is-4"></h4>
				      			<div class="columns">
				      				<div class="column">
				      					<h6 class="subtitle is-6">
				      						Win Rate: <span id="wins1"></span>
				      					</h6>
				      				</div>
				      			</div>
				      		</div>
				      		<div class="column" style="margin-top:50px">
				      			<h1 class="title">OR</h1>
				      		</div>
				      		<div class="column">
				      			<figure class="image">
				      			  <div class="thumbnail hvr-shadow">
				      			    <img src="" class="portrait" data-id="" alt="Image" id="img2"/>
				      			  </div>
				      			</figure>
				      			<h4 id="title2" class="title is-4"></h4>
				      			<div class="columns">
				      				<div class="column">
				      					<h6 class="subtitle is-6">
				      						Win Rate: <span id="wins2"></span>
				      					</h6>
				      				</div>
				      			</div>
				      		</div>
				      	</div>

			      	</div>
			      </div>
		      </div>
	      </div>
	    </div>
	</section>

    <div class="section">
	      <div class="container has-text-centered">
	      	<div class="column is-half is-offset-one-quarter">
	      		<a href="javascript:void(0)" id="btnSkip" class="button is-primary is-large">SKIP&nbsp;<i class="fa fa-forward"></i></a>
	      	</div>
	      </div>
    </div>

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
	<script src="js/random.js?v=1"></script>
</body>
</html>