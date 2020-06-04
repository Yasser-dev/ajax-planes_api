//should get planes by id and put in form as form value
//to show original plane data or update

$("#updateform").submit(function (event) {
  event.preventDefault();

  //use this technique for ajax data if not using RESTFul
  //NOTE: this will capture name attribute not id
  var formData = $(this).serialize();
  console.log(formData);

  //*
  $.ajax({
    type: "post",
    url: "../api/updateplane.php?planeid=1",
    data: formData,
    dataType: "json",
    success: function (data) {
      if (data.updateStatus) {
        alert("plane update successful");
      } else {
        alert("plane update failed - please try again: " + data.errorMessage);
      }
    },
    error: function () {
      console.log("error");
    },
  });
  //*/
});
