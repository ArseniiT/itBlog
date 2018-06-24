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
              <a href="#">All articles</a>
              <h3>New in our blog</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?  
                    $articles = mysqli_query($connection, "SELECT * FROM articles");
                  ?>
                    
                  <?
                  while ($art = mysqli_fetch_assoc($articles)) {
                    ?> 
                      <article class="article">
                        
                        <div class="article__image" style="background-image: url(./static/images/<? echo $art['image']; ?>);"></div>
                        <div class="article__info">
                          <a href="./article.php?id=<? echo $art['id']; ?>"><? $art['title']; ?></a>
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
                            <small>Category: <a href="/categorie.php?id=<? echo $art_cat['id']; ?>"><? echo $art_cat['title']; ?></a></small>
                          </div>
                          <div class="article__info__preview"><? echo mb_substr($art['text'], 0, 50, 'utf-8') ?></div>
                        </div>
                      </article>
                    <?
                  }
                  ?>
                  

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #2</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #3</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #4</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="#">All articles</a>
              <h3>Security [New]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article name #2</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #3</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #4</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="#">All articles</a>
              <h3>Programming [New]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #2</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article nam #3</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Article name #4</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
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

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Article name</a>
                      <div class="article__info__meta">
                        <small>Category: <a href="#">Programming</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>

            <div class="block">
              <h3>Сommentaires</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Jonny Flame</a>
                      <div class="article__info__meta">
                        <small><a href="#">Article name #1</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur hic deleniti alias id eos ratione...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Jonny Flame</a>
                      <div class="article__info__meta">
                        <small><a href="#">Article name #1</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur hic deleniti alias id eos ratione...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Jonny Flame</a>
                      <div class="article__info__meta">
                        <small><a href="#">Article name #1</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur hic deleniti alias id eos ratione...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Jonny Flame</a>
                      <div class="article__info__meta">
                        <small><a href="#">Article name #1</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur hic deleniti alias id eos ratione...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(./media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Jonny Flame</a>
                      <div class="article__info__meta">
                        <small><a href="#">Article name #1</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur hic deleniti alias id eos ratione...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

    <footer id="footer">
      <div class="container">
        <div class="footer__logo">
          <h1><?php echo $config['title']; ?></h1>
        </div>
        <nav class="footer__menu">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About me</a></li>
            <li><a href="#">My facebook</a></li>
            <li><a href="#">Copyrights</a></li>
          </ul>
        </nav>
      </div>
    </footer>

  </div>

</body>
</html>