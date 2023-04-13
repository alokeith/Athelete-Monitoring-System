<script type="">
  

    $.ajax({
      type: 'POST',
      url: 'php/parser.php',
      data: ,
      dataType: 'JSON',
      beforeSend: function() {

      },
      error: function(jqXHR, status, err) {

        $('#err-msg').html("There's a problem parsing your request! Please seek assistance.");
        //$('#add-training-stat').html("<div class='alert alert-danger' role='alert'><b class='text-danger'>Error 101 occured! Please consult the ICT.</b></div>");
      },
      success: function(data) {

      }
    });
     return false;


</script>