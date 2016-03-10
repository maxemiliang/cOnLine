<?php 

	include "head.php";

?>
<br>
<img class="responsive-img" src="<?= $base ?>/img/<?php echo $v[0]['img'] ?>"alt="Image">
<h1><?= $v[0]["have"] ?></h1>
<h1><?= $v[0]["price"] ?>€</h1>
<h6>Posted by: <div class="chip"><i class="material-icons left">person</i><a href='<?= $base ?>/user/<?php echo $v[0]['username']?>' role='button'><?php echo $v[0]['username']."</a></div> at: ".$v[0]['date'] ?></h6>
<blockquote class="orange"><p class="flow-text"> <?= $v[0]['text'] ?></p></blockquote>
<a class='waves-effect waves-light btn orange darken-4' href='<?= $base ?>' role='button'><i class="material-icons left">arrow_back</i>Go back</a>
<a class='waves-effect waves-light btn green' href='#' role='button'><i class="material-icons left">link</i>Send a message</a>
