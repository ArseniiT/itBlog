<?php
  require './includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="./media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="./media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <? include './includes/header.php'; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/articles.php ">All articles</a>
              <h3>New in our blog</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                  <?  
                    $articles = mysqli_query($connection, "SELECT * FROM articles ORDER BY `id` LIMIT 10");                  
                    while ($art = mysqli_fetch_assoc($articles)) {
                  ?> 
                      <article class="article">                        
                        <div class="article__image" style="background-image: url(./static/images/<? echo $art['image']; ?>);"></div>
                        <div class="article__info">
                          <a href="./article.php?id=<? echo $art['id']; ?>"><? echo $art['title']; ?></a>
                          <div class="article__info__meta">
                            <? 
                              $art_cat = false;
                              foreach ($categories as $cat) {
                                if( $cat['id'] == $art['categories_id'] ) {
                                  $art_cat = $cat;
                                  break;
                                }
                              }
                            ?>
                            <small>Category: <a href="/articles.php?categorie=<? echo $art_cat['id']; ?>"><? echo $art_cat['title']; ?></a></small>
                          </div>
                          <div class="article__info__preview"><? echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...' ?></div>
                        </div>
                      </article>
                    <?
                  }
                  ?>     

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?categories=7">All articles</a>
              <h3>Security [New]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                  <?  
                    $articles = mysqli_query($connection, "SELECT * FROM articles  WHERE `categorie_id` = 6 ORDER BY `id` LIMIT 10");                  
                    while ($art = mysqli_fetch_assoc($articles)) {
                  ?> 
                      <article class="article">                        
                        <div class="article__image" style="background-image: url(./static/images/<? echo $art['image']; ?>);"></div>
                        <div class="article__info">
                          <a href="./article.php?id=<? echo $art['id']; ?>"><? echo $art['title']; ?></a>
                          <div class="article__info__meta">
                            <? 
                              $art_cat = false;
                              foreach ($categories as $cat) {
                                if( $cat['id'] == $art['categories_id'] ) {
                                  $art_cat = $cat;
                                  break;
                                }
                              }
                            ?>
                            <small>Category: <a href="/articles.php?categorie=<? echo $art_cat['id']; ?>"><? echo $art_cat['title']; ?></a></small>
                          </div>
                          <div class="article__info__preview"><? echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...' ?></div>
                        </div>
                      </article>
                    <?
                  }
                  ?>     
                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?categories=1">All articles</a>
              <h3>Programming [New]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?  
                    $articles = mysqli_query($connection, "SELECT * FROM articles  WHERE `categorie_id` = 1 ORDER BY `id` LIMIT 10");                  
                    while ($art = mysqli_fetch_assoc($articles)) {
                  ?> 
                      <article class="article">                        
                        <div class="article__image" style="background-image: url(./static/images/<? echo $art['image']; ?>);"></div>
                        <div class="article__info">
                          <a href="./article.php?id=<? echo $art['id']; ?>"><? echo $art['title']; ?></a>
                          <div class="article__info__meta">
                            <? 
                              $art_cat = false;
                              foreach ($categories as $cat) {
                                if( $cat['id'] == $art['categories_id'] ) {
                                  $art_cat = $cat;
                                  break;
                                }
                              }
                            ?>
                            <small>Category: <a href="/articles.php?categorie=<? echo $art_cat['id']; ?>"><? echo $art_cat['title']; ?></a></small>
                          </div>
                          <div class="article__info__preview"><? echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...' ?></div>
                        </div>
                      </article>
                    <?
                  }
                  ?> 

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <? include 'includes/sidebar.php' ?>
          </section>
        </div>
      </div>
    </div>

    <? include 'includes/footer.php' ?>

  </div>

</body>
</html>