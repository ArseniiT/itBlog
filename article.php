<?php
  require 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IT Blog</title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include 'includes/header.php'; ?>

    <? 
      $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int)$_GET['id']);

      if( mysqli_num_rows($article) <=0 ) {
        ?>
          <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>The article don't found</h3>
              <div class="block__content">
                <div class="full-text">
                Requested article no longer exists.
                </div>
              </div>
            </div>

            
          </section>
          <section class="content__right col-md-4">
            <?php include 'includes/sidebar.php'; ?>
          </section>
        </div>
      </div>
    </div>
        <?
      } else {
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int)$_GET['id']); 
        ?>          
          <div id="content">
            <div class="container">
              <div class="row">
                <section class="content__left col-md-8">
                  <div class="block">
                    <a><? echo $art['views'] ?> views</a>
                    <h3><? echo $art['title'] ?></h3>
                    <div class="block__content">
                      <img src="static/images/<? echo $art['image'] ?>">

                      <div class="full-text">
                        <? echo $art['text'] ?>
                      </div>
                    </div>
                  </div>

                  
                  <div class="block">
                    <a href="#comment-add-form">Add comment</a>
                    <h3>Comments</h3>
                    <div class="block__content">
                      <div class="articles articles__vertical">
                      <?  
                        $comments = mysqli_query($connection, "SELECT * FROM comments WHERE `articles_id` = " . (int)$art['id'] . " ORDER BY `pubdate` DESC");   
                        
                        if( mysqli_num_rows($comments) <= 0 ) {
                          echo 'You can write the first comment.';
                        }

                        while ($comment = mysqli_fetch_assoc($comments)) {
                      ?> 
                        <article class="article">                        
                          <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<? 
                          echo md5($comment['email']); ?>?s=125);"></div>
                          <div class="article__info">
                            <a href="./article.php?id=<? echo $comment['articles_id']; ?>"><? echo $comment['author']; ?></a>         
                            <div class="article__info__meta"></div> 
                            <div class="article__info__preview"><? echo $comment['text'] ?></div>
                          </div>
                        </article>
                      <?
                      }
                      ?>                     

                      </div>
                    </div>
                  </div>

                  <div id = "comment-add-form" class="block">
                    <h3>Add comment</h3>
                    <div class="block__content">
                      <form class="form" method="POST" action="/article.php?id=<? echo $art['id']; ?>#comment-add-form">

                        <?  
                          if( isset($_POST['do_post']) ) {
                            $errors = array();

                            if( $_POST['name'] == '' ) {
                              $errors[] = 'Type your name!';
                            }
                            
                            if( $_POST['nickname'] == '' ) {
                              $errors[] = 'Type your nickname!';
                            }
                            if( $_POST['email'] == '' ) {
                              $errors[] = 'Type your email!';
                            }
                            if( $_POST['text'] == '' ) {
                              $errors[] = 'Type your comment text!';
                            }

                            if( empty($errors) ) { // add comment
                              
                              // secure INSERT
                              $name = mysqli_real_escape_string($connection, $_POST['name']);
                              $nickname = mysqli_real_escape_string($connection, $_POST['nickname']);
                              $email = mysqli_real_escape_string($connection, $_POST['email']);
                              $text = mysqli_real_escape_string($connection, $_POST['text']);

                              mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('" . $name . "', '" . $nickname . "', '" . $email . "', '" . $text . "', NOW(), '" . (int)$art['id'] . "')"); 

                              echo '<span style="color: green; font-weight: bold; margin-bottom:10px">Thank you for your comment.</span>';
                            } else { // print error
                              echo '<span style="color: red; font-weight: bold; margin-bottom:10px">' . $errors[0] . '</span>';
                            }

                          }
                        ?>

                        <div class="form__group">
                          <div class="row">
                            <div class="col-md-4">
                              <input type="text" name="name" class="form__control" placeholder="Name" value="<? 
                              echo $_POST['name'];?>">
                            </div>
                            <div class="col-md-4">
                              <input type="text" name="nickname" class="form__control" placeholder="Nickname" value="<? 
                              echo $_POST['nickname'];?>">
                            </div>
                            <div class="col-md-4">
                              <input type="email" name="email" class="form__control" placeholder="Email (will not be shown)" value="<? 
                              echo $_POST['email'];?>">
                            </div>
                          </div>
                        </div>
                        <div class="form_group">
                          <textarea name="text" class="form__control" placeholder="Сomment text ...">
                          <? echo $_POST['text']; ?>
                          </textarea>
                        </div>
                        <div class="form__group">
                          <input type="submit" name="do_post" value="Add comment" class="form__control">
                        </div>
                      </form>
                    </div>
                  </div>

                </section>
                <section class="content__right col-md-4">
                  <?php include 'includes/sidebar.php'; ?>
                </section>
              </div>
            </div>
          </div>
        <?
      }
    ?>

    <? include 'includes/footer.php' ?>

  </div>

</body>
</html>