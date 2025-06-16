<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular holen und sichern
    $salutation = htmlspecialchars(trim($_POST['salutation']));
    $service = htmlspecialchars(trim($_POST['service']));
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $concern = htmlspecialchars(trim($_POST['concern']));
    $privacy = isset($_POST['privacy']);

    // Pflichtfelder prüfen
    if (!$email || !$firstName || !$lastName || !$service || !$salutation || !$privacy) {
        echo "Bitte füllen Sie alle Pflichtfelder aus und akzeptieren Sie die Datenschutzerklärung.";
        exit;
    }

    // Mailinhalt zusammenstellen
    $message = "Neue Anfrage über das Kontaktformular:\n\n";
    $message .= "Anrede: $salutation\n";
    $message .= "Leistung: $service\n";
    $message .= "Vorname: $firstName\n";
    $message .= "Nachname: $lastName\n";
    $message .= "E-Mail: $email\n";
    $message .= "Telefon: $phone\n";
    $message .= "Anliegen:\n$concern\n";

    $empfaenger = "abu-shagrah@web.de"; // Deine Empfängeradresse

    // Mailheader
    $absender = "kontakt@deinedomain.de"; // Am besten eigene Domain-Adresse als Absender
    $header = "From: Abu-Shagrah Handwerk <$absender>\r\n";
    $header .= "Reply-To: $email\r\n";
    $header .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Mail senden
    if (mail($empfaenger, "Neue Kontaktanfrage von $firstName $lastName", $message, $header)) {
        echo "Vielen Dank für Ihre Anfrage! Wir melden uns bald bei Ihnen.";
    } else {
        echo "Beim Senden der Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
