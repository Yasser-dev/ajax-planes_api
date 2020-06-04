$(function () {
  //PLANES CRUD - DELETE plane via id

  $.ajax({
    type: "delete",
    url: "api/deleteplane.php?planeid=2",
    dataType: "json",
    success: function (data) {
      if (data.deleteStatus) {
        alert("Plane deletion successful");
      } else {
        alert("Plane deletion failed - please try again: " + data.error);
      }
    },
    error: function () {
      console.log("error");
    },
  });
});
