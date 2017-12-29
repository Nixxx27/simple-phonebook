<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nikko Zabala PhoneBook</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    </style>
    </head>
    <body>
    	<div class="container">
    		<div class="row" style="margin-top:20px">
    			<div class="col-md-12">
    				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
						<img src="{{url('images/phone-icon.png')}}" style="height:200px;width: auto;margin-left:80px">
						<hr>
						<h3 style="text-align:center"><strong>NZ PHONE BOOK</strong></h3>
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon" style="color:#E5B438;background-color:#253B4B;border:2px solid #253B4B">
								<i class="fa fa-user"  aria-hidden="true"></i>
								</span> 
								<input class="form-control" placeholder="email" name="email" type="text" autofocus>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon" style="color:#E5B438;background-color:#253B4B;border:2px solid #253B4B">
								<i class="fa fa-lock" aria-hidden="true"></i>
												</span>
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
						</div>
										
						<div class="form-group">
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
							Don't have an account! <a href="{{ route('register') }}" onClick=""> Sign Up Here </a>
							<br>
						</div>
						
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
</html>
