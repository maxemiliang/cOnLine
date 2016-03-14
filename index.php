<?php

error_reporting(E_ALL);
ini_set('display_errors',1); // DEV ENV

require "lib/main.php";

// Database connection
require "lib/db.php";

$app = new Rout($db);
/*$app->setDb($db);*/

$login = new Login($db);

$login->createUser("admin", "admin123", 999);


$app->get("/", function() use ($app) 
{

	$q = $app->db->query("SELECT cars.*, users.username FROM cars LEFT JOIN users ON users.uID=cars.userID ORDER BY date DESC;");

	$r = $q->fetchAll();

	$app->render("home.php", $r);

});

$app->get("/login", function() use ($app) 
{

	$app->render("login.php");

});

$app->get("/car/:id", function($id) use ($app) 
{

	$q = $app->db->prepare("SELECT cars.*, users.username FROM cars LEFT JOIN users ON users.uID=cars.userID WHERE cID = ?");

	$q->execute(array($id));

	$r = $q->fetchAll();

	if($q->rowCount() > 0) {

		$app->render("car.php", $r);

	} else {

		$app->render("404.php");

	}

});

$app->get("/add", function() use ($app, $login) 
{

	if($login->isLoggedIn()) {
		
		$app->render("add.php");
	
	} else {

		$app->redirect("/");

	}

});

$app->get("/register", function() use ($app) 
{

	$app->render("register.php");

});


$app->post("/adduser", function() use ($app, $login) 
{

	$adduser = $login->createUser($_POST["username"], $_POST["password"], 1);

	if ($adduser == 1) {

		$app->redirect("/");

	} else if ($adduser == 2) {

		$app->redirect("/register", "Username needs to be min 5 characters and Password needs to be min 8 characters");

	} else if ($adduser == 4) {

		$app->redirect("/register", "Username taken!");

	} else {

		$app->redirect("/register", "Unkown error, contact admin");

	}
});

$app->post("/login/user", function() use ($app, $login) 
{

	if ($login->tryLogin($_POST)) {

		$app->redirect("/");

	} else {

		$app->redirect("/login", "Username or password is wrong");

	}

});

$app->get("/logout", function() use ($app, $login) 
{

	$login->tryLogout();

	$app->redirect("/");

});

$app->get("/user/:id", function($id) use ($app) 
{

	$id = rawurldecode($id);

	$query = $app->db->prepare("SELECT * FROM users WHERE username = ?"); 

	$query->execute(array($id));

	$r = $query->fetchAll();

	if(count($r) > 0) {

		$app->render("user.php", $r);

	} else {

		$app->render("user404.php");

	}


});

$app->get("/messages", function () use ($app, $login) 
{

	$app->render("messages.php");

});

$app->get("/getchat", function() use ($app, $login) 
{

	$data = array(
		'key' => 'value',
		'key2' => 'test'
	);

	$json = json_encode($data);

	echo $json;

});

$app->post("/addcar", function() use ($app, $login) 
{

	if ($login->isLoggedIn()) {

			if (exif_imagetype($_FILES["img"]["tmp_name"]) != false) {

					$filename = tempnam('img/', 'img');
		    		unlink($filename);
		    		$period_position = strrpos($filename, ".");
		   			$filename = substr($filename, 0, $period_position);
		    		$file = substr($filename, -7);
		    		$_POST['img'] = $file;

		    		if (move_uploaded_file($_FILES['img']['tmp_name'], $filename)) {

						$sql = "INSERT INTO cars (have, price, text, img, userID, date) VALUES (?, ?, ?, ?, ?, NOW());";

						$sth = $app->db->prepare($sql);

						$sth->execute(array($_POST['have'], $_POST['price'], $_POST['text'], $_POST['img'], $_SESSION['userID']));

						$app->redirect("/");

					} else {

						$app->redirect("/add", "Upload failed");

					}

				} else {

					$app->redirect("/add", "File must be an image!");

				}

				} else {

					$app->redirect("/");

				}

}); 
