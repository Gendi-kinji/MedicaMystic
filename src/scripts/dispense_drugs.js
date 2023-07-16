
// Script for dispense_drugs page

// FUNCTIONS
// function to repopulate table data:
function repopulateTable(){

  // Get table data from cookie
  const cookies = document.cookie.split('; ');
  const tableDataCookie = cookies.find(cookie => cookie.startsWith('tableData='));
  const tableData = JSON.parse(tableDataCookie.split('=')[1]);

  // Get reference to table body
  const tableBody = document.querySelector('.drugs-table-data');

  // Clear existing table rows
  tableBody.innerHTML = '';

  // Repopulate table with data
  tableData.forEach(item => {
  // Create new row
  const newRow = document.createElement('tr');

  // Create cells for each data item
  const drugIdCell = document.createElement('td');
  drugIdCell.textContent = item.drugId;
  newRow.appendChild(drugIdCell);

  const tradeNameCell = document.createElement('td');
  tradeNameCell.textContent = item.tradeName;
  newRow.appendChild(tradeNameCell);

  const formulaCell = document.createElement('td');
  formulaCell.textContent = item.formula;
  newRow.appendChild(formulaCell);

  const administrationCell = document.createElement('td');
  administrationCell.textContent = item.administration;
  newRow.appendChild(administrationCell);

  const priceCell = document.createElement('td');
  priceCell.textContent = item.price;
  newRow.appendChild(priceCell);

  const expiryDateCell = document.createElement('td');
  expiryDateCell.textContent = item.expiryDate;
  newRow.appendChild(expiryDateCell);

  // Append new row to table body
  tableBody.appendChild(newRow);
  });

}


// MAIN SCRIPT - this will be run in the site

// Making the buttons to run only when the DOMContent of the webpage is loaded
document.addEventListener('DOMContentLoaded', ()=>{
  // Functionality for <button class="btn-search">:
  document.querySelector('.btn-search').addEventListener('click', (event) => {
    event.preventDefault(); //Prevent refreshing
    
    // Get form data
    const formData = new FormData(document.querySelector('.drug-search'));

    // Get the name and value of the submit button
    const buttonName = event.target.name;
    const buttonValue = event.target.value;
    
    // Append the name and value of the submit button to the form data
    formData.append(buttonName, buttonValue);
  
    // Get reference to table body
    const tableBody = document.querySelector('.drugs-table-data');

    // Get table data from DOM
    const tableData = Array.from(tableBody.rows).map(row => {
      const cells = row.cells;
      return {
        drugId: cells[0].textContent,
        tradeName: cells[1].textContent,
        formula: cells[2].textContent,
        administration: cells[3].textContent,
        price: cells[4].textContent,
        expiryDate: cells[5].textContent
      };
    });

    // Set the table data in a cookie
    document.cookie = `tableData=${JSON.stringify(tableData)}`;

    fetch('../../search/search_drugs.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json()) // response handling
    .then(data => {
      if (data.success) {
        // Successful submission:
        alert('Record retrieved.')
        window.location.href = '/user_menu/pharmacy_options/dispense_drugs.php?error=none';
      } else if (data.error) {
        // An error occurred
        console.error(data.error);
      }
    });
  });



  // Functionality for <button class="btn-add">:
  document.querySelector('.btn-add').addEventListener('click', () => {
    // Get drug details by using the query selector method of the document object.
    const drugDetails = document.querySelector('.drug-details');
    const drugId = drugDetails.querySelector('span:nth-child(1)').textContent.split(': ')[1];
    const tradeName = drugDetails.querySelector('span:nth-child(2)').textContent.split(': ')[1];
    const formula = drugDetails.querySelector('span:nth-child(3)').textContent.split(': ')[1];
    const administration = drugDetails.querySelector('span:nth-child(4)').textContent.split(': ')[1];
    const price = drugDetails.querySelector('span:nth-child(5)').textContent.split(': ')[1];
    const expiryDate = drugDetails.querySelector('span:nth-child(6)').textContent.split(': ')[1];
  
    // Create new row using the createElement method of the document object
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>${drugId}</td>
      <td>${tradeName}</td>
      <td>${formula}</td>
      <td>${administration}</td>
      <td>${price}</td>
      <td>${expiryDate}</td>
    `;
  
    // Add new row to the selected drugs table
    document.querySelector('.drugs-table-data').appendChild(newRow);
    alert('Record added!');
  });
});
  