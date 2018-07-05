<?php
  require_once './includes/phpQuery.php';
  require './includes/config.php';

  $HomePageHtml = file_get_contents( 'https://www.itworldcanada.com/news' );

  phpQuery::newDocument($HomePageHtml);

  $articleUrl = pq( '.feature-story a' )->attr('href');

  $articleHtml  = file_get_contents( $articleUrl );

  phpQuery::newDocument($articleHtml);

  $articleImageUrl = pq( '.mainfeature .row a img' )->attr('src');
  $articleTitle = pq( '.article-title a' )->html();
  $articleText = pq( '.entry-content p' )->html();
  $articleCategory = 6;
  

  echo( $articleText);

  phpQuery::unloadDocuments();



?>