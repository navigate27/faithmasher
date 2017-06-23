$(document).ready(function(){
  var selectedData = [];
  var deleteMode = false;
  $("#confirm").hide(100);
  $("#cancel").hide(100);
  $("#select-counter").hide(100);
  

  $(document).on('click','.file',function(){
    if(deleteMode){
      if($(this).hasClass('active')){
        $(this).removeClass('active');
      }else{
        $(this).addClass('active');
      }
      getSelected();
      updateSelectCountDOM();
      console.log(selectedData);
    }else{
      alert("gotoURL");
    }
  });

  $("#btnDeleteMode").click(function(){
    if(deleteMode){
      cancelDeleteMode();
    }else{
      deleteMode = true;
      $("#confirm").fadeIn(100);
      $("#cancel").fadeIn(100);
      $(this).addClass('is-tab').addClass('is-active');
      $("#select-counter").fadeIn(100);
    }
  });

  $("#cancel").click(function(){
    cancelDeleteMode();
  });

  function getSelected(){
    selectedData = [];
    var elem = $(".file.active");
    $.each(elem, function(key, val){
      var id = $(this).data('id');
      var img = $(this).data('img');

      var data = {
        id: id,
        img: img
      }
      selectedData.push(data);
    });

  }

  function cancelDeleteMode(){
    deleteMode = false;
    $('.file').removeClass('active');
    $("#confirm").fadeOut(100);
    $("#cancel").fadeOut(100);
    $('#btnDeleteMode').removeClass('is-tab').removeClass('is-active');
    $("#select-counter").fadeOut(100);
    selectedData = [];
    updateSelectCountDOM();
  }

  function updateSelectCountDOM(){
    $("#select-counter strong").text(selectedData.length+" items selected");
  }

  $("#confirm").click(function(){
    if(selectedData.length!=0){

      $.get("action/delete.php",{
        action: "delete_items",
        data: selectedData
      },function(response){
        if(response.trim()=="ok"){

          $(".file.active").closest('.column').remove();
          $('.deleteNotif').closest('.notification').remove();
          refreshAll();
          $(".msg").append('\
            <div class="notification is-success">\
              <button class="delete deleteNotif"></button>\
              Hot Chicks Deleted!\
            </div>\
            ');

        }else{
          $('.deleteNotif').closest('.notification').remove();
          $(".msg").append('\
            <div class="notification is-danger">\
              <button class="delete deleteNotif"></button>\
              Error deleting chicks!\
            </div>\
            ');
        }
      });

    }else{
        $('.deleteNotif').closest('.notification').remove();
        $(".msg").append('\
          <div class="notification is-danger">\
            <button class="delete deleteNotif"></button>\
            Please select at least one chick.\
          </div>\
          ');
      }
  });

  $(document).on('click', '.deleteNotif', function(){
    $('.deleteNotif').closest('.notification').remove();
  });

  function refreshAll(){
    $('.deleteNotif').closest('.notification').remove();
    cancelDeleteMode();
    selectedData = [];
  }


});