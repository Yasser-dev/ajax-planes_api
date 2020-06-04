$(function () {
  //PLANES CRUD - GET all planes

  $.ajax({
    type: "get",
    url: "api/getallplanes.php",
    dataType: "json",
    success: function (data) {
      var index = 0;

      for (var i in data) {
        index = parseInt(index) + 1;

        $("#planestb tbody").append(
          "<tr>" +
            "   <td>" +
            index +
            "</td>" +
            "   <td>" +
            data[i].model +
            "</td>" +
            "   <td>" +
            data[i].manufacturer +
            "</td>" +
            "   <td>" +
            data[i].manufacturedAt +
            "</td>" +
            "   <td>" +
            data[i].trips +
            "</td>" +
            "</tr>"
        );
      }
    },
    error: function () {
      console.log("error");
    },
  });
  //*/
});
