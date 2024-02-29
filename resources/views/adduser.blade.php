<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.nav')
<div class="container">
  <h2>Add user </h2>
  <form action="{{ route('storesuser')}}" method = "POST">
    @csrf
    <div class="form-group">
      <label for="name">Name: </label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value= "{{ old ('name')}}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  value= "{{ old ('email')}}">
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"  value= "{{ old ('password')}}">
    </div>
    <div class="form-group">
      <label for="fitness_goals">Fitness Goals:</label>
      <input type="fitness_goals" class="form-control" id="fitness_goals" placeholder="Enter fitness goals" name="fitness_goals"  value= "{{ old ('fitness_goals')}}">
    </div>


    <button type="submit" class="btn btn-default">Insert</button>
  </form>
</div>

</body>
</html>