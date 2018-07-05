<?php
  require '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IT Blog</title>

  <!-- jQuery -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script>
    function functionBefore(){      
      $("input[name='name']").val('');
      $("input[name='nickname']").val('');
      $("input[name='email']").val('');
      $("textarea[name='text']").val('');
    }

    function functionSuccess(data){
      $(".comments").append(data);
      $("#new__comment").fadeIn('slow');
      $("#new__comment").removeAttr("style");
      $("#new__comment").removeAttr("id");
    }

    $(document).ready(function(){
      $("#done").click( function() {
        var name = $("input[name='name']").val(); 
        var nickname = $("input[name='nickname']").val(); 
        var email = $("input[name='email']").val(); 
        var text = $("textarea[name='text']").val();
        var articleId = $("input[name='id']").val();

        console.log(name + ' | ' + nickname + ' | ' + email + ' | ' + text + ' | ' + articleId);

        $.ajax({
          url: "../includes/commentAdder.php",
          type: "POST",
          data: ({name: name, nickname: nickname, email: email, text: text, id: articleId}),
          dataType: "html",
          beforeSend: functionBefore,
          success: functionSuccess
        });
      });
    });
  </script>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include '../includes/header.php'; ?>

    <?php 
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
            <?php include '../includes/sidebar.php'; ?>
          </section>
        </div>
      </div>
    </div>
        <?php
      } else {
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int)$_GET['id']); 
        ?>          
          <div id="content">
            <div class="container">
              <div class="row">
                <section class="content__left col-md-8">
                  <div class="block">
                    <a><?php echo $art['views'] ?> views</a>
                    <h3><?php echo $art['title'] ?></h3>
                    <div class="block__content">
                      <img src="../static/images/<?php echo $art['image'] ?>">

                      <div class="full-text">
                        <?php echo $art['text'] ?>
                      </div>
                    </div>
                  </div>

                  
                  <div class="block">
                    <a href="#comment-add-form">Add comment</a>
                    <h3>Comments</h3>
                    <div class="block__content">
                      <div class="articles articles__vertical comments">
                      <?php  
                        $comments = mysqli_query($connection, "SELECT * FROM comments WHERE `articles_id` = " . (int)$art['id'] . " ORDER BY `pubdate`");   
                        
                        if( mysqli_num_rows($comments) <= 0 ) {
                          echo 'You can write the first comment.';
                        }

                        while ($comment = mysqli_fetch_assoc($comments)) {
                      ?> 
                        <article class="article">       
                          <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php 
                          echo md5($comment['email']); ?>?s=125);"></div>
                          <div class="article__info">
                            <a href="pages/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author']; ?></a>         
                            <div class="article__info__meta"></div> 
                            <div class="article__info__preview"><?php echo $comment['text'] ?></div>
                          </div>
                        </article>
                      <?php
                      }
                      ?>                     

                      </div>
                    </div>
                  </div>

                  <div id = "comment-add-form" class="block">
                    <h3>Add comment</h3>
                    <div class="block__content">
                      <form class="form" method="POST" action="/article.php?id=<?php echo $art['id']; ?>#comment-add-form">

                        <div class="form__group">
                          <div class="row">
                            <div class="col-md-4">
                              <input type="text" name="name" class="form__control" placeholder="Name" value="<?php 
                              echo $_POST['name'];?>">
                              <input type="hidden" name="id" value="<?php 
                              echo $art['id'];?>">
                            </div>
                            <div class="col-md-4">
                              <input type="text" name="nickname" class="form__control" placeholder="Nickname" value="<?php 
                              echo $_POST['nickname'];?>">
                            </div>
                            <div class="col-md-4">
                              <input type="email" name="email" class="form__control" placeholder="Email (will not be shown)" value="<?php 
                              echo $_POST['email'];?>">
                            </div>
                          </div>
                        </div>
                        <div class="form_group">
                          <textarea name="text" class="form__control" placeholder="Сomment text ..." value=""><?php echo $_POST['text']; ?></textarea>
                        </div>
                        <div class="form__group">
                          <input type="button" id="done" value="Add comment" class="form__control">
                        </div>
                      </form>
                    </div>
                  </div>

                </section>
                <section class="content__right col-md-4">
                  <?php include '../includes/sidebar.php'; ?>
                </section>
              </div>
            </div>
          </div>
        <?php
      }
    ?>

    <?php include '../includes/footer.php' ?>

  </div>

</body>
</html>