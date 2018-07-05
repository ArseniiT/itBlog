<?php
  function parse ($url, $startElement, $lastElement)  {
    $stringFromUrl = $url;
/* 
    echo $stringFromUrl;
    echo '<hr>'; */

    $startPosition = strpos($stringFromUrl, $startElement);

    if( $startPosition === false ) return 0;

    $cutBefore = substr($stringFromUrl, $startPosition);

    $cutAfter = substr($cutBefore, 0, strpos($cutBefore, $lastElement));

    return strip_tags($cutAfter); 
  }

  $String = strtolower( file_get_contents('https://www.kijiji.ca/'));


  echo parse($String,
  `<a class="popularLink-3343092799" rel=" noopener noreferrer" href="/b-free-stuff/ville-de-montreal/c17220001l1700281?price-type=free">`,
  `<svg `);
  

?>