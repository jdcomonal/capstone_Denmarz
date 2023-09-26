
// Get the input field and table
const searchInput = document.getElementById('searchInput');
const table = document.getElementById('myTable');
const rows = table.getElementsByTagName('tr');

// Add an event listener to the search input
searchInput.addEventListener('keyup', function () {
    const filter = searchInput.value.toLowerCase();

    // Loop through all table rows and hide those that don't match the search input
    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName('td');
        let shouldHide = true;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const text = cell.textContent || cell.innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    shouldHide = false;
                    break;
                }
            }
        }

        row.style.display = shouldHide ? 'none' : '';
    }
});
