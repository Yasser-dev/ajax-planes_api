$(function () {
  $("#insertform").submit(function (event) {
    event.preventDefault();

    //use this technique for ajax data if not using RESTFul
    //NOTE: this will capture name attribute in not id in html form
    var formData = $(this).serialize();
    console.log(formData);

    //*
    $.ajax({
      type: "post",
      url: "../api/insertplane.php",
      data: formData,
      dataType: "json",
      success: function (data) {
        if (data.insertStatus) {
          alert("plane insertion successful");
        } else {
          alert(
            "plane insertion failed - please try again: " + data.errorMessage
          );
        }
      },
      error: function () {
        console.log("error");
      },
    });
    //*/
  });
});
