<?php

	session_start();
	include 'config.php';
  $desc_content2 = $_POST['desc_content2'];
  $hid2 = $_POST['hid2'];

$sql1 = $db->prepare("SELECT * FROM webcontent_desc WHERE webpage_name='$hid2'");
$sql1->execute();
$num = $sql1->rowCount();
		if ($num==0) {
      $sql = $db->prepare("INSERT INTO webcontent_desc SET desc_description='$desc_content2', desc_order='1', desc_status='1', webpage_name='$hid2'");
      $sql->execute();
		}
		else{
      $que = $db->query("SELECT MAX(desc_id) as posid FROM webcontent_desc WHERE webpage_name='$hid2'");
      $que ->execute();
      $temp = $que->fetch(PDO::FETCH_ASSOC);
      $last =  $temp['posid'];
$last++;
      $sql = $db->prepare("INSERT INTO webcontent_desc SET desc_description='$desc_content2', desc_order='$last', desc_status='1', webpage_name='$hid2'");
      $sql->execute();
		}
 ?>
