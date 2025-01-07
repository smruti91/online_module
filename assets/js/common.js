// Function to create the table
function createQueryTable(data, headers, cellMapping) {
    const container = document.getElementById('queryTableContainer');

    // Clear any existing content in the container
    container.innerHTML = '';

    // Create the table element
    const table = document.createElement('table');
    table.className = 'table table-bordered table-striped';

    // Create the table header
    const thead = document.createElement('thead');
    const headerRow = document.createElement('tr');

    headers.forEach(headerText => {
        const th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Create the table body
    const tbody = document.createElement('tbody');

    data.forEach(item => {
        const row = document.createElement('tr');

        // Map the cells dynamically based on the cellMapping
        const cells = cellMapping.map(mapping => {
            const value = mapping(item);
            return value !== undefined ? value : 'N/A'; // Default to 'N/A' if value is undefined
        });

        cells.forEach(cellText => {
            const td = document.createElement('td');
            td.textContent = cellText;
            row.appendChild(td);
        });

        tbody.appendChild(row);
    });

    table.appendChild(tbody);
    container.appendChild(table);
}
