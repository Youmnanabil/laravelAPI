<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')
<div class="container">
  <h2>users list</h2>
  <p>the table shows cars in database on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Fitness Goals</th>
        <th>Eidt</th>
      </tr>
    </thead>
    <tbody>
    @foreach($user as $row)
      <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->fitness}}</td>
        <td><a href=" edituser/{{$row->id}}">Edit</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
