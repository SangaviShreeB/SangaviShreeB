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
        
        $connect =mysqli_connect("127.0.0.1","root","","mobcarwash");
        if(!$connect){
            echo "Connection failed: ".mysqli_connect_error();
            exit;
        }
        $uname=$_POST['user'];
        $pass=$_POST['pass'];
        $age=$_POST['age'];

        $sqldata = "SELECT * FROM clientdata where user='$uname' AND pass='$pass'";
        $res = mysqli_query($connect,$sqldata);
        
        $data=mysqli_fetch_assoc($res);
        if(isset($data['user']) || isset($data['pass'])){
            echo "<h3 style='text-align:center;margin-top:10%;'>Username already exists</h3>";
            echo '<p style="text-align:center;"><a href="login.html">Login</a> to continue</p>'; 


        }

        else{

            $sqldata = "INSERT INTO clientdata (user,pass,age) VALUES ('$uname','$pass','$age')";
            $res = mysqli_query($connect,$sqldata);
            if(!$res){
                echo "ERROR:".mysqli_error($connect);
                exit;
            }
            header('Location :user.html');


        }

       
        mysqli_close($connect);
        ?>

    </body>
</html>