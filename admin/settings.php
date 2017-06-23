<?php
include("../config.php");
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
      <div class="title is-2">Settings</div>

      <div class="columns">
        <div class="column is-4">
          <aside class="menu">
            <ul class="menu-list">
              <li><a><i class="fa fa-cog"></i> General</a></li>
              <li><a><i class="fa fa-shield"></i> Security</a></li>
            </ul>
          </aside>
        </div>
        <div class="column is-8">
          <div class="title is-3">General System Settings</div>

          <div class="field">
            <div class="msg"></div>
          </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Voting Lines</label>
              </div>
              
              <div class="field-body">
                <div class="field">
                  <a href="javascript:void(0)" class="button is-primary" id="btnResetVotes"><i class="fa fa-refresh fa-fx"></i>&nbsp;Reset Votes</a>
                </div>
              </div>
              
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Voting Status</label>
              </div>
              
              <div class="field-body">
                <div class="field">
                  <div class="field has-addons">
                    <p class="control">
                      <a class="button is-primary">
                        <span class="icon is-small">
                          <i class="fa fa-circle"></i>
                        </span>
                        <span>Open</span>
                      </a>
                    </p>
                    <p class="control">
                      <a class="button">
                        <span class="icon is-small">
                          <i class="fa fa-circle-o"></i>
                        </span>
                        <span>Close</span>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              
            </div>

        </div>
      </div>
      
    </div>

  </div>

  <?php
    include("footer.php");
  ?>
  
  <?php
    include("foot-link.php");
  ?>

  <script>
    $(function(){


      $("#btnResetVotes").click(function(){
        $(this).addClass("is-loading");
        $.get("action/settings.php",{
          action: "reset_votes"
        },function(response){
          if(response.trim()=="ok"){
            $("#btnResetVotes").removeClass("is-loading");
            $(".msg").append('\
              <div class="notification is-success">\
                <button class="delete deleteNotif"></button>\
                Voting line has been refreshed.\
              </div>\
              ');
          }else{
            console.log(response);
          }
        });

      });

      $(document).on('click', '.deleteNotif', function(){
        $('.deleteNotif').closest('.notification').remove();
      });

    });
  </script>

</body>
</html>