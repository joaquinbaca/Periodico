<?php

function connectDB() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "Periodico";

	$connection = new mysqli( $servername, $username, $password, $db );

	if ( $connection->connect_error ) {
		die( "Connection failed: " . $connection->connect_error );
	}

	if ( !$connection->set_charset( "utf8" ) ) {
		echo "Error cargando el conjunto de caracteres utf8";
	}

	return $connection;
}