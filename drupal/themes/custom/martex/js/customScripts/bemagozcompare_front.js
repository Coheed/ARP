document.addEventListener("DOMContentLoaded", () => {
    // Event Listener für Änderungen am Punktwert
    document.getElementById("punktwert").addEventListener("input", () => {
        const evaluation = parseFloat(document.getElementById("evaluation-value").innerText);
        calculateBemaHonorar(evaluation);
    });

    // API-Aufruf, um Vergleichsdaten zu laden
    fetchBemaGozComparison();
});

// Initialer Punktwert für AOK Bayern
const defaultPunktwert = 1.2563;

// Berechnet das BEMA-Honorar
function calculateBemaHonorar(evaluation) {
    const punktwertInput = document.getElementById("punktwert");
    const honorarDiv = document.getElementById("bema-berechnet");

    let punktwert = parseFloat(punktwertInput.value) || defaultPunktwert;

    if (!evaluation || isNaN(evaluation)) {
        honorarDiv.innerText = "0.00€";
        return;
    }

    const bemaHonorar = evaluation * punktwert;
    honorarDiv.innerText = `${bemaHonorar.toFixed(2)}€`;

    const gozEinfachsatz = parseFloat(document.getElementById("einfachsatz").innerText) || 0;
    calculateRequiredFactor(bemaHonorar, gozEinfachsatz);
}

// Berechnet den erforderlichen Faktor und GOZ-Honorar
function calculateRequiredFactor(bemaHonorar, gozEinfachsatz) {
    const factorDiv = document.getElementById("neededFactor");
    const factorLongDisplay = document.getElementById("neededFactorlong");
    const gozHonorarDiv = document.getElementById("gozhonorar");

    if (!bemaHonorar || !gozEinfachsatz || gozEinfachsatz === 0) {
        factorDiv.innerText = "0.00";
        factorLongDisplay.innerText = "";
        gozHonorarDiv.innerText = "0.00€";
        return;
    }

    const exactFactor = bemaHonorar / gozEinfachsatz;
    factorDiv.innerText = exactFactor.toFixed(2);
    factorLongDisplay.innerText = `Exakter Faktor: ${exactFactor.toFixed(5)}`;
    gozHonorarDiv.innerText = `${(gozEinfachsatz * exactFactor).toFixed(2)}€`;
}

async function fetchBemaGozComparison() {
    const number = document.getElementById("bema-number").value;
    if (!number) return;

    try {
        // Daten für BEMA und GOZ laden
        const response = await fetch(`/api/calculators/bema-goz-comparison/${number}`);
        const data = await response.json();

        document.getElementById("evaluation-value").innerText = data.evaluation || "-";
        document.getElementById("goz-number").value = data.goz_ref || "-";
        document.getElementById("points-value").innerText = data.points || "-";
        document.getElementById("bema-service").innerHTML = data.bema_leistung || "";
        document.getElementById("goz-service").innerHTML = data.goz_leistung || "";

        document.getElementById("punktwert").value = defaultPunktwert.toFixed(4);

        if (data.points) calculateHonorare(data.points);
        if (data.evaluation) calculateBemaHonorar(data.evaluation);

        // Kommentar laden
        await loadModeratorComment(number);

    } catch (error) {
        console.error("Fehler beim Abrufen der Vergleichsdaten:", error);
    }
}

// Funktion zum Laden des Kommentars
async function loadModeratorComment(bemaNumber) {
    try {
        const response = await fetch(`/api/calculators/moderator-comment/${bemaNumber}`);
        const data = await response.json();

        // Kommentar anzeigen
        const commentDiv = document.getElementById("moderator-comment");
        commentDiv.innerText = data.comment || "Kein Kommentar vorhanden";
    } catch (error) {
        console.error("Fehler beim Laden des Kommentars:", error);
        document.getElementById("moderator-comment").innerText = "Fehler beim Laden des Kommentars.";
    }
}

function calculateHonorare(points) {
    document.getElementById("einfachsatz").innerText = `${(points * 0.0562421).toFixed(2)}€`;
    document.getElementById("berechnet").innerText = `${(points * 0.0562421 * 2.3).toFixed(2)}€`;

    const bemaHonorar = parseFloat(document.getElementById("bema-berechnet").innerText) || 0;
    calculateRequiredFactor(bemaHonorar, points * 0.0562421);
}
