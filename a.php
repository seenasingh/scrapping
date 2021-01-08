<?php
  $url = "https://sattakingdisawar.in/";
  $html = file_get_contents($url);
  if ($html) {
  	 $dom = new domDocument;
     @$dom->loadHTML($html);
     $tables = $dom->getElementsByTagName('table');
     $col = $tables->item(0)->getElementsByTagName('tr');
     $jsonarr=array();
     foreach ($col as $row) {
         $t = $row->getElementsByTagName('td');
         if (@$t->item(0)->nodeValue) {
           # code...
          $a = array('l' => @$t->item(0)->nodeValue,
         '1' => @$t->item(1)->nodeValue,
         '2' => @$t->item(2)->nodeValue,
         '3' => @$t->item(3)->nodeValue,
         '4' => @$t->item(4)->nodeValue);
         array_push($jsonarr, $a);
         }
     }
     $p=json_encode($jsonarr);
     print_r($jsonarr);
  }
  else{
  	  
  }
?>