<?php

  // TODO: Automate checking unique values in deploy tests
  // required: page_method, page_url, page_source

  $pages_map = [
    [
      'page_id' => 'home', // friendly page id - must be unique!
      'page_method' => 'GET', // GET, POST
      'page_url' => '/', // page
      'page_source' => 'pages/home-page.php', // page URL - must be unique!
    ],
    [
      'page_id' => 'test',
      'page_method' => 'GET',
      'page_url' => '/test-page',
      'page_source' => 'pages/test-page.php'
    ]
  ];

?>
