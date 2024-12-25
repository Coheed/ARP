jQuery(function($) {

    // Initialize tooltips
    let tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltips].map(tooltip => new bootstrap.Tooltip(tooltip));

    function behandlungsmethodenInner(rowId, treatmentClasses) {
        let htmlContent = "",
            classesArray = treatmentClasses.split(",");
        $.each(classesArray, function(index, className) {
            htmlContent += $("#behandlungsmethodeChart .behandlungsmethode_" + className).first().html();
        });
        $("#date_" + rowId + " .behandlungsmethodes_html").html(htmlContent);
        let newTooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        [...newTooltips].map(tooltip => new bootstrap.Tooltip(tooltip));
    }

    // Function to enable date input fields
    function enableDateInputs(row) {
        row.find('input[type="date"]').attr("disabled", !1);
        if (row.hasClass("hidden")) row.removeClass("hidden");
        let rowId = row.attr("id"),
            index = rowId.substring(rowId.length - 1);
        $('input[name="date_' + index + '_min_txt"]').val($("#upt_date_" + index + "_min").text());
        $('input[name="date_' + index + '_max_txt"]').val($("#upt_date_" + index + "_max").text());
    }

    // Function to disable date input fields
    function disableDateInputs(row) {
        row.find('input[type="date"]').val("");
        row.find('input[type="date"]').attr("disabled", !0);
        if (!row.hasClass("hidden")) row.addClass("hidden");
        let rowId = row.attr("id"),
            index = rowId.substring(rowId.length - 1);
        $('input[name="date_' + index + '_min_txt"]').val("");
        $('input[name="date_' + index + '_max_txt"]').val("");
    }

    // Utility function to compare two dates
    let areDatesEqual = (date1, date2) => date1.getFullYear() === date2.getFullYear() && date1.getMonth() === date2.getMonth() && date1.getDate() === date2.getDate();

    // Function to check if a date is a weekend or holiday
    function isWeekendOrHoliday(date, weekType) {
        if ("5" == weekType && (6 == date.getDay() || 0 == date.getDay()) || "6" == weekType && 0 == date.getDay()){
            return true;
        } 
        let day = date.getDate(),
            month = date.getMonth() + 1;
        return date.getFullYear(), !!(1 == day && 1 == month || 1 == day && 5 == month || 3 == day && 10 == month || 25 == day && 12 == month || 26 == day && 12 == month || function checkEaster(date) {
            let year = date.getFullYear();
            if (year < 1970 || year > 2099) return !1;
            let a = year % 19,
                b = (19 * a + 24) % 30,
                c = b + (2 * (year % 4) + 4 * (year % 7) + 6 * b + 5) % 7;
            (35 == c || 34 == c && 28 == b && a > 10) && (c -= 7);
            let easter = new Date(year, 2, 22);
            easter.setTime(easter.getTime() + 864e5 * c);
            let goodFriday = new Date(easter),
                easterMonday = new Date(easter),
                ascensionDay = new Date(easter),
                pentecost = new Date(easter);
            goodFriday.setDate(goodFriday.getDate() - 2);
            easterMonday.setDate(easterMonday.getDate() + 1);
            ascensionDay.setDate(ascensionDay.getDate() + 39);
            pentecost.setDate(pentecost.getDate() + 50);
            return !!(areDatesEqual(date, goodFriday) || areDatesEqual(date, easterMonday) || areDatesEqual(date, ascensionDay) || areDatesEqual(date, pentecost));
        }(date));
    }

function adjustDate(date, weekType, logInfo = { fieldId: null, changed: false }) {
    const originalDate = new Date(date); // Speichere das ursprüngliche Datum
    let adjustmentCount = 0; // Zähler für Änderungen

    while (isWeekendOrHoliday(date, weekType)) {
        date.setDate(date.getDate() + 1);
        adjustmentCount++;
    }

    if (adjustmentCount > 0) {
        console.log(
            `Das ursprüngliche Datum ${originalDate.toLocaleDateString("de-DE")} wurde geändert auf ${date.toLocaleDateString(
                "de-DE"
            )}`
        );

        // Suche das geänderte Datum in allen Input-Feldern
        const formattedDate = date.toISOString().split("T")[0]; // ISO-Format für Input-Feld

        setTimeout(() => {
            document.querySelectorAll("input[type='date']").forEach(function (inputField) {
                console.log(`Prüfe Feld: ${inputField.id}, aktueller Wert: ${inputField.value}`);
                if (inputField.value === formattedDate) {
                    console.log(`Übereinstimmung gefunden: ${inputField.id}`);
                    const dateWrapper = inputField.closest(".upt_dateInner");
                    if (dateWrapper) {
                        const dateHint = dateWrapper.querySelector(".js_date_hint");
                        if (dateHint) {
                            dateHint.textContent = "Datum automatisch verschoben (Wochenende o. Feiertag)";
                            dateHint.classList.add("show");
                            console.log(`Hinweis hinzugefügt für Feld: ${inputField.id}`);
                        }
                    }
                }
            });
        }, 100); // Verzögerung von 100ms
    }

    // Rückgabe des angepassten Datums
    return date;
}


// Beispiel: Stelle sicher, dass der Wert gesetzt wird
function setDateValue(fieldId, date) {
    const inputField = document.getElementById(fieldId);
    if (inputField) {
        const formattedDate = date.toISOString().split("T")[0];
        inputField.value = formattedDate; // Aktualisiere den Wert des Feldes
        console.log(`Feld ${fieldId} aktualisiert auf ${formattedDate}`);
    }
}

    $("#schweregrad, #wochentyp, #pflegegrad").on("change", function(event) {
        $(".upt_dateInner").removeClass("custom-adjustment custom-warning custom-error");
        $("#js_upt_msgrow").hide();
        let grade = "A";
        if ($("#schweregrad").val().length > 0) grade = $("#schweregrad").val();
        let isCareLevelChecked = $("#pflegegrad").is(":checked");

      // Clear existing grade-specific classes
    $(".row").removeClass("schweregrad_a schweregrad_b schweregrad_c");

      // Add grade-specific class based on the selected grade
    if (grade === "A") {
        $(".row").addClass("schweregrad_a");
    } else if (grade === "B") {
        $(".row").addClass("schweregrad_b");
    } else if (grade === "C") {
        $(".row").addClass("schweregrad_c");
    }

   if (isCareLevelChecked) {
        $(".row").addClass("checked"); // Hinzufügen der Klasse "checked" zu allen .row-Elementen
    } else {
        $(".row").removeClass("checked"); // Entfernen der Klasse "checked", wenn das Kontrollkästchen nicht markiert ist
    }

        $(".behandlungsmethodes_html").html("");
        if ("A" == grade && !1 === isCareLevelChecked) {
            $("#upt_date_2_interval").text("10 Monate");
            $("#dynamicElements_2").after($("#date_2"));
            $("#date_2").after($("#date_3"));
            $("#upt_date_3").val("");
            $("#date_3").hide();
            $("#upt_date_4").val("");
            $("#date_4").hide();
            $("#upt_date_5").val("");
            $("#date_5").hide();
            $("#upt_date_6").val("");
            $("#date_6").hide();
            $("#behandlungsmethodes_container_1").show();
            behandlungsmethodenInner(1, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(2, "a,b,c,d,e,f,g");
        } else if ("B" == grade || !0 === isCareLevelChecked) {
            $("#upt_date_2_interval, #upt_date_3_interval, #upt_date_4_interval").text("5 Monate");
            $("#dynamicElements_1").after($("#date_2"));
            $("#dynamicElements_2").after($("#date_3"));
            $("#upt_date_5").val("");
            $("#date_5").hide();
            $("#upt_date_6").val("");
            $("#date_6").hide();
            $("#date_2").show();
            $("#date_3").show();
            $("#date_4").show();
            if (!0 === isCareLevelChecked) {
                $("#behandlungsmethodes_container_1").show();
                behandlungsmethodenInner(1, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(2, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(3, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(4, "a,b,c,d,e,f,g");
            } else {
              
                $("#behandlungsmethodes_container_1").show();
             
                behandlungsmethodenInner(1, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(2, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(3, "a,b,c,d,e,f,g");
                behandlungsmethodenInner(4, "a,b,c,d,e,f,g");
            }
        } else if ("C" == grade) {
            $("#upt_date_2_interval, #upt_date_3_interval, #upt_date_4_interval, #upt_date_5_interval, #upt_date_6_interval").text("3 Monate");
            $("#dynamicElements_1").after($("#date_2"));
            $("#date_2").after($("#date_3"));
            $("#date_2").show();
            $("#date_3").show();
            $("#date_4").show();
            $("#date_5").show();
            $("#date_6").show();
            $("#behandlungsmethodes_container_1").show();
            behandlungsmethodenInner(1, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(2, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(3, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(4, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(5, "a,b,c,d,e,f,g");
            behandlungsmethodenInner(6, "a,b,c,d,e,f,g");
        }
        if ($("#upt_date_1").val() && "" != $("#upt_date_1").val()) $("#upt_date_1").trigger("change");
    });

    // Trigger change event on grade field
    $("#schweregrad").trigger("change");

    // Event handler for changes in date fields
    $("#upt_date_1, #upt_date_2, #upt_date_3, #upt_date_4, #upt_date_5").on("change", function(event) {
        let selectedDate = new Date($(this).val()),
            originalDate = new Date(selectedDate),
            fieldId = $(this).attr("id");
            let weekType = $("#wochentyp").val();
            
        if ("" != selectedDate) {
            if ($("#js_upt_patrow").hasClass("hidden")) $("#js_upt_patrow").removeClass("hidden");
            if ($("#js_upt_btnrow").hasClass("hidden")) {
                $("#upt_patientnumber").attr("disabled", !1);
                $("#js_upt_btnrow").removeClass("hidden");
            }
            if ($("#uptJahr2_title").hasClass("hidden")) $("#uptJahr2_title").removeClass("hidden");
            if ("upt_date_1" == fieldId) {
                $(".upt_dateInner").removeClass("custom-adjustment custom-warning custom-error");
                $("#js_upt_msgrow").hide();
            }
            let grade = "A";
            if ($("#schweregrad").val().length > 0) grade = $("#schweregrad").val();
            let isCareLevelChecked = $("#pflegegrad").is(":checked");
            if ("A" == grade && "upt_date_1" == fieldId && !1 === isCareLevelChecked) {
                selectedDate.setMonth(selectedDate.getMonth() + 10);
                selectedDate.setDate(selectedDate.getDate() + 1);
                if (selectedDate.getFullYear() == originalDate.getFullYear()) selectedDate = new Date(selectedDate.getFullYear() + 1 + "-01-01");
                let nextYearDate = new Date(originalDate);
                nextYearDate.setFullYear(nextYearDate.getFullYear() + 1);
                nextYearDate.setDate(nextYearDate.getDate() + 1);
                if (nextYearDate > selectedDate) selectedDate = new Date(nextYearDate);
                let minDate, maxDate = new Date(selectedDate.getFullYear() + "-12-31");
                selectedDate = adjustDate(selectedDate, $("#wochentyp").val());
                minDate = new Date(selectedDate);
                let date1 = new Date($("#upt_date_1").val());
                date1.setFullYear(date1.getFullYear() + 2);
                if ("5" == $("#wochentyp").val()) {
                    if (6 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                    else if (0 == date1.getDay()) date1.setDate(date1.getDate() - 2);
                } else if ("6" == $("#wochentyp").val() && 0 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                if (maxDate > date1) maxDate = new Date(date1);
                if ("5" == $("#wochentyp").val()) {
                    if (6 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                    else if (0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 2);
                } else if ("6" == $("#wochentyp").val() && 0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                if ("" != $("#upt_date_2").val()) {
                    let date2 = new Date($("#upt_date_2").val());
                    if (!1 != areDatesEqual(date2, selectedDate) || $("#date_2 .upt_dateInner").hasClass("custom-adjustment")) $("#date_2 .upt_dateInner").addClass("custom-adjustment");
                } else {
                    $("#date_2 .upt_dateInner").removeClass("custom-adjustment custom-warning custom-error");
                }
                if (selectedDate < minDate || selectedDate > maxDate) {
                    $("#date_2 .upt_dateInner").removeClass("custom-adjustment custom-warning").addClass("custom-error");
                }
                let formattedDate = selectedDate.getFullYear() + "-" + ("0" + (selectedDate.getMonth() + 1)).slice(-2) + "-" + ("0" + selectedDate.getDate()).slice(-2),
                    formattedMinDate = minDate.getFullYear() + "-" + ("0" + (minDate.getMonth() + 1)).slice(-2) + "-" + ("0" + minDate.getDate()).slice(-2),
                    formattedMaxDate = maxDate.getFullYear() + "-" + ("0" + (maxDate.getMonth() + 1)).slice(-2) + "-" + ("0" + maxDate.getDate()).slice(-2);
                $("#upt_date_2").val(formattedDate);
                $("#upt_date_2").attr("min", formattedMinDate);
                $("#upt_date_2").attr("max", formattedMaxDate);
                $("#upt_date_2_min").text(minDate.toLocaleDateString("de-DE", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                }));
                $("#upt_date_2_max").text(maxDate.toLocaleDateString("de-DE", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit"
                }));
                enableDateInputs($("#date_2"));
                disableDateInputs($("#date_3"));
                disableDateInputs($("#date_4"));
                disableDateInputs($("#date_5"));
                disableDateInputs($("#date_6"));
            } else if ("B" == grade || !0 === isCareLevelChecked) {
                let index = parseInt(fieldId.substring(9)),
                    nextIndex = index + 1;
                if (nextIndex <= 4) {
                    selectedDate.setMonth(selectedDate.getMonth() + 5);
                    selectedDate.setDate(selectedDate.getDate() + 1);
                    if (5 >= originalDate.getMonth() && 5 >= selectedDate.getMonth()) selectedDate = new Date(selectedDate.getFullYear() + "-07-01");
                    else if (originalDate.getMonth() > 5 && selectedDate.getMonth() > 5 && 11 >= selectedDate.getMonth()) selectedDate = new Date(selectedDate.getFullYear() + 1 + "-01-01");
                    if (3 == nextIndex && !0 !== isCareLevelChecked) {
                        let date1 = new Date($("#upt_date_1").val());
                        date1.setFullYear(date1.getFullYear() + 1);
                        date1.setDate(date1.getDate() + 1);
                        if (date1 > selectedDate) selectedDate = new Date(date1);
                    }
                    let minDate, maxDate = new Date(5 >= selectedDate.getMonth() ? selectedDate.getFullYear() + "-06-30" : selectedDate.getFullYear() + "-12-31");
                    selectedDate = adjustDate(selectedDate, $("#wochentyp").val());
                    minDate = new Date(selectedDate);
                    let date1 = new Date($("#upt_date_1").val());
                    date1.setFullYear(date1.getFullYear() + 2);
                    if ("5" == $("#wochentyp").val()) {
                        if (6 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                        else if (0 == date1.getDay()) date1.setDate(date1.getDate() - 2);
                    } else if ("6" == $("#wochentyp").val() && 0 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                    if (maxDate > date1) maxDate = new Date(date1);
                    if ("5" == $("#wochentyp").val()) {
                        if (6 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                        else if (0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 2);
                    } else if ("6" == $("#wochentyp").val() && 0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                    if ("" != $("#upt_date_" + nextIndex).val()) {
                        let date2 = new Date($("#upt_date_" + nextIndex).val());
                        if (!1 != areDatesEqual(date2, selectedDate) || $("#date_" + nextIndex + " .upt_dateInner").hasClass("custom-adjustment")) $("#date_" + nextIndex + " .upt_dateInner").addClass("custom-adjustment");
                    } else {
                        $("#date_" + nextIndex + " .upt_dateInner").removeClass("custom-adjustment custom-warning custom-error");
                    }
                    if (selectedDate < minDate || selectedDate > maxDate) {
                        $("#date_" + nextIndex + " .upt_dateInner").removeClass("custom-adjustment custom-warning").addClass("custom-error");
                    }
                    let formattedDate = selectedDate.getFullYear() + "-" + ("0" + (selectedDate.getMonth() + 1)).slice(-2) + "-" + ("0" + selectedDate.getDate()).slice(-2),
                        formattedMinDate = minDate.getFullYear() + "-" + ("0" + (minDate.getMonth() + 1)).slice(-2) + "-" + ("0" + minDate.getDate()).slice(-2),
                        formattedMaxDate = maxDate.getFullYear() + "-" + ("0" + (maxDate.getMonth() + 1)).slice(-2) + "-" + ("0" + maxDate.getDate()).slice(-2);
                    $("#upt_date_" + nextIndex).val(formattedDate);
                    $("#upt_date_" + nextIndex).attr("min", formattedMinDate);
                    $("#upt_date_" + nextIndex).attr("max", formattedMaxDate);
                    $("#upt_date_" + nextIndex + "_min").text(minDate.toLocaleDateString("de-DE", {
                        year: "numeric",
                        month: "2-digit",
                        day: "2-digit"
                    }));
                    $("#upt_date_" + nextIndex + "_max").text(maxDate.toLocaleDateString("de-DE", {
                        year: "numeric",
                        month: "2-digit",
                        day: "2-digit"
                    }));
                    enableDateInputs($("#date_" + nextIndex));
                    $("#upt_date_" + nextIndex).trigger("change");
                    disableDateInputs($("#date_5"));
                    disableDateInputs($("#date_6"));
                }
            } else if ("C" == grade) {
                let index = parseInt(fieldId.substring(9)),
                    nextIndex = index + 1;
                if (nextIndex <= 6) {
                    selectedDate.setMonth(selectedDate.getMonth() + 3);
                    selectedDate.setDate(selectedDate.getDate() + 1);
                    if (3 >= originalDate.getMonth() && 3 >= selectedDate.getMonth()) selectedDate = new Date(selectedDate.getFullYear() + "-05-01");
                    else if (originalDate.getMonth() > 3 && 7 >= originalDate.getMonth() && selectedDate.getMonth() > 3 && 7 >= selectedDate.getMonth()) selectedDate = new Date(selectedDate.getFullYear() + "-09-01");
                    else if (originalDate.getMonth() > 7 && 11 >= originalDate.getMonth() && selectedDate.getMonth() > 7 && 11 >= selectedDate.getMonth()) selectedDate = new Date(selectedDate.getFullYear() + 1 + "-01-01");
                    if (4 == nextIndex) {
                        let date1 = new Date($("#upt_date_1").val());
                        date1.setFullYear(date1.getFullYear() + 1);
                        date1.setDate(date1.getDate() + 1);
                        if (date1 > selectedDate) selectedDate = new Date(date1);
                    }
                    let minDate, maxDate = new Date(3 >= selectedDate.getMonth() ? selectedDate.getFullYear() + "-04-30" : selectedDate.getMonth() > 3 && 7 >= selectedDate.getMonth() ? selectedDate.getFullYear() + "-08-31" : selectedDate.getFullYear() + "-12-31");
                    selectedDate = adjustDate(selectedDate, $("#wochentyp").val());
                    minDate = new Date(selectedDate);
                    let date1 = new Date($("#upt_date_1").val());
                    date1.setFullYear(date1.getFullYear() + 2);
                    if ("5" == $("#wochentyp").val()) {
                        if (6 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                        else if (0 == date1.getDay()) date1.setDate(date1.getDate() - 2);
                    } else if ("6" == $("#wochentyp").val() && 0 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                    if (maxDate > date1) maxDate = new Date(date1);
                    if ("5" == $("#wochentyp").val()) {
                        if (6 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                        else if (0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 2);
                    } else if ("6" == $("#wochentyp").val() && 0 == maxDate.getDay()) maxDate.setDate(maxDate.getDate() - 1);
                    if ("" != $("#upt_date_" + nextIndex).val()) {
                        let date2 = new Date($("#upt_date_" + nextIndex).val());
                        if (!1 != areDatesEqual(date2, selectedDate) || $("#date_" + nextIndex + " .upt_dateInner").hasClass("custom-adjustment")) $("#date_" + nextIndex + " .upt_dateInner").addClass("custom-adjustment");
                    } else {
                        $("#date_" + nextIndex + " .upt_dateInner").removeClass("custom-adjustment custom-warning custom-error");
                    }
                    if (selectedDate < minDate || selectedDate > maxDate) {
                        $("#date_" + nextIndex + " .upt_dateInner").removeClass("custom-adjustment custom-warning").addClass("custom-error");
                    }
                    let formattedDate = selectedDate.getFullYear() + "-" + ("0" + (selectedDate.getMonth() + 1)).slice(-2) + "-" + ("0" + selectedDate.getDate()).slice(-2),
                        formattedMinDate = minDate.getFullYear() + "-" + ("0" + (minDate.getMonth() + 1)).slice(-2) + "-" + ("0" + minDate.getDate()).slice(-2),
                        formattedMaxDate = maxDate.getFullYear() + "-" + ("0" + (maxDate.getMonth() + 1)).slice(-2) + "-" + ("0" + maxDate.getDate()).slice(-2);
                    $("#upt_date_" + nextIndex).val(formattedDate);
                    $("#upt_date_" + nextIndex).attr("min", formattedMinDate);
                    $("#upt_date_" + nextIndex).attr("max", formattedMaxDate);
                    $("#upt_date_" + nextIndex + "_min").text(minDate.toLocaleDateString("de-DE", {
                        year: "numeric",
                        month: "2-digit",
                        day: "2-digit"
                    }));
                    $("#upt_date_" + nextIndex + "_max").text(maxDate.toLocaleDateString("de-DE", {
                        year: "numeric",
                        month: "2-digit",
                        day: "2-digit"
                    }));
                    enableDateInputs($("#date_" + nextIndex));
                    $("#upt_date_" + nextIndex).trigger("change");
                }
            }
            if ("" != $(this).val() && (!0 == isWeekendOrHoliday(new Date($(this).val()), $("#wochentyp").val()) ? ($(this).closest(".upt_dateInner").hasClass("custom-adjustment") && $(this).closest(".upt_dateInner").removeClass("custom-adjustment"), $(this).closest(".upt_dateInner").hasClass("custom-error") && $(this).closest(".upt_dateInner").removeClass("custom-error"), $(this).closest(".upt_dateInner").hasClass("custom-warning") || $(this).closest(".upt_dateInner").addClass("custom-warning")) : $(this).closest(".upt_dateInner").hasClass("custom-warning") && $(this).closest(".upt_dateInner").removeClass("custom-warning")), "upt_date_1" != fieldId && "" != $(this).val() && $(this).attr("min") && $(this).attr("min").length > 0 && $(this).attr("max") && $(this).attr("max").length > 0) {
                let currentDate = new Date($(this).val()),
                    minDate = new Date($(this).attr("min")),
                    maxDate = new Date($(this).attr("max"));
                if (currentDate > maxDate || currentDate < minDate) {
                    $(this).closest(".upt_dateInner").hasClass("custom-adjustment") && $(this).closest(".upt_dateInner").removeClass("custom-adjustment");
                    $(this).closest(".upt_dateInner").hasClass("custom-warning") && $(this).closest(".upt_dateInner").removeClass("custom-warning");
                    $(this).closest(".upt_dateInner").hasClass("custom-error") || $(this).closest(".upt_dateInner").addClass("custom-error");
                } else {
                    $(this).closest(".upt_dateInner").hasClass("custom-error") && $(this).closest(".upt_dateInner").removeClass("custom-error");
                }
            }
        }
        let date1 = new Date($("#upt_date_1").val());
        date1.setFullYear(date1.getFullYear() + 2);
        if ("5" == $("#wochentyp").val()) {
            if (6 == date1.getDay()) date1.setDate(date1.getDate() - 1);
            else if (0 == date1.getDay()) date1.setDate(date1.getDate() - 2);
        } else if ("6" == $("#wochentyp").val() && 0 == date1.getDay()) date1.setDate(date1.getDate() - 1);
        if ($(".upt_dateField:visible").last().val().length > 0 && (new Date($(".upt_dateField:visible").last().val()) > date1)) {
            $("#js_upt_msgrow").show();
        } else if ($("#js_upt_msgrow").is(":visible")) {
            $("#js_upt_msgrow").hide();
        }
    });





    
    // Event handler for changes in the last date field
    $("#upt_date_6").on("change", function(event) {
        if ("" != $(this).val()) {
            let selectedDate = new Date($(this).val());
            if ($(this).attr("min") && $(this).attr("min").length > 0 && $(this).attr("max") && $(this).attr("max").length > 0) {
                let minDate = new Date($(this).attr("min")),
                    maxDate = new Date($(this).attr("max"));
                if (selectedDate < minDate || selectedDate > maxDate) {
                   
                    let date1 = new Date($("#upt_date_1").val());
                    date1.setFullYear(date1.getFullYear() + 2);
                    if ("5" == $("#wochentyp").val()) {
                        if (6 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                        else if (0 == date1.getDay()) date1.setDate(date1.getDate() - 2);
                    } else if ("6" == $("#wochentyp").val() && 0 == date1.getDay()) date1.setDate(date1.getDate() - 1);
                    if (selectedDate > date1) {
                        $("#js_upt_msgrow").show();
                    } else if ($("#js_upt_msgrow").is(":visible")) {
                        $("#js_upt_msgrow").hide();
                    }
                } else {
                    $(this).closest(".upt_dateInner").hasClass("custom-error") && $(this).closest(".upt_dateInner").removeClass("custom-error");
                    if (!0 == isWeekendOrHoliday(selectedDate, $("#wochentyp").val())) {
                      
                    } else {
                    }
                }
            }
        }
    });




   // Funktion zum Berechnen und Überprüfen von Datumsfeldern
    function validateDates() {
        let weekType = $("#wochentyp").val();

        const elements = ["#upt_date_1", "#upt_date_2", "#upt_date_3", "#upt_date_4", "#upt_date_5", "#upt_date_6"]
        // Alle relevanten Felder iterieren

        $("#upt_date_1, #upt_date_2, #upt_date_3, #upt_date_4, #upt_date_5, #upt_date_6").each(function () {
            let $input = $(this);
            let selectedDate = new Date($input.val());
            let $hintDiv = $input.closest(".upt_dateInner").find(".js_date_hint");

            // Hinweis zurücksetzen
            $hintDiv.removeClass("show").text("");

            if ($input.val() && isWeekendOrHoliday(selectedDate, weekType)) {
                // Warnung anzeigen, wenn Wochenende oder Feiertag
                $hintDiv.addClass("show").text("Das Datum fällt auf ein Wochenende oder einen Feiertag.");
            }
        });
    }

    // Event-Handler für alle Datumsfelder
    $("#upt_date_1, #upt_date_2, #upt_date_3, #upt_date_4, #upt_date_5, #upt_date_6").on("change", function () {
        validateDates(); // Alle Felder prüfen
    });



});
