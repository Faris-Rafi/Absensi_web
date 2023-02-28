const selects = document.querySelectorAll("select");
const filterForm = document.getElementById("filter-form");
selects.forEach((select) => {
    select.addEventListener("change", function() {
    filterForm.submit();
    const userId = document.getElementById("nameFilter").value;
    const year = document.getElementById("yearFilter").value;
    const date = document.getElementById("dateFilter").value;
    let url = "/dashboard/riwayat-absen/filter?";
    if (userId) {
        url += "userId=" + userId;
    }
    if (year) {
        url += "year=" + year;
    }
    if (date) {
        url += "date=" + date;
    }
    window.location.search = url;
});
})
