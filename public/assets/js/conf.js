$(document).ready(function(){

  var nowTemp = new Date();
  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
   
  var checkin = $('#check-in').datepicker({
    onRender: function(date) {
      return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
      var newDate = new Date(ev.date)
      newDate.setDate(newDate.getDate() + 1);
      checkout.setValue(newDate);
    }
    checkin.hide();
    $('#check-out')[0].focus();
  }).data('datepicker');
  var checkout = $('#check-out').datepicker({
    onRender: function(date) {
      return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
  }).on('changeDate', function(ev) {
    checkout.hide();
  }).data('datepicker');


  $("#check-in, #check-out").next().on("click", function(){
    $(this).prev().datepicker('show');
    return false;
  });

  $("#occupancy-text").on("focus", function(){
    $("#occupancy-number").toggle();
    $("#adult").focus();
    return false;
  });
  $("#occupancy-places .input-group-addon").on("click", function(){
    $("#occupancy-number").toggle();
    $("#adult").focus();
    return false;
  });

  $("#occupancy-save").on("click", function(){
    var adult = parseInt($("#adult").val());
    var children = parseInt($("#children").val());

    if(adult < 0)
      adult = adult * (-1);
    if(children < 0)
      children = children * (-1);

    var occupancy = adult + children;

    console.log(occupancy);

    $("#occupancy").val(occupancy);
    $("#occupancy-text").val(adult + " adult " + children + " children");

    $("#occupancy-number").toggle();

    return false;
  });


  $("#reservationform").on("submit", function(){
    if( ($("#check-in").val() == "") || ($("#check-out").val() == "") || ($("#occupancy-text").val() == "") ){
      return false;
    }
  });

  $('#check-availability').on('click', function(e){
    e.preventDefault();
    $('#booking-failed, #booking-result, #booking-detail').fadeOut(300);

    $.ajax({
        type : "GET",
        url : BASE_URL + "/availability",
        data : {'villa_id': $("#villa_id").val(), 'start_dt': $("#check-in").val(), 'end_dt': $("#check-out").val()},
        beforeSend : function() {
          // show progress
        },
        success : function(response) {
          var response = JSON.parse(response);

          if(!response.availability)
            $("#booking-failed").fadeIn(300);
          else {
            $("#total-nights").html(response.days);
            $("#booking-result").fadeIn(300);

            $("#room-type-list").html("");

            $.each(response.available_room_types, function(i, row){
              var checked = '';
              if(i == 0)
                checked = " checked='checked' ";
              var row = "<div class='row'>" +
                    "<div class='col-sm-12 short_name'>" + row.short_name + "</div>" +
                    "<div class='col-sm-8'>" +
                      "<input " + checked + " type='radio' name='room_info' value='" + JSON.stringify(row) + "'> " + row.name + " (occupancy " + row.max_occupancy + " person)" +
                    "</div>" +
                    "<div class='col-sm-4'>" + response.currency + " " + row.total_price_view +"</div>" +
                  "</div>";

              $("#room-type-list").append(row);
            });

            $("#booking-result, #booking-detail").fadeIn(300);
          }
        }
    });

    e.preventDefault();
  });

  $("#create-reservation").validate();
  $("#subscribe").validate();

  $('#subscribe').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      type : "POST",
      url : BASE_URL + "/join-the-club",
      data : $(this).serialize(),
      beforeSend : function() {
        $(".alert-success").fadeOut();
      },
      success : function(response) {
        var data = JSON.parse(response);

        $(".alert-success").html(data.message);
        $(".alert-success").fadeIn(300);

      }
    });
  });


});