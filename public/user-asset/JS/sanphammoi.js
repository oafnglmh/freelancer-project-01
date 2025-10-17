const checkboxes = document.querySelectorAll('input[name="groupcheck"]');
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", function() {
        checkboxes.forEach((cb) => {
            if (cb !== this) {
                cb.checked = false;
            }
        });
    });
});