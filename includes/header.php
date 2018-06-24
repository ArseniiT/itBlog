<header id="header">
  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1><?php echo $config['title']; ?></h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="./pages/about_me.php">About me</a></li>
          <li><a href="<? echo $config['fb_url']?>" target='_blank'>I'm in facebook</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <?  
    $categories = mysqli_query($connection, "SELECT * FROM articles_categories");
    
  ?>
  <div class="header__bottom">
    <div class="container">
      <nav>
        <ul>
            <?
            while ($cat = mysqli_fetch_assoc($categories)){ 
              ?>
              <li><a href="/categorie.php?id=<? echo $cat['id']; ?>"><? echo $cat['title']; ?></a></li>
              <?
            }
            ?>
        </ul>
      </nav>
    </div>
  </div>
</header>