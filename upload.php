<div style="display:none">
<?php
	include("config.php");

	session_start();
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
		        	<h1 class="title">Submit your HOT chick</h1>
		      	</div>
		      </div>
		      <br>
			  <div class="container">
	      	    <div class="columns">
			      	<div class="column">
			      	<?php
			      	// if(!$_SESSION){

		      		?>
		      		<!-- <p class="title is-4">
				      	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem dolores sint tempore quia necessitatibus repellat vel alias, quod dolorum commodi, iusto ullam dolorem quisquam at, harum officiis! Consequatur, molestiae, cupiditate.
				    </p> -->
		      		<?php
			      	// }else{
			      	?>
				      	<nav class="panel has-text-left">
				      		<div class="panel-heading">Hot Form</div>
				      		<div class="panel-block">
					      		<div class="column">
						      		<div class="notification is-danger" id="errormsg">
						      		  <button class="delete" id="delNotif"></button>
						      		  Hey, we need full info. Fill up all required fields.
						      		</div>
						      		<div class="notification is-danger" id="invalid">
						      		  <button class="delete" id="delValid"></button>
						      		  Come on, man. Images are only allowed. (png,jpg,gif)
						      		</div>
						      		<div class="notification is-success" id="success">
						      		  <button class="delete" id="delSuccess"></button>
						      		  Nice! You added a chick. Come again.
						      		</div>
					      			<div class="column">
					      				<div class="columns">
					      					<div class="column is-half">
					      						<div class="field">
					      						  <label class="label">HOT Image: </label>
					      						  <p class="control">
					      						    <input class="input is-large" type="file" id="upload">
					      						  </p>
					      						</div>
					      					</div>
					      					<div class="column is-half">
					      						<img id="preview" src="#" alt="Image (300x250)" style="width: 300px; height: 250px">
					      					</div>
					      				</div>
					      				
					      				<div class="field">
					      				  <label class="label">Screen Name/NickName: </label>
					      				  <p class="control">
					      				    <input class="input is-large" type="text" id="screenname" placeholder="e.g. Black Widow">
					      				  </p>
					      				</div>

					      				<div class="field">
					      				  <label class="label">Chick Real Name: </label>
					      				  <p class="control">
					      				    <input class="input is-large" type="text" id="realname" placeholder="e.g. Scarlett Johansson">
					      				  </p>
					      				</div>


					      				<div class="field">
					      				  <label class="label">Details</label>
					      				  <p class="control">
					      				    <textarea class="textarea is-large" id="details" placeholder="e.g. Year, Course, Likes, etc..."></textarea>
					      				  </p>
					      				</div>

					      				<div class="field is-grouped is-pulled-right">
					      				  <p class="control">
					      				   <a class="button is-warning is-medium" id="btnReset">
					      				         Reset
					      				   </a>
					      				  </p>
					      				  <p class="control">
					      				   <a class="button is-primary is-medium" id="btnSubmit">
					      				         Submit
					      				   </a>
					      				  </p>
					      				</div>

					      			</div>

					      		</div>
				      			
				      		</div>
				      	</nav>
				    <?php
				    // }
			      	?>
			      	</div>
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
	<script src="js/upload.js"></script>
</body>
</html>