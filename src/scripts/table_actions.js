//FUNCTIONS

//Save the data of the html table
export function saveTableData(selector) {
    // Get all rows in the table
    const rows = document.querySelectorAll(`${selector} tr`);
    // Create an array to hold the data for each row
    const rowData = [];
    // Loop through each row and get the data for each cell
    rows.forEach((row) => {
      const cells = row.querySelectorAll("td");
      const rowValues = [];
      cells.forEach((cell) => {
        rowValues.push(cell.textContent);
      });
      rowData.push(rowValues);
    });
    // Save the data to local storage
    localStorage.setItem("tableData", JSON.stringify(rowData));
  }


//Load data onto the html table
export function loadTableData(selector) {
    // Check if there is any data in local storage
    if (localStorage.getItem("tableData")) {
      // Get the data from local storage
      const rowData = JSON.parse(localStorage.getItem("tableData"));
      // Loop through each row of data and create a new row in the table
      rowData.forEach((rowValues) => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
          <td>${rowValues[0]}</td>
          <td>${rowValues[1]}</td>
          <td>${rowValues[2]}</td>
          <td>${rowValues[3]}</td>
          <td>${rowValues[4]}</td>
          <td>${rowValues[5]}</td>
          <td>${rowValues[6]}</td>
          <td>${rowValues[7]}</td>
        `;
        document.querySelector(`${selector}`).appendChild(newRow);
      });
    }
  }


// Clear data from the table
export function clearTable(selector) {
    // Remove all rows from the table
    const rows = document.querySelectorAll(`${selector}`);
    rows.forEach((row) => row.remove());
    // Clear data from local storage
    localStorage.removeItem("tableData");
  }