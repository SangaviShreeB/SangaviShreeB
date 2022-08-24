<html>
    <head>
        <style>
              body {
  background-image: url('car.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
        </style>
    </head>
    <body>
    <?php

        $connect=mysqli_connect("127.0.0.1","root","","mobcarwash");
        if(!$connect){
            echo "Connection failed: ".mysqli_connect_error();
            exit;
        }
        $uname=$_POST['user'];
        $pass=$_POST['pass'];

       

        $sqldata = "SELECT * FROM clientdata where user='$uname' AND pass='$pass'";
        $res = mysqli_query($connect,$sqldata);
        if(!$res){
            echo "ERROR:".mysqli_error($connect);
            exit;
        }
        
        $rowdata=mysqli_fetch_assoc($res);

        if($uname=="admin" && $pass==123456){
            header('Location: adminpanel.html');
        }
        else{

            if($rowdata){
                header('Location: user.html');
            }
            else{
                echo "<p style='text-align:center;margin-top:10%;'>Invalid Credintials</p>";
                echo '<p style="text-align:center;"><a href="login.html">Back To Login</a></p>'; 
            }

        }
       
        mysqli_close($connect);
        ?>
    </body>
</html>