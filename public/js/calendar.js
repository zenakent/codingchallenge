const APIURL = "/api";

document.addEventListener("DOMContentLoaded", async function() {
    const response = await fetch(APIURL);
    const foundEvents = await response.json();
    let calendarEl = document.getElementById("calendar");

    let calendar = new FullCalendar.Calendar(calendarEl, {
        aspectRatio: 2,
        plugins: ["interaction", "dayGrid"],
        editable: true,
        events: foundEvents
    });
    calendar.render();

    document.getElementById("postData").addEventListener("submit", postData);

    async function postData(event) {
        event.preventDefault();
        let title = document.getElementById("title").value;
        let startRecur = document.getElementById("startRecur").value;
        let endRecur = document.getElementById("endRecur").value;
        let daysOfWeek = getCheckedBoxes("daysOfWeek[]");
        let token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        function getCheckedBoxes(chkBoxName) {
            let checkboxes = document.getElementsByName(chkBoxName);
            let checkboxesChecked = [];

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkboxesChecked.push(checkboxes[i].value);
                }
            }
            return checkboxesChecked;
        }

        let obj = {
            title: title,
            daysOfWeek: daysOfWeek,
            startRecur: startRecur,
            endRecur: endRecur
        };

        const response = await fetch(APIURL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify(obj)
        });

        calendar.addEvent(obj);
        // const alert = document.getElementById("alert");
        $("#bootAlert").append(
            `<div class="alert alert-success" id="alert" role="alert">Event Saved!</div>`
        );
        setTimeout(function() {
            document.getElementById("alert").remove();
        }, 2000);
    }
});
