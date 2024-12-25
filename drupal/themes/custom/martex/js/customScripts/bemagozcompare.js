// Initialer Punktwert für AOK Bayern
const defaultPunktwert = 1.2563;



document.addEventListener("DOMContentLoaded", () => {
    // Event Listener für Änderungen am Punktwert
    document.getElementById("punktwert").addEventListener("input", () => {
        const evaluation = parseFloat(document.getElementById("evaluation-value").innerText);

        // BEMA-Honorar neu berechnen
        calculateBemaHonorar(evaluation);

        // GOZ-Honorare neu berechnen
        const gozEinfachsatz = parseFloat(document.getElementById("einfachsatz").value) || 0;
        const bemaHonorar = parseFloat(document.getElementById("bema-berechnet").value) || 0;
        calculateRequiredFactor(bemaHonorar, gozEinfachsatz);
    });
});

// Berechnet das BEMA-Honorar
function calculateBemaHonorar(evaluation) {
    const punktwertInput = document.getElementById("punktwert");
    const honorarInput = document.getElementById("bema-berechnet");

    // Stelle sicher, dass ein Punktwert vorhanden ist
    let punktwert = parseFloat(punktwertInput.value) || defaultPunktwert;

    if (!evaluation || isNaN(evaluation)) {
        honorarInput.value = "0.00€";
        return;
    }

    // BEMA-Honorar berechnen
    const bemaHonorar = evaluation * punktwert;

    // Ergebnisse anzeigen
    honorarInput.value = `${bemaHonorar.toFixed(2)}€`;

    // GOZ-Einfachsatz abrufen
    const gozEinfachsatz = parseFloat(document.getElementById("einfachsatz").value) || 0;

    // Erforderlichen Faktor berechnen
    calculateRequiredFactor(bemaHonorar, gozEinfachsatz);
}

// Berechnet den erforderlichen Faktor und GOZ-Honorar
function calculateRequiredFactor(bemaHonorar, gozEinfachsatz) {
    const factorInput = document.getElementById("neededFactor");
    const factorLongDisplay = document.getElementById("neededFactorlong");
    const gozHonorarInput = document.getElementById("gozhonorar");

    // Stelle sicher, dass gültige Zahlen vorliegen
    if (!bemaHonorar || !gozEinfachsatz || isNaN(bemaHonorar) || isNaN(gozEinfachsatz) || gozEinfachsatz === 0) {
        factorInput.value = "0.00";
        factorLongDisplay.innerText = "";
        gozHonorarInput.value = "0.00€";
        return;
    }

    // Exakter Faktor berechnen
    const exactFactor = bemaHonorar / gozEinfachsatz;

    // Rundung auf 2 Nachkommastellen für die Anzeige im Input-Feld
    const roundedFactor = exactFactor.toFixed(2);

    // GOZ-Honorar berechnen
    const gozHonorar = gozEinfachsatz * exactFactor;

    // Ergebnisse anzeigen
    factorInput.value = roundedFactor; // Gerundeter Faktor
    factorLongDisplay.innerText = `Exakter Faktor: ${exactFactor.toFixed(5)}`; // Voller Faktor mit 5 Dezimalstellen
    gozHonorarInput.value = `${gozHonorar.toFixed(2)}€`; // GOZ-Honorar
}

// Berechnet GOZ-Honorare (Einfachsatz und 2.3-fach)
function calculateHonorare(points) {
    const einfachsatzInput = document.getElementById("einfachsatz");
    const berechnetInput = document.getElementById("berechnet");

    if (!points || isNaN(points)) {
        einfachsatzInput.value = "0.00€";
        berechnetInput.value = "0.00€";
        return;
    }

    // Einfachsatz berechnen
    const einfachsatz = points * 0.0562421;

    // 2.3-fach berechnen
    const berechnet = einfachsatz * 2.3;

    // Ergebnisse in die Felder einfügen
    einfachsatzInput.value = `${einfachsatz.toFixed(2)}€`;
    berechnetInput.value = `${berechnet.toFixed(2)}€`;

    // BEMA-Honorar erneut berechnen
    const bemaHonorar = parseFloat(document.getElementById("bema-berechnet").value) || 0;
    calculateRequiredFactor(bemaHonorar, einfachsatz);
}

// Event Listener für Änderungen am Punktwert
document.getElementById("punktwert").addEventListener("input", () => {
    const evaluation = parseFloat(document.getElementById("evaluation-value").innerText);
    calculateBemaHonorar(evaluation);
});

// API-Aufruf, um Vergleichsdaten zu laden
async function fetchBemaGozComparison() {
    const number = document.getElementById("bema-number").value;
    if (!number) return;

    try {
        const response = await fetch(`/api/calculators/bema-goz-comparison/${number}`);
        const data = await response.json();

        // Felder aktualisieren
        document.getElementById("evaluation-value").innerText = data.evaluation || "-";
        document.getElementById("goz-number").value = data.goz_ref || "-";
        document.getElementById("points-value").innerText = data.points || "-";
        document.getElementById("bema-service").value = data.bema_leistung || "";
        document.getElementById("goz-service").value = data.goz_leistung || "";

        // Punktwert-Feld auf Standardwert setzen
        const punktwertInput = document.getElementById("punktwert");
        if (!punktwertInput.value) { // Nur setzen, wenn noch kein Wert eingegeben wurde
            punktwertInput.value = defaultPunktwert.toFixed(4);
        }

        // Honorare berechnen, wenn Punkte vorhanden
        if (data.points) {
            calculateHonorare(data.points);
        }
        if (data.evaluation) {
            calculateBemaHonorar(data.evaluation); // BEMA
        }
         // Moderator-Kommentar laden
         loadModeratorComment(number);
    }
    catch (error) {
        console.error("Fehler beim Abrufen der Vergleichsdaten:", error);
    }
}

// Kommentar laden
async function loadModeratorComment(bemaNumber) {
    try {
        const response = await fetch(`/api/calculators/moderator-comment/${bemaNumber}`);
        const data = await response.json();

        document.getElementById("moderator-comment").value = data.comment || "";
    } catch (error) {
        console.error("Fehler beim Laden des Kommentars:", error);
        document.getElementById("moderator-comment").value = "";
    }
}


async function saveBemaGozData() {
    const number = document.getElementById("bema-number").value;
    const bemaService = document.getElementById("bema-service").value;
    const gozService = document.getElementById("goz-service").value;
    const moderatorComment = document.getElementById("moderator-comment").value; // Neuer Kommentar

    if (!number) {
        alert("Bitte geben Sie eine BEMA-Nummer ein!");
        return;
    }

    try {
        // Speichern der BEMA- und GOZ-Daten
        const response = await fetch(`/api/calculators/bema-goz-comparison/save`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                bema_number: number,
                bema_service: bemaService,
                goz_service: gozService,
            }),
        });

        // Speichern des Moderator-Kommentars
        const commentResponse = await fetch(`/api/calculators/moderator-comment/save`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                bema_number: number,
                comment: moderatorComment,
            }),
        });

        if (response.ok && commentResponse.ok) {
            alert("Daten und Kommentar erfolgreich gespeichert!");
        } else {
            alert("Fehler beim Speichern der Daten oder des Kommentars.");
        }
    } catch (error) {
        console.error("Fehler beim Speichern:", error);
        alert("Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.");
    }
}
