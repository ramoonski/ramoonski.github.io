<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Hier fügen Sie die E-Mail-Adresse des Empfängers ein
    $to = 'info@anwalt-termin.de';

    // Betreff und E-Mail-Inhalt
    $subject = 'Neue Nachricht von Ihrer Website';
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";

    // Sicherstellen, dass die E-Mail-Adresse gültig ist
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ungültige E-Mail-Adresse.";
        exit;
    }

    // Versenden der E-Mail
    if(mail($to, $subject, $email_content)) {
        echo "Danke! Ihre Nachricht wurde gesendet.";
    } else {
        echo "Oops! Etwas ist schief gelaufen und wir konnten Ihre Nachricht nicht senden.";
    }
} else {
    // Wenn das Formular angezeigt wird
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kontaktformular</title>
<!-- Hier würde Ihr CSS-Code oder der Verweis darauf kommen -->
</head>
<body>

<div class="contact-form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Kontaktieren Sie uns</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Nachricht:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit">Senden</button>
    </form>
</div>

</body>
</html>
<?php
} // Ende der else-Anweisung
?>
