
function toggle(source) {
    const checkboxes = document.querySelectorAll('.checkbox__input');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = source.checked;
    });
}