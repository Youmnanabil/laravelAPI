<!DOCTYPE html>
<html lang="en">
<head>
  <title>update User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')
<div class="container">
  <h2>Update user data</h2>
  <form action="{{route('updateuser', [$user->id])}} " method = "POST" >
    @csrf
    @method('put')
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
      <label for="fitness_goals">Fitness Goals:</label>
      <input type="text" class="form-control" id="fitness_goals" placeholder="Enter fitness goals" name="fitness_goals" value="{{$user->fitness_goals}}">
    </div>
    <div class="form-group">
        <label for="password">Password <span class="required">*</span></label>
        <input type="password" id="password" name="password" value="{{$user->password}}" required="required" class="form-control">
	</div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>