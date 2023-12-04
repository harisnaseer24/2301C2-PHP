$(document).ready(function () {

  form = $("#form");
  tablebody = $("#tab");
  id = $("#id");
  uname = $("#uname");
  pass = $("#pass");
  email = $("#email");
  btn = $("#btn");

  function getdata(){

    $.ajax({
      method: "POST",
      url: "fetch.php",
      success: function (data) {
        tablebody.html(data);
      },
    });
  }
  getdata();

  btn.on("click", function (e) {
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: "insert.php",
      data: {
        id: id.val(),
        uname: uname.val(),
        email: email.val(),
        pass: pass.val()
      },
      success: function (data) {
        alert(data);
        form.trigger('reset');
        getdata();
      },
    });
  });



//trash
$('tbody').on('click',' .deletebtn', function(){
 let userid=$(this).attr('data-id');
  console.log(userid);
  $.ajax({
    method: "POST",
    url: "delete.php",
    data: {
      userid: userid
    },
    success: function (data) {
      alert(data);
      getdata();
    },
  });
});

//update
$('tbody').on('click',' .updatebtn', function(){
  let userid=$(this).attr('data-id');
  
   $.ajax({
     method: "POST",
     url: "update.php",
     data: {
       userid: userid  
     },
     success: function (data) {
       let record=JSON.parse(data);
       console.log(record.name)
       id.val(record.id)
       uname.val(record.name)
       email.val(record.email)
       pass.val(record.password)
     
     },
   });
 });

});
