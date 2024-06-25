dayjs.locale("fr");
const Calendar = tui.Calendar;
const calendar = new Calendar("#calendar", {
    defaultView: "month",
    usageStatictics: false,
    month: {
        dayNames: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        visibleWeeksCount: 4,
    },
    theme: {
        month: {
            moreView: {
                border: "1px solid grey",
                boxShadow: "0 2px 6px 0 grey",
                backgroundColor: "white",
                width: 320,
                height: 200,
                top: 0,
            },
        },
    },
    template: {
        time(event) {
            const { id, title, start } = event;
            return `<a href="/admin/bookings/update/${id}"><div onclick="" class="text-center bg-primary text-white">${dayjs(
                start
            ).format("hh:mm")} ${title}</div></a>`;
        },
    },
    calendars: [
        {
            id: "bookings",
            name: "Bookings",
        },
    ],
});

const capitalize = (string) => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

const setYearAndMonth = () => {
    let currentDate = calendar.getDateRangeStart();
    $(".date-range").text(capitalize(dayjs(currentDate).format("MMMM/YYYY")));
};

setYearAndMonth();

const next = () => {
    calendar.move(1);
    setYearAndMonth();
};
const prev = () => {
    calendar.move(-1);
    setYearAndMonth();
};
