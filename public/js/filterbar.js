function showDropdown(id) {
    //If multiple were clicked they can accidentally hover over each other, so the other have to get hidden
    const all_dropdowns = document.getElementsByClassName("dropdown-content");
    const clicked_dropdown = document.getElementById(id);
    for (let i = 0; i < all_dropdowns.length; i++) {
        if (all_dropdowns[i] === clicked_dropdown) {
            continue
        }
        all_dropdowns[i].classList.remove("show");
    }
    //Finally toggle show
    clicked_dropdown.classList.toggle("show");
}


function filter(search_id, dropdown_id) {
    const input = document.getElementById(search_id);
    const filter = input.value.toUpperCase();
    const a = document.getElementById(dropdown_id).getElementsByTagName("a");
    for (let i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
