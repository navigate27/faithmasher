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
	
	<section class="section">
	    <div class="container">
	      <div class="heading has-text-centered">
		      <div class="columns">
		      	<div class="column">
		        	<h1 class="title">TOP 20 HOTTEST</h1>
		      	</div>
		      </div>
		      <br>
		      <div class="">
			      <div class="container">

			      	<?php
				      	$getHot = $conn->query("
				      		SELECT *,(items_score.wins/(items_score.wins+items_score.lose)*100) as winrate 
				      		FROM `items` 
				      		JOIN items_score 
				      		ON items.item_id = items_score.item_id 
				      		WHERE items.allow = 1
				      		ORDER BY items_score.wins 
				      		DESC LIMIT 20
				      		");
				      	if($getHot->num_rows!=0){
				      		while($rows=$getHot->fetch_assoc()){
				      		?>
				      		<div class="columns">
					      		<div class="column is-12">
						      		<div class="card">
						      		  <div class="card-image">
						      		    <figure class="image is-square">
						      		      <img src="img/<?php echo $rows['img']; ?>" alt="Image">
						      		    </figure>
						      		  </div>
						      		  <div class="card-content">
						      		    <div class="media">
						      		      <div class="media-content">
						      		        <p class="title is-4"><strong><?php echo $rows['title']; ?></strong></p>
						      		        <p class="subtitle is-6"><?php echo $rows['realname']; ?></p>
						      		      </div>
						      		    </div>

						      		    <div class="content">
						      		      <h4><?php echo $rows['details']; ?></h4>
						      		      <br>
						      		      <h5 class="has-text-left is-5"><strong>Win Rate: <?php echo round($rows['winrate'],1); ?>%</strong></h5>
						      		      
						      		      <progress class="progress is-success" value="<?php echo $rows['winrate']; ?>" max="100"><?php echo $winper; ?>%</progress>

						      		      <a class="button is-danger is-outlined is-medium"><i class="fa fa-heart fa-fx"></i>&nbsp;<?php echo $rows['wins']; ?></a>
						      		    </div>
						      		  </div>
						      		</div>
					      		</div>
				      		</div>

				      		<?php
				      		}
				      	}
			      	?>
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
	</script>
</body>
</html>