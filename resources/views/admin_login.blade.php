<!DOCTYPE html>
<html>
<head>
	<title>Admin SIKSM KNIU</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	  
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/admin/loginPost') }}" method="POST">
                        	@csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="username" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <button class="btn btn-primary">login</button><br>
                            <sub><a href="{{ url('/') }}">Back to homepage</a></sub>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>