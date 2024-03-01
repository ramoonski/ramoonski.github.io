<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@anwalt-termin.de"; // Hier die E-Mail-Adresse eingeben
    $subject = "Kontaktanfrage von " . $_POST["name"];
    $message = $_POST["message"];
    $headers = "From: " . $_POST["email"];

    if (mail($to, $subject, $message, $headers)) {
        echo "E-Mail wurde erfolgreich gesendet.";
    } else {
        echo "Fehler beim Senden der E-Mail.";
    }
}
?>
