<?php

  // dev tools - checks is there is no duplicated urls or page ids
  function localTestDuplicates($pages_map) {

    foreach ($pages_map as $pageKey => $pageValue) {
      $uniquePageURL[] = $pageValue['page_url'];
      $uniquePageId[] = $pageValue['page_id'];
    }

    $pathInPieces = explode('/', $_SERVER['HTTP_HOST']);
    
    $check_duplicated = count(array_unique($uniquePageId)); 
    if ($check_duplicated < count($uniquePageId)) {
      echo '<h1>Page ID duplicated!</h1>';
      print_r($uniquePageId); }

    $check_duplicated = count(array_unique($uniquePageURL)); 
    if ($check_duplicated < count($uniquePageURL)) {
      echo '<h1>Page URL duplicated!</h1>';
      print_r($uniquePageURL); }
    
  }
?>
