<?php
/*
	Author:  Drew D. Lenhart
	Page: lite.database.php *Default database
	Desc: Database connection info.
*/

use Illuminate\Database\Capsule\Manager as Capsule;  

$capsule = new Capsule; 

$capsule->addConnection(
	array(
		'driver'   => 'sqlite',
		'database' => '../data/emaildb.sqlite',
		'prefix'   => ''
	),
	"default"
);

$capsule->bootEloquent();

?>
