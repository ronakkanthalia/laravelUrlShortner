<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>URL Shortner Test</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <!-- Custom css -->
	 <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/style.css') }}">
  </head>
  <body>
  	<div class="container">
  		<h1 class="title text-center page-header">URL Shortner Test</h1>
  		<hr />
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-block">
          <h4 class="card-title">Just type in Long URL</h4>
          <p class="card-text">You will get a short url.</p>
          <form onsubmit="return false;">
            <span id="error" class="alert-danger"></span>
            <div class="form-group">
              <input type="url" class="form-control" placeholder="Enter Long URL here" name="url" id="url" required />
              <!-- <a href="#" class="btn btn-primary" id="submit">Get short URL</a> -->
            </div>
            <button type="submit" class="btn btn-primary pull-right" id="submit">Get short URL</button>
          </form>
          <p id="shortUrl"></p>
        </div>
      </div>
  	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>
  </body>
</html>
