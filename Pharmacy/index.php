<DOCTYPE html>
    <html>
        <head>
            <title> АПТЕКИ ВХОД </title>
            <meta charset="UTF-8">
            <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <style type="text/css">
  @import "bourbon";

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  m}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}argin-bottom: 80px;


</style>
        </head> 
        <body>
        <div class="wrapper">
    <form class="form-signin" method="get" action="Page1.php" >       
      <h2 class="form-signin-heading">Вход</h2>  
      <div class="textb">
      <input type="text" class="form-control" name="User" placeholder="Код на потребителя" required="" autofocus="" />
      <input type="text" class="form-control" name="Pharmacy" placeholder="Код на аптеката" required=""/>    
      </div>  
      <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>   
    </form>
  </div>
        </body>
    </html>
        