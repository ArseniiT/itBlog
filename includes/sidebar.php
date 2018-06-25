<div class="block">
  <h3>We know</h3>
  <div class="block__content">
    <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
  </div>
</div>

<div class="block">
  <h3>Popular articles</h3>
  <div class="block__content">
    <div class="articles articles__vertical">

      <?  
      $articles = mysqli_query($connection, "SELECT * FROM articles ORDER BY `views` DESC LIMIT 5");                  
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
  <h3>Comments</h3>
  <div class="block__content">
    <div class="articles articles__vertical">
    <?  
      $comments = mysqli_query($connection, "SELECT * FROM comments ORDER BY `id` LIMIT 5");                  
      while ($comment = mysqli_fetch_assoc($comments)) {
    ?> 
      <article class="article">                        
        <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<? 
        echo md5($comment['email']); ?>?s=125);"></div>
        <div class="article__info">
          <a href="./article.php?id=<? echo $comment['articles_id']; ?>"><? echo $comment['author']; ?></a>         
          <div class="article__info__meta"></div> 
          <div class="article__info__preview"><? echo mb_substr(strip_tags($comment['text']), 0, 100, 'utf-8') . ' ...' ?></div>
        </div>
      </article>
    <?
    }
    ?>
    

    </div>
  </div>
</div>