<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>User Data</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody id="data">
      
    </tbody>
  </table>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script>
$( document ).ready(function() {
    user_data();
});
function user_data() {
  $.ajax({
         type:'POST',
         url:'user_data',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success:function(data){
            $.each(data, function(index, value){
                // alert(value['name']);
                $("#data").append("<tr> \
                    <td>"+value.name+"</td> \
                    <td>"+value.email+"</td> \
                    <td>"+value.phone+"</td> \
                </tr>");
            })
         }
      });
   
  };
</script>
</html>