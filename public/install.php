<?php
/*Installation Script - Creates sqlite db & creates table with mock data
//
*/
class database extends SQLite3{
	public $name;
	
    function __construct($name = 'emaildb'){
		$this->name = $name;
		$full_db = '../data/' . $this->name . '.sqlite';
        $this->open($full_db);
    }
}
$namedb = "emaildb";
	$db = new database($namedb);

	if(!$db){
		echo $db->lastErrorMsg();
		exit;
	}else {
		echo "Database created!\n";
	}

	//Create Table
	$sql = "CREATE TABLE USER_LIST (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		name CHAR(100) NOT NULL,
		email CHAR(50) NOT NULL,
		joined CHAR(50) NOT NULL
		)";
		
	$createTable = $db->exec($sql);

	if(!$createTable){
		echo $db->lastErrorMsg();
	} else {
		echo "Table USER_LIST has been created!\n";
	}
	
	$sql2 = "
	INSERT INTO USER_LIST (id, name, email, joined) 
	VALUES (1, 'Test User', 'Drew Lenhart', '2016-09-09 08:00:09'  );
	";

	$ret = $db->exec($sql2);

	if(!$ret){
		echo $db->lastErrorMsg();
	} else {
		echo "Records created successfully\n";
	}

	//create users table.
	$sqlUsers = "CREATE TABLE USERS (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		name CHAR(100) NOT NULL,
		username CHAR(50) NOT NULL,
		password CHAR(50) NOT NULL
		)";
		
	$createTableusers = $db->exec($sqlUsers);

	if(!$createTableusers){
		echo $db->lastErrorMsg();
	} else {
		echo "Table USERS has been created!\n";
	}
	
	$sql3 = "
	INSERT INTO USERS (id, name, username, password) 
	VALUES (1, 'Test User', 'admin', 'admin'  );
	";

	$user = $db->exec($sql3);

	if(!$user){
		echo $db->lastErrorMsg();
	} else {
		echo "Records created successfully\n";
	}
	//Close connection
	$db->close();

?>