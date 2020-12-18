<?php

$db = mysqli_connect("localhost", "root", "", "db_vote");

function show ($table, $where = null) {
	global $db;
	$command = "SELECT * FROM $table";
	if ($where != null){
		$command .= " WHERE $where";
	}
	$query = mysqli_query($db, $command) or die ($db->error);
	$row = array();
	while ($rows = mysqli_fetch_array($query, MYSQLI_BOTH)) {
		$row[] = $rows;
	}
	return $row;
	mysqli_close($db);
}