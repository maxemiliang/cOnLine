<!-- <input id="bmenub" type="checkbox" class="show">
<label for="bmenub" class="burger pseudo button">menu</label>
 -->
 <div class="navbar-fixed red">
  <nav>
    <div class="nav-wrapper orange">
    <a href="<?= $base ?>" class="brand-logo">cOnline </a>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul id="nav-desktop" class="right hide-on-med-and-down">
      <?php if (isset($_SESSION["userID"]) != true) { ?>
        <li ><a href="<?= $base ?>/login">Login</a></li>
        <li><a href="<?= $base ?>/register">Register</a></li>
        </ul>
      <?php } else { ?>
        <li><a class="waves-effect waves-light btn orange lighten-2" href="<?= $base ?>/add">Place an Ad</a></li>
        <li><a href="<?= $base ?>/user/<?= $_SESSION['user']; ?>"><i class="material-icons left">person</i></a></li>
        <li><a href="<?= $base ?>/messages"><i class="material-icons">message</i></a></li>
        <li><a href="<?= $base ?>/logout">Logout</a></li>
        </ul>
      <?php } ?>
    </div>
    <ul id="nav-mobile" class="side-nav">
      <?php if (isset($_SESSION["userID"]) != true) { ?>
        <li ><a href="<?= $base ?>/login">Login</a></li>
        <li><a href="<?= $base ?>/register">Register</a></li>
        </ul>
      <?php } else { ?>
        <li><a class="waves-effect waves-light btn orange lighten-2" href="<?= $base ?>/add">Place an Ad</a></li>
        <li><a href="<?= $base ?>/user/<?= $_SESSION['user']; ?>"><i class="material-icons left">person</i></a></li>
        <li><a href="<?= $base ?>/messages"><i class="material-icons">message</i></a></li>
        <li><a href="<?= $base ?>/logout">Logout</a></li>
        </ul>
      <?php } ?>
    </div>
</nav>
</div>

<div class="container">