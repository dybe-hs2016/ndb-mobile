 <?php
 /*
 * TITLE: Noten Erfasst
 * AUTHOR: tbu
 * CREATION DATEN: 2016.01.13
 * CONTENT: Procedure to insert form data form nErfassen.php into
 * DB. Display feedback (success / failior).
 */

/*
* PROCEDURE to get the KEY->VALUE pairs of $_POST into sql query
* Steps:
* 	convert $_POST into ARAY $post_key & $post_val (foreach loop)
* 	convert $post_key & $post_val into STING $sql_key & $sql_val
* 		(implode)
* 	insert $sql_key & $sql_val into sql QUERY $sql
* 
* FORM DATA
* 	The form data we get through $_POST consists already only of
* 	the data, that well be written into tbl_noten.
*		The association of multiple instruments will probably need its
* 	own query.
* 
*/



 ?>