
// Script for dispense_drugs page

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

      // Send form data to the server using the fetch API
      fetch('../../search/search_drugs.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) // response handling
      .then(data => {
        if (data.success) {
          // Successful submission, relocates back to page:
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
  