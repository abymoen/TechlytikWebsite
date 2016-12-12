<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Form</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            .contactForm {
                border: 1px solid #000000;
                margin-top: 3%;
                border-radius: 15px;
            }
        
        </style>
    </head>

    <body>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10 contactForm">
                    <h1>Contact us: </h1>
                    <?php
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $message = $_POST["message"];
                    $errors;
                        if($_POST["submit"]) {
                            if(!$name) {
                                $errors .="<p><strong>Please enter your name!</strong></p>";
                            } else {
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                            }
                            if(!$email) {
                                $errors .="<p><strong>Please enter your email address!</strong></p>";
                            } else {
                                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                                    $errors .="<p><strong>Please enter a valid email address!</strong></p>";
                                }
                            }
                            if (!$message) {
                                $errors .="<p><strong>Please enter a message!</strong></p>";
                            } else {
                                $message = filter_var($message, FILTER_SANITIZE_STRING);
                            }
                            
                            if($errors) {
                                $resultMessage = "<div class='alert alert-danger'>" . $errors . "</div>";
                            } else {
                                
                                $to = "kjml.star@shaw.ca";
                                $subject = "The Website Is Alive!";
                                $message = "
                                <p>Name: $name.</p>
                                <p>Email: $email.</p>
                                <p>Message: </p>
                                <p><strong>$message</strong></p>";
                                $headers = "Content-type: text/html";
                                
                                if(mail($to, $subject, $message, $headers)) {
                                    $resultMessage = "<div class='alert alert-success'><p><strong>Sent Success</strong></p></div>";
                                } else {
                                    $resultMessage = "<div class='alert alert-danger'><p><strong>Email Failed</strong></p></div>";
                                }
                            }
                            
                            echo $resultMessage;
                        }
                    
                    
                    
                    ?>
                    <form action="emailform.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input value="<?php echo $_POST["name"]; ?>" type="text" name="name" id="name" placeholder="Name" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input value="<?php echo $_POST["email"]; ?>" type="email" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" id="message" rows="5"><?php echo $_POST["message"]; ?></textarea>
                        </div>
                        
                        <input type="submit" name="submit" id="submit" class="btn btn-success btn-lg" value="Send Message">
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>


</html>