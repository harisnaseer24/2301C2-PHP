$(document).ready(function () {
    tablebody = $("#tab");
    function getTrashdata(){
      $.ajax({
        method: "POST",
        url: "fetchTrash.php",
        success: function (data) {
          tablebody.html(data);
        },
      });
    }
    getTrashdata();
  //restore
  $('tbody').on('click',' .restorebtn', function(){
   let userid=$(this).attr('data-id');
    // console.log(userid);
    // alert(userid);
    $.ajax({
      method: "POST",
      url: "restore.php",
      data: {
        userid: userid
      },
      success: function (data) {
        alert(data);
        getTrashdata();
      },
    });
  });
  //permanent Delete
  $('tbody').on('click',' .deletebtn', function(){
   let userid=$(this).attr('data-id');
    // console.log(userid);
    // alert(userid);
    $.ajax({
      method: "POST",
      url: "permanentdelete.php",
      data: {
        userid: userid
      },
      success: function (data) {
        alert(data);
        getTrashdata();
      },
    });
  });
  

  
  });
  