$(function () {
  //PLANES CRUD - GET plane via id

  $.ajax({
    type: "get",
    url: "../api/getplaneviaid.php?planeid=1",
    dataType: "json",
    success: function (data) {
      $("#id").html(data.planeid);
      $("#planeid").html(data.planeid);
      $("#model").html(data.model);
      $("#manufacturer").html(data.manufacturer);
      $("#manufacturedAt").html(data.manufacturedAt);
      $("#trips").html(data.trips);
    },
    error: function (err) {
      console.log(err);
    },
  });
});
