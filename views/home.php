<?php

include "head.php";

?>
    
<div class="row">
<?php
    foreach($v as $row) {
        ?>
        <div class='col s6'>
		<div class="card">
		<div class="card-image">
        	<img class="responsive-img" src="img/<?php echo $row['img'] ?>"alt="Image">
        	<span class="card-title orange accent-4"><?php echo $row['have'] ?> <br><?php echo $row['price']."€"; ?></span>
		</div>


        <blockquote><h6>Posted by: <div class="chip"><i class="material-icons left">person</i><a href='user/<?php echo $row['username']?>' role='button'><?php echo $row['username']."</a></div> at: ".$row['date'] ?></h6></blockquote>
        <br>
		<div class="card-content">
        <p>
        <?php 
            if (strlen($row['text']) >= 50) {
                echo substr($row['text'], 0, 49)."...";
            } else {
                echo $row['text'];
            } 
        ?>
        </p>
        </div>

		<div class="card-action">
        <a class='waves-effect waves-light btn orange darken-4' href='car/<?php echo $row['cID']?>' role='button'><i class="material-icons left">pageview</i>More info</a>
        <a class='waves-effect waves-light btn green' href='#' role='button'><i class="material-icons left">link</i>Send A message</a>
        </div>
		</div>
		</div>

        <?php
    }
?>
</div>
</div>
</body>
</html>
