<?php
        // Message Vars
        $msg = '';
        $msgClass = '';

        // Check for Submit
        if(filter_has_var(INPUT_POST, 'submit')){
                        // Get Form Data
                        $name = htmlspecialchars($_POST['name']);
                        $email = htmlspecialchars($_POST['email']);
                        $message = htmlspecialchars($_POST['message']);

                        // Check Required Fields
                        if(!empty($email) && !empty($name) && !empty($message)){
                                // Passed
                                // Check Email
                                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                                        // Failed
                                        $msg = 'Please use a valid e-mail address';
                                        $msgClass = 'alert-danger';
                                        } else {
                                        // Passed
                                        // Recipient Email
                                        $toEmail = 'chad.gayken@cgcontact.com';
                                        $subject = 'Contact Request From '.$name;
                                        $body = '<h2>Contact Request</h2>
                                                        <h4>Name</h4><p>'.$name.'</p>
                                                        <h4>Email</h4><p>'.$email.'</p>
                                                        <h4>Message</h4><p>'.$message.'</$
                                        ';

                                        // Email Headers
                                        $headers = "MIME-Version: 1.0" ."\r\n";
                                        $headers .="Content-Type:text/html;charset=UTF-8"$

                                        // Additional Headers
                                        $headers .= "From: " .$name. "<".$email.">". "\r\$

                                        if(mail($toEmail, $subject, $body, $headers)){
                                                // Email Sent
                                                $msg = 'Your email has been sent';
                                                $msgClass = 'alert-success';

                                        } else {
                                                // Failed
                                                $msg = 'Your email was not sent';
                                                $msgClass = 'alert-danger';
                                        }
                                }
                              } else {
                             // Failed
                             $msg = 'Please fill in all fields';
                             $msgClass = 'alert-danger';
                     }
     }
?>

<!DOCTYPE html>
<html>
<head>
        <title>Contact Me</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css"
</head>
<body>
        <!-- Nav Bar -->
        <nav class="navbar sticky-top">
        <h1>Contact</h1>

                <ul class="nav justify-content-end">
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="index.html">Resume</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="skills.html">Skills</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                </ul>
        </nav>

        <!-- Email Form -->
                <div class="container">
                        <?php if ($msg != ''): ?>
                                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></$
                        <?php endif; ?>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type= "text" name="name" class="form-control"
                                        value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                                </div>

                                <div class="form-group">
                                        <label>Email</label>
                                        <input type= "text" name="email" class="form-control" val$
                                        ="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                                </div>

                                <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control"><?php echo $
                                        ($_POST['message']) ? $message : ''; ?></textarea>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">
                                Submit</button>
                        </form>
                </div>


        </body>
        </html>
