document.addEventListener('DOMContentLoaded', function() {
    let formulario = document.querySelector("form");
    var calendarEl = document.getElementById('agendaDash');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'listWeek',
        locale: "es",
        month: 'short',
        day: 'numeric',
        events: [{
                title: 'Entregar Avance de Proyecto',
                start: '2021-05-28T10:30:00',
                extendedProps: {
                    status: 'done'
                }
            },
            {
                title: 'Cita con Dentista',
                start: '2021-05-30T07:00:00',
                backgroundColor: 'green',
                extendedProps: {
                    status: 'done'
                }
            }
        ],

        dateClick: function(info) {
            $("#evento").modal("show");
        },
        eventDidMount: function(info) {
            if (info.event.extendedProps.status === 'done') {
                // Change background color of row
                info.el.style.backgroundColor = 'lightgray';
                // Change color of dot marker
                var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                if (dotEl) {
                    dotEl.style.backgroundColor = 'white';
                }
            }
        }
    });
    calendar.render();
    document.getElementById("btnGuardar").addEventListener("click", function() {
        const datos = new FormData(formulario);
        console.log(datos);
        axios.post("http://istudent.test/agendas/agendaPersonal/agregar", datos).
        then(
            (respuesta) => {
                $("#evento").modal("hide");
            }
        ).catch(
            error => {
                if (error.response) {
                    console.log(error.response.data);
                }
            }
        )
    });
});