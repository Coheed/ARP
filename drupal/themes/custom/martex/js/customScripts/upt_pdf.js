document.addEventListener("DOMContentLoaded", function () {
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Logo hinzufügen
        const logoUrl = "https://milobeta.xyz/sites/default/files/Logo_test_neu.png";
        doc.addImage(logoUrl, "PNG", 10, 10, 30, 15);

        // Überschrift
        doc.setFont("Helvetica", "bold");
        doc.setFontSize(16);
        doc.text("Ihr UPT-Terminplan", 60, 20);

        // Untertitel
        doc.setFontSize(10);
        doc.setTextColor("#6A843F");
        doc.text("Terminplan bereitgestellt durch abrechnung-dental.de", 60, 25);

        // Details
        const grade = document.querySelector("#schweregrad").value;
        const weekType = document.querySelector("#wochentyp").value;
        const isCareChecked = document.querySelector("#pflegegrad").checked;
        const patientNumber = document.querySelector("#patientennummer").value || "Nicht angegeben";

        const weekTypeText = {
            "5": "5-Tage-Woche (Mo.-Fr.)",
            "6": "6-Tage-Woche (Mo.-Sa.)",
            "7": "7-Tage-Woche (Mo.-So.)",
        }[weekType] || "Unbekannt";

        doc.setTextColor("#000");
        doc.setFontSize(12);
        doc.text("Allgemeine Informationen", 10, 40);

        doc.setFontSize(10);
        doc.text("Grad der Parodontalerkrankung:", 10, 50);
        doc.text(grade, 70, 50);

        doc.text("Praxiszeiten:", 10, 55);
        doc.text(weekTypeText, 70, 55);

        doc.text("Patientennummer:", 10, 60);
        doc.text(patientNumber, 70, 60);

        // Linie unter den Informationen
        doc.line(10, 65, 200, 65);

        // Anzahl der Termine basierend auf Grad
        const termCount = {
            A: 2,
            B: 4,
            C: 6,
        }[grade] || 6;

        // Tabelle vorbereiten
        const headers = ["Termin", "Datum", "Min. Datum", "Max. Datum", "Behandlungsmethoden"];
        const rows = [];

        const formatDate = (dateString) => {
            if (!dateString) return "-";
            const date = new Date(dateString);
            return isNaN(date) ? "-" : new Intl.DateTimeFormat("de-DE").format(date);
        };

        const treatments = {
            A: [
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f"], // 1. Termin
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f", "UPT g"], // 2. Termin
            ],
            B: [
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f"], // 1. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 2. Termin
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f", "UPT g"], // 3. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 4. Termin
            ],
            C: [
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f"], // 1. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 2. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 3. Termin
                ["UPT a", "UPT b", "UPT c", "UPT e", "UPT f", "UPT g"], // 4. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 5. Termin
                ["UPT a", "UPT b", "UPT c", "UPT d", "UPT e", "UPT f"], // 6. Termin
            ],
        };

        const checkedTreatments = ["UPT c", "UPT d", "UPT e", "UPT f"];

        for (let i = 1; i <= termCount; i++) {
            const dateField = document.querySelector(`#upt_date_${i}`);
            const dateValue = dateField ? formatDate(dateField.value) : "Nicht gesetzt";
            const minDate = formatDate(dateField?.getAttribute("min") || "-");
            const maxDate = formatDate(dateField?.getAttribute("max") || "-");

            const methods = isCareChecked
                ? checkedTreatments
                : treatments[grade]?.[i - 1] || [];

            rows.push([
                `${i}. UPT Termin`,
                dateValue,
                minDate,
                maxDate,
                methods.join(", "),
            ]);
        }

        // Tabelle mit autoTable generieren
        doc.autoTable({
            head: [headers],
            body: rows,
            startY: 70,
            styles: {
                font: "Helvetica",
                fontSize: 10,
                cellPadding: 2,
                overflow: "linebreak",
            },
            headStyles: {
                fillColor: [166, 204, 101], // Grün
                textColor: "#ffffff",
                halign: "center",
            },
            bodyStyles: {
                textColor: "#000",
            },
        });

        // PDF speichern
        doc.save("UPT-Terminplan.pdf");
    }

    // Button hinzufügen
    const pdfButton = document.createElement("button");
    pdfButton.textContent = "Download PDF";
    pdfButton.className = "btn btn-primary mt-3";
    pdfButton.addEventListener("click", generatePDF);

    const container = document.querySelector(".container");
    if (container) {
        container.appendChild(pdfButton);
    }
});
