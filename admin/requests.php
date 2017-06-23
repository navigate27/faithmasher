<?php
include("../config.php");

session_start();
if(!$_SESSION){
  header("location: login.php");
}

include("timeago.php");

?>
<!DOCTYPE html>
<html>
<head>
  
  <?php
    include("meta.php");
  ?>
  <title>faithMASH - Admin</title>
  <?php
    include("head-link.php");
  ?>
</head>
<body>

  <?php
    include("top-nav.php");
  ?>
  <div class="columns">
    <?php
      include("side-menu.php");
    ?>

    <div class="content column is-10">
      <div class="title is-2">Dashboard</div>

      <div class="msg"></div>

      <div class="nav menu">
        <div class="container">
          <div class="nav-left is-hidden-mobile">
            <a href="index.php" class="nav-item is-tab"> All</a>
            <a href="requests.php" class="nav-item is-tab is-active"> Requests</a>
            <a class="nav-item is-tab"><i class="fa fa-fire fa-fw"></i> HOT</a>
            <div class="nav-item" id="select-counter">
              <strong>0 items selected</strong>
            </div>
          </div>

          <div class="nav-right">
            <a class="nav-item" id="confirm">
              <span class="icon-btn">
                <i class="fa fa-check"></i>
              </span>
            </a>
            <a class="nav-item is-primary" id="cancel">
              <span class="icon-btn">
                <i class="fa fa-ban"></i>
              </span>
            </a>
            <a class="nav-item is-primary" id="delete">
              <span class="icon-btn">
                <i class="fa fa-times"></i>
              </span>
            </a>
            
            <a class="nav-item" id="btnDeleteMode">
              <span class="icon-btn">
                <i class="fa fa-thumbs-o-up"></i>
              </span>
            </a>
          </div>
          
        </div>
      </div>

      <div class="columns files">
      
      <?php

        $query = $conn->query(" SELECT * FROM `items` WHERE allow = 0 ORDER BY date_added DESC");
        if($query->num_rows!=0){
          while($rows=$query->fetch_assoc()){

          if( strtotime($rows['date_added']) > strtotime('-7 day') ) {
              $newtag = "<span class='tag is-danger'>New</span>";
          }else{
              $newtag = "";
          }

      ?>

      <div class="column is-3">
        <a class="file" data-id="<?php echo $rows['item_id']; ?>" data-img="<?php echo $rows['img']; ?>">
          <div class="">
            <img src="../img/<?php echo $rows['img']; ?>" class="image is-128x128">
          </div>
          <div class="name"><?php echo $rows['realname']; ?></div>
          <div class="timestamp"><?php echo timeAgo($rows['date_added']); ?></div>
          <div class="subtitle is-5"> <?php echo $newtag; ?></div>
        </a>
      </div>

      <?php
          }
        }

      ?>

      </div>
    </div>
  </div>

  <?php
    include("footer.php");
  ?>

  <?php
    include("foot-link.php");
  ?>

  <script src="js/requests.js"></script>
</body>
</html>