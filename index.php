<?php

  require 'config.php';
  require 'lib/functions.php';

  header("Content-Type: text/html");
  include 'lib/AltoRouter.php'; //path to AltoRoute script
  $router = new AltoRouter();
  $router -> setBasePath($siteBasePath); // Setup the URL routing. This is production ready.

  // Routing examples
  // $router->map('GET','/', 'pages/home-page.php', 'home');
  // $router->map('GET','/test-page', 'pages/test-page.php', 'testPage');

  // Special (payments, ajax processing, etc)
  // $router->map('GET','/charge/[*:customer_id]/','charge.php','charge');
  // $router->map('GET','/pay/[*:status]/','payment_results.php','payment-results');
  
  // API Routes
  // $router->map('GET','/api/[*:key]/[*:name]/', 'json.php', 'api');

  // Gets pages map 
  require 'pages.php';
  foreach ($pages_map as $pageKey => $pageValue) {
    $router -> map( $pageValue['page_method'], $pageValue['page_url'], $pageValue['page_source'], $pageKey);
  }

  // Test if not duplicated unique values in $pages_map, works on localhost only
  if ($devToolsActive) localTestDuplicates($pages_map);




  /* Match the current request */
  $match = $router->match();
  if($match) {
    require $match['target'];
  }
  else {
    header("HTTP/1.0 404 Not Found");
    require 'pages/404.html';
  }

?>
