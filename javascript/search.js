document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchValue = this.value.trim().toLowerCase();
        let courseNameCells = document.querySelectorAll('.course-table tbody td:nth-child(1), .course-table tbody td:nth-child(2)'); // Target both "Course Name" and "Part" columns

        // Loop through each cell in the targeted columns
        courseNameCells.forEach(cell => {
            let cellText = cell.textContent.toLowerCase();

            // If the search value is found in the cell text, highlight it
            if (cellText.includes(searchValue)) {
                let regex = new RegExp(searchValue, 'gi');
                let highlightedCellText = cellText.replace(regex, match => `<span class="highlight">${match}</span>`);

                // Update the text content of the cell with highlighted text
                cell.innerHTML = highlightedCellText;
            } else {
                // If not found, revert to the original content (remove highlighting)
                cell.innerHTML = cell.innerHTML.replace(/<\/?span[^>]*>/g, ''); // Remove existing highlight spans
            }
        });
    });
});
