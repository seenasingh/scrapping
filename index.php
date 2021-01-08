<?php
 include "simple_html_dom.php";
 header("content-type:application/json");
 $html = file_get_html('https://www.vegrecipesofindia.com/recipes/');

// Find all images
  $jsonarr=array();
  foreach ($html->find('.post-summary') as $e) {
     $a=array("imageUrlset"=>@$e->find("a img",1)->src,
      "time_take"=>@$e->find(".wprm-recipe-time span",0)->innertext,
      "type"=>@$e->find(".entry-category",0)->innertext,
       "url"=>@$e->find("a",0)->href,
      "name"=>@$e->find(".post-summary__title a",0)->innertext);
     array_push($jsonarr, $a);
  }
  if(isset($_GET['page'])){
    # code...
    $i=$_GET['page'];
    $html = file_get_html('https://www.vegrecipesofindia.com/recipes/?fwp_paged='.$i);

// Find all images
  $jsonarr=array();
  foreach ($html->find('.post-summary') as $e) {
     $a=array("imageUrlset"=>@$e->find("a img",1)->src,
      "time_take"=>@$e->find(".wprm-recipe-time span",0)->innertext,
      "type"=>@$e->find(".entry-category",0)->innertext,
       "url"=>@$e->find("a",0)->href,
      "name"=>@$e->find(".post-summary__title a",0)->innertext);
     array_push($jsonarr, $a);
  }

  }
  $result = json_encode($jsonarr);
  echo $result;
?>
