<?php
//The class for handling the post tabel inside the database
class post
{	
	
	public static function create_post($user_id, $post_image, $title, $text) //retrieves parameters from create-post.php and inserts in the database
	{	
		require 'include/db-connect.php';	
		$stmt = $conn->prepare('INSERT INTO tabel (column1, column2, column3, column4, column5) 
			VALUES (:column1, :column2, :column3, :column4, NOW())');
		$stmt->bindParam(':column1', $user_id);
		$stmt->bindParam(':column2', $post_image);
		$stmt->bindParam(':column3', $title);
		$stmt->bindParam(':column4', $text);		
		$stmt->execute();
	}

	public static function read_post() //this is one displaying on the index.php
	{	
		require 'include/db-connect.php';	
		$records = $conn->prepare('SELECT column1, column2, column3, column4, column5 FROM tabel');
		$records->execute();
		$results = $records->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public static function delete_post($db_post_id)
	{	
		require 'include/db-connect.php';
		$stmt = $conn->prepare("DELETE FROM tabel WHERE column1=:column1");
        $stmt->bindParam(':column1', $db_post_id);
        $stmt->execute();
        header("location: index.php");
	}
}
	?>