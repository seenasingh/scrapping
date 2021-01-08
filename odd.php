<?php
 include "simple_html_dom.php";
 $html = file_get_html('https://timesofindia.indiatimes.com/news');
 header("content-type:application/json");
// Find all images
      $jsonarr=array();
	foreach ($html->find('.main-content li') as $e) {
		 $a=array("imageUrl"=>@$e->find(".w_img img",0)->src,
		 	"title"=>@$e->find(".w_tle a",0)->innertext,
		 	"desc"=>@$e->find(".w_desc",0)->innertext);
		 array_push($jsonarr, $a);
	}
       echo json_encode($jsonarr);     
  
?>