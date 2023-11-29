$(document).ready(function () {
  form = $("#form");
  tablebody = $("#tab");
  id = $("#id");
  uname = $("#uname");
  pass = $("#pass");
  email = $("#email");
  btn = $("#btn");

  function getdata() {
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
});
