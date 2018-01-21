<?php
$file_url= 'http://www.soletraderoutlet.co.uk/timberland-euro-rock-hiker-boots/eurorkhn/'; // url
// code for get the product title code start here
$html = file_get_contents($file_url); //get the html returned from the following url

$scrap_doc = new DOMDocument(); // new dom document

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

  $scrap_doc->loadHTML($html);
  libxml_clear_errors(); //remove errors for yucky html
  
  $pokemon_xpath = new DOMXPath($scrap_doc);

  //get all the h2's with an id
  $pokemon_row = $pokemon_xpath->query('//h1[@id]');

  if($pokemon_row->length > 0){
    foreach($pokemon_row as $row){
       $row->nodeValue . "<br/>";
    }

    echo "<h1>".$row->nodeValue."</h1>";
  }

    //get all the h2's with an id
  $pokemon_row = $pokemon_xpath->query('//span[@id]');

  if($pokemon_row->length > 0){
    foreach($pokemon_row as $row){
      echo $row->nodeValue . "<br/>";
    }



  }
}
// code for get the product title end here
/* code for fetching product detail page */
get_content_by_class(curl($file_url), "productDetails");

//get_content_by_class(curl('http://www.soletraderoutlet.co.uk/penguin-lodge-boots/lodgebrn/'), "productDetails");

function curl($url) {
    $ch = curl_init();  // Initialising cURL
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 0);
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch); 
    curl_close($ch);    // Closing cURL
    return $data;   
}

function get_content_by_class($html, $container_class_name) {
    preg_match_all('#<\s*?div class="'. $container_class_name . '\b[^>]*>(.*?)</div\b[^>]*>#s', $html, $matches);

    foreach($matches as $match){
        $match1 = str_replace('<','&lt',$match);
        $match2 = str_replace('>','&gt',$match1);
 // var_dump($match);
    }  

  print_r($match[0]);
$myfile = fopen("data.txt", "w") or die("Unable to open file!");//header('Content-Type: application/csv; charset=UTF-8');
fwrite($myfile, strip_tags($match[0]));
fclose($myfile);


}


/*

      $f = fopen("data.csv", "w");
foreach ($match[0] as $line) {
    fputcsv($f, strip_tags($line));
}

/* code for fetching product detail page ends here */



?>
