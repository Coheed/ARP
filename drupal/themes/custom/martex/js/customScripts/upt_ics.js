document.addEventListener("DOMContentLoaded", function () {
    function generateUUID() {
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
            const r = (Math.random() * 16) | 0;
            const v = c === "x" ? r : (r & 0x3) | 0x8;
            return v.toString(16);
        });
    }

    function generateICS() {
        let icsContent = `BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//UPT-Terminplan//DE
CALSCALE:GREGORIAN\n`;

        const grade = document.querySelector("#schweregrad").value;
        const isCareChecked = document.querySelector("#pflegegrad").checked;
        const gradeText = `Grad ${grade} ${isCareChecked ? "(Pflegegrad)" : ""}`;

        const termCount = {
            A: 2,
            B: 4,
            C: 6,
        }[grade] || 6;

        for (let i = 1; i <= termCount; i++) {
            const dateField = document.querySelector(`#upt_date_${i}`);
            const timeField = document.querySelector(`#upt_date${i}_time`);
            const dateValue = dateField ? dateField.value : null;
            const timeValue = timeField && timeField.value ? timeField.value : "09:00";

            if (dateValue) {
                const [year, month, day] = dateValue.split("-");
                const [hour, minute] = timeValue.split(":");
                const startDate = new Date(year, month - 1, day, hour, minute);

                if (isNaN(startDate.getTime())) {
                    console.error(`Ungültiges Datum oder Uhrzeit: ${dateValue} ${timeValue}`);
                    continue;
                }

                const endDate = new Date(startDate);
                endDate.setHours(endDate.getHours() + 1);

                const formattedStart = startDate.toISOString().replace(/[-:]/g, "").split(".")[0];
                const formattedEnd = endDate.toISOString().replace(/[-:]/g, "").split(".")[0];

                icsContent += `BEGIN:VEVENT
UID:${generateUUID()}@abrechnung-dental.de
SUMMARY:UPT Termin ${i}
DESCRIPTION:UPT Behandlungsmethoden (Grad ${gradeText})
DTSTART:${formattedStart}Z
DTEND:${formattedEnd}Z
LOCATION:Zahnarztpraxis
STATUS:CONFIRMED
SEQUENCE:0
BEGIN:VALARM
TRIGGER:-PT15M
DESCRIPTION:Erinnerung: UPT Termin ${i}
ACTION:DISPLAY
END:VALARM
END:VEVENT\n`;
            } else {
                console.warn(`Kein Datum für Termin ${i} angegeben. Termin wird übersprungen.`);
            }
        }

        icsContent += "END:VCALENDAR";

        // Datei für mobiles Gerät bereitstellen
        const blob = new Blob([icsContent], { type: "text/calendar;charset=utf-8" });
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "UPT-Terminplan.ics";

        // Automatisch öffnen, wenn möglich
        if (navigator.userAgent.match(/Android|iPhone|iPad/i)) {
            window.location.href = link.href;
        } else {
            // Für Desktop-Browser
            link.textContent = "ICS-Datei herunterladen";
            link.className = "btn btn-secondary mt-3";
            document.querySelector(".container").appendChild(link);
            link.click();
        }
    }

    // Button für ICS-Download
    const icsButton = document.createElement("button");
    icsButton.textContent = "Download ICS";
    icsButton.className = "btn btn-secondary mt-3";
    icsButton.addEventListener("click", generateICS);

    const container = document.querySelector(".container");
    if (container) {
        container.appendChild(icsButton);
    }
});
