//FUNCTIONS

//Save the data of the html table
function saveTableData() {
  // Get all rows in the table
  const rows = document.querySelectorAll('.drugs-table-data tr');
  // Create an array to hold the data for each row
  const rowData = [];
  // Loop through each row and get the data for each cell
  rows.forEach(row => {
    const cells = row.querySelectorAll('td');
    const rowValues = [];
    cells.forEach(cell => {
      rowValues.push(cell.textContent);
    });
    rowData.push(rowValues);
  });
  // Save the data to local storage
  localStorage.setItem('tableData', JSON.stringify(rowData));
}

//Load data onto the html table
function loadTableData() {
  // Check if there is any data in local storage
  if (localStorage.getItem('tableData')) {
    // Get the data from local storage
    const rowData = JSON.parse(localStorage.getItem('tableData'));
    // Loop through each row of data and create a new row in the table
    rowData.forEach(rowValues => {
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>${rowValues[0]}</td>
        <td>${rowValues[1]}</td>
        <td>${rowValues[2]}</td>
        <td>${rowValues[3]}</td>
        <td>${rowValues[4]}</td>
        <td>${rowValues[5]}</td>
      `;
      document.querySelector('.drugs-table-data').appendChild(newRow);
    });
  }
}

// Clear data from the table
function clearTable(){
  // Remove all rows from the table
  const rows = document.querySelectorAll('.drugs-table-data tr');
  rows.forEach(row => row.remove());
  // Clear data from local storage
  localStorage.removeItem('tableData');
}




// MAIN SCRIPT:
// Making the buttons to run only when the DOMContent of the webpage is loaded
document.addEventListener('DOMContentLoaded', ()=>{
  // Load table data from local storage
  loadTableData();

    // Functionality for the 'search' button:
    document.querySelector('.btn-search').addEventListener('click', (event) => {
      event.preventDefault(); //Prevent refreshing
      
      // Get form data
      const formData = new FormData(document.querySelector('.drug-search'));
  
      // Get the name and value of the submit button
      const buttonName = event.target.name;
      const buttonValue = event.target.value;
      
      // Append the name and value of the submit button to the form data
      formData.append(buttonName, buttonValue);
  
      fetch('../../search/search_drugs.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) // response handling
      .then(data => {
        if (data.success) {
          window.location.href = '/user_menu/pharmacy_options/dispense_drugs.php?error=none';
        } else if (data.error) {
          // An error occurred
          console.error(data.error);
        }
      });
    });
  
  
  
    document.querySelector('.btn-add').addEventListener('click', () => {
      // Get drug details
      const drugDetails = document.querySelector('.drug-details');
      const drugId = drugDetails.querySelector('span:nth-child(1)').textContent.split(': ')[1];
      const tradeName = drugDetails.querySelector('span:nth-child(2)').textContent.split(': ')[1];
      const formula = drugDetails.querySelector('span:nth-child(3)').textContent.split(': ')[1];
      const administration = drugDetails.querySelector('span:nth-child(4)').textContent.split(': ')[1];
      const price = drugDetails.querySelector('span:nth-child(5)').textContent.split(': ')[1];
      const expiryDate = drugDetails.querySelector('span:nth-child(6)').textContent.split(': ')[1];
    
      // Check if a row with the same Drug ID already exists in the table
      const rows = document.querySelectorAll('.drugs-table-data tr');
      let duplicateFound = false;
      rows.forEach(row => {
        const rowDrugId = row.querySelector('td:nth-child(1)').textContent;
        if (rowDrugId === drugId) {
          duplicateFound = true;
        }
      });
    
      // If no duplicate was found, add new row to the table
      if (!duplicateFound) {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td>${drugId}</td>
          <td>${tradeName}</td>
          <td>${formula}</td>
          <td>${administration}</td>
          <td>${price}</td>
          <td>${expiryDate}</td>
        `;
        document.querySelector('.drugs-table-data').appendChild(newRow);
        alert('Record added!');
        saveTableData();
      } else {
        alert('A record with this Drug ID already exists in the table.');
      }
    });
    

    // Functionality for the 'clear' button
    document.querySelector('.btn-clear').addEventListener('click', () => {
      clearTable();
    });


    // Functionality for the 'dispense' button
    document.querySelector('.btn-dispense').addEventListener('click', () => {
      document.querySelector('.btn-dispense').addEventListener('click', () => {
        // Get all rows in the table
        const rows = document.querySelectorAll('.drugs-table-data tr');
        // Create an array to hold the Drug IDs
        const drugIds = [];
        // Loop through each row and get the Drug ID
        rows.forEach(row => {
          const drugId = row.querySelector('td:nth-child(1)').textContent;
          drugIds.push(drugId);
        });
      
        // Send data to server using an AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'dispense-drugs.process.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = () => {
          if (xhr.status === 200) {
            // Request was successful
            console.log(xhr.responseText);
          } else {
            // Request failed
            console.error(xhr.responseText);
          }
        };
        xhr.send(JSON.stringify(drugIds));
      });
      
    
    
  });