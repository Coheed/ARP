<?php
// Header für die ICS-Datei setzen
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="UPT-Terminplan.ics"');

// ICS-Inhalt generieren
$icsContent = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//UPT-Terminplan//DE
CALSCALE:GREGORIAN";

// Beispieltermine hinzufügen
$events = [
    [
        "UID" => uniqid() . "@abrechnung-dental.de",
        "DTSTART" => "20241101T090000Z", // Startdatum (UTC)
        "DTEND" => "20241101T100000Z",   // Enddatum (UTC)
        "SUMMARY" => "1. UPT Termin",
        "DESCRIPTION" => "Behandlungsmethoden: UPT a, UPT b, UPT c",
        "LOCATION" => "Zahnarztpraxis"
    ],
    [
        "UID" => uniqid() . "@abrechnung-dental.de",
        "DTSTART" => "20250203T090000Z",
        "DTEND" => "20250203T100000Z",
        "SUMMARY" => "2. UPT Termin",
        "DESCRIPTION" => "Behandlungsmethoden: UPT a, UPT b, UPT c, UPT d",
        "LOCATION" => "Zahnarztpraxis"
    ]
];

foreach ($events as $event) {
    $icsContent .= "\nBEGIN:VEVENT";
    $icsContent .= "\nUID:" . $event["UID"];
    $icsContent .= "\nDTSTART:" . $event["DTSTART"];
    $icsContent .= "\nDTEND:" . $event["DTEND"];
    $icsContent .= "\nSUMMARY:" . $event["SUMMARY"];
    $icsContent .= "\nDESCRIPTION:" . $event["DESCRIPTION"];
    $icsContent .= "\nLOCATION:" . $event["LOCATION"];
    $icsContent .= "\nEND:VEVENT";
}

$icsContent .= "\nEND:VCALENDAR";

// ICS-Inhalt ausgeben
echo $icsContent;
exit;
