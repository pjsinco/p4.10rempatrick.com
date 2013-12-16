<?php 
  //Instant PHP Web Scraping
  //By: Jacob Ward;
  //Publisher: Packt Publishing
  
  function curl_get($url) {
    $ch = curl_init();
    
    // set curl options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
  
    // execute curl
    $results = curl_exec($ch);
  
    // close curl
    curl_close($ch);
  
    return $results;
  }

  $packt_book = Array();

  function return_xpath_obj($item) {
    $xml_page_dom = new DomDocument();

    @$xml_page_dom->loadHTML($item);

    //instantiate new XPath DOM object
    $xml_page_xpath = new DOMXPath($xml_page_dom);

    return $xml_page_xpath;
  }


  $packt_page = curl_get('http://www.packtpub.com/learning-ext-js/book');
  $packt_page_xpath = return_xpath_obj($packt_page);

  echo '<pre>'; var_dump($pack_page_xpath); echo '</pre>'; // debug

?>
