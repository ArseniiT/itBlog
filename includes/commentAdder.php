<?php
  require 'config.php';

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
      $id = (int)$_POST['id']; 

      mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('" . $name . "', '" . $nickname . "', '" . $email . "', '" . $text . "', NOW(), '" . $id . "')"); 

      echo '<article class="article" id="new__comment" style="display:none"><div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/'.md5($email).'?s=125);"></div>
      <div class="article__info">
        <a href="./article.php?id='.$id.'">'.$name.'</a>       
        <div class="article__info__meta"></div> 
        <div class="article__info__preview">'.$text.'</div></article>';
    } else { // print error
      echo '<span style="color: red; font-weight: bold; margin-bottom:10px">' . $errors[0] . '</span>';
    }

?>