<?php

$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')) {
        $to = 'yamo.gebrewold@gmail.com';
        $sender = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        $headers = "From: $sender \r\n";

        if(!empty($sender) && !empty($subject) && !empty($message)) {
            mail($to, $subject, $message, $headers);
            $msg = 'Ditt meddelande har skickats :)';
            $msgClass = 'alert-success';
        } else {
            $msg = 'Fyll i de tomma fälten, tack.';
            $msgClass = 'alert-danger';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First Contact Form</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<body>
    <div class="container jumbotron">
    <?php if ($msg != '') : ?>
    <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
    <h1 class="align-center mb-3">Kontaktformulär</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="navbar-form navbar-left">
            <div class="form-group">
                <label for="name">Namn:</label>
                <input type="text" name="name" id="name" class="input-group">
            </div>
            <div class="form-group">
                <label for="subject">Ämne:</label>
                <input type="text" name="subject" id="subject" class="input-group">
            </div>
            <div class="form-group">
                <label for="email">Mejladress:</label>
                <input type="email" name="email" id="email" class="input-group">
            </div>
            <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="10" class="input-group"></textarea>
            </div>
            <input type="submit" value="Skicka" class="btn btn-primary btn-block" name="submit">
        </form>
    </div>
</body>
</html>