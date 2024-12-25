document.addEventListener("DOMContentLoaded", () => {
  // Funktion zur Punktzahlabfrage basierend auf der GOZ-Nummer
  async function fetchGozPoints(gozNumber) {
    try {
        const response = await fetch(`/api/calculators/goz-points/${gozNumber}`);
        if (!response.ok) {
            throw new Error(`Fehler beim Abrufen der Punktzahl: ${response.statusText}`);
        }
        const data = await response.json();
        
        if (data.points) {
            // Punktzahl und Einfachsatz eintragen
            document.getElementsByName("punkte")[0].value = data.points;
            const cost = data.points * 0.0562421;
            document.getElementById("cost").value = cost.toFixed(2);
            // Falls ein Faktor schon eingegeben ist, Honorar berechnen
            calculateFee();
        } else {
            console.error("Punktzahl nicht gefunden");
        }
    } catch (error) {
        console.error("Fehler beim Abrufen der Punktzahl:", error);
    }
}
// Funktion zur Berechnung des Honorars
function calculateFee() {
    const factor = parseFloat(document.getElementById("factor").value);
    const services = parseFloat(document.getElementsByName("anzahl")[0].value);
    const cost = parseFloat(document.getElementById("cost").value);
    const feeField = document.getElementsByName("mehrfachb")[0];
    
    if (factor && services) {
        // Berechnung des Honorars
        const fee = factor * services * cost;
        feeField.value = fee.toFixed(2) + " €";
        
        // Hinweise anzeigen
        document.getElementById("notice-container").style.display = 'block';
        document.getElementById("factor-notice").style.display = factor > 2.3 ? 'block' : 'none';
        document.getElementById("agreement-notice").style.display = factor > 3.5 ? 'block' : 'none';
    }
}
// Funktion zum Zurücksetzen des Formulars
function resetForm() {
    document.getElementById("goz_formular").reset();
    document.getElementsByName("mehrfachb")[0].value = "";
    document.getElementById("notice-container").style.display = 'none';
}

document.getElementById("calculateForm").addEventListener("click", (event) => {
calculateFee();
});

document.getElementById("resetForm").addEventListener("click", (event) => {
    resetForm();
    });
// Event-Listener zur automatischen Punktzahl-Abfrage, wenn GOZ-Nummer eingegeben wird
document.getElementById("goz-calc-number").addEventListener("input", (event) => {
    const gozNumber = event.target.value;
    if (gozNumber) {
        fetchGozPoints(gozNumber);
    }
});
});