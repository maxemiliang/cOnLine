<?php 

	require "head.php";



?>
<?php
	if (isset($_SESSION["redir"])) {
		
		echo "<br><div style='red chip'>{$_SESSION['redir']}</div>";
		unset($_SESSION["redir"]);
	
	}
?>
	<form class="" id="post_trade" action="<?php echo $base ?>/addcar" method="post" enctype= "multipart/form-data">
			<h1>Place an Ad</h1>
		  <div class="form-group">
		    <label for="InputTitle">Car info:</label>
		    <input type="text" name="have" class="form-control" id="InputTitle" placeholder="Have" required>
		  </div>
		  <div class="form-group">
		    <label for="Inputwant">How much is your price</label>
		    <input type="number" name="price" class="form-control" id="Inputwant" placeholder="Want" required>
		  </div>
		  <div class="form-group">
		    <label for="InputText">Info about car:</label>
		    <textarea form="post_trade" name="text" class="form-control" id="InputText" placeholder="Texten"></textarea>
		  </div>
		  <div class="form-group">
		  <br>
		    <label for="InputFile">Picture of car</label><br>
		    <input type="file" name="img" id="InputFile" required><br><br>
		  </div>
		  <button type="submit" class="btn waves-effect waves-light orange">Submit</button>
	</form>
</div>