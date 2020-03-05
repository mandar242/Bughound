<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1>Bug Hound Login</h1>
        <form action="validateLogin.php" method="post" onsubmit="return validate(this)">
            
            <input type="Text" name ="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
           
            <input type="password" name ="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
            <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
            
            <input type="submit" class="btn btn-primary btn-lg" value ="Submit" name="Submit">
            <input type="reset" class="btn btn-secondary btn-lg" value ="Reset" name="Reset">

        </div>
    </div>
        </form>

        <script language=Javascript>

            function validate(theform) {

                if(theform.username.value === ""){

                    alert ("Empty username field");

                    return false;
                }

				if(theform.password.value === ""){

                    alert ("Empty password field");

                    return false;
                }

                return true;
            }

        </script>

    </body>

</html>