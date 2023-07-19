// FUNCTIONS

// importing from table_actions.js file
import { saveTableData } from "./table_actions.js";
import { loadTableData } from "./table_actions.js";
import { clearTable } from "./table_actions.js";

// MAIN SCRIPT:
// Making the buttons to run only when the DOMContent of the webpage is loaded
document.addEventListener("DOMContentLoaded", () => {
  // Load table data from local storage
  loadTableData(".drugs-table-data");

  // Functionality for the 'search' button:
  document.querySelector(".btn-search").addEventListener("click", (event) => {
    event.preventDefault(); // prevent refreshing

    // Get form data
    const formData = new FormData(document.querySelector(".drug-search"));

    // Get the name and value of the submit button
    const buttonName = event.target.name;
    const buttonValue = event.target.value;

    // Append the name and value of the submit button to the form data
    formData.append(buttonName, buttonValue);

    fetch("../../search/search_drugs.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json()) //parse the json data
      .then((data) => {
        if (data.success) {
          window.location.href =
            "/user_menu/pharmacy_options/dispense_drugs.php?error=none";
          alert("Data retrieved successfully!");
        } else if (data.error) {
          // An error occurred
          alert(data.error); // alert sent on webpage
          console.log(data.error); // log the error onto the console
        }
      });
  });

  document.querySelector(".btn-add").addEventListener("click", () => {
    // Get drug details
    const drugDetails = document.querySelector(".drug-details");
    const prescriptionId = drugDetails
      .querySelector("span:nth-child(1)")
    . textContent.split(": ")[1];
    const drugId = drugDetails
      .querySelector("span:nth-child(2)")
      .textContent.split(": ")[1];
    const tradeName = drugDetails
      .querySelector("span:nth-child(3)")
      .textContent.split(": ")[1];
    const formula = drugDetails
      .querySelector("span:nth-child(4)")
      .textContent.split(": ")[1];
    const administration = drugDetails
      .querySelector("span:nth-child(5)")
      .textContent.split(": ")[1];
    const dosage = drugDetails
      .querySelector("span:nth-child(6)")
      .textContent.split(": ")[1];
    const quantity = drugDetails
      .querySelector("span:nth-child(7)")
      .textContent.split(": ")[1];
    const price = drugDetails
      .querySelector("span:nth-child(8)")
      .textContent.split(": ")[1];
    const expiryDate = drugDetails
      .querySelector("span:nth-child(9)")
      .textContent.split(": ")[1];

    // Check if any of the input fields are empty
    if (
      !prescriptionId ||
      !drugId ||
      !tradeName ||
      !formula ||
      !administration ||
      !dosage ||
      !quantity ||
      !price ||
      !expiryDate
    ) {
      alert("Blank records cannot be added.");
      return;
    }

    // Check if a row with the same Drug ID already exists in the table
    const rows = document.querySelectorAll(".drugs-table-data tr");
    let duplicateFound = false;
    rows.forEach((row) => {
      const rowDrugId = row.querySelector("td:nth-child(2)").textContent;
      if (rowDrugId === drugId) {
        duplicateFound = true;
      }
    });

    // If no duplicate was found, add new row to the table
    if (!duplicateFound) {
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
          <td>${prescriptionId}</td>
          <td>${drugId}</td>
          <td>${tradeName}</td>
          <td>${formula}</td>
          <td>${administration}</td>
          <td>${dosage}</td>
          <td>${quantity}</td>
          <td>${price}</td>
          <td>${expiryDate}</td>
        `;
      document.querySelector(".drugs-table-data").appendChild(newRow);
      alert("Record added!");
      saveTableData(".drugs-table-data");
    } else {
      alert("A record with this Drug ID already exists in the table.");
    }
  });

  // Functionality for the 'clear' button
  document.querySelector(".btn-clear").addEventListener("click", () => {
    clearTable(".drugs-table-data tr");
  });

  // Functionality for the 'dispense' button
  document.querySelector(".btn-dispense").addEventListener("click", () => {
    // Get all rows in the table
    const rows = document.querySelectorAll(".drugs-table-data tr");
    // Create an array to hold the drug data
    const dispensedDrugs = [];
    // Loop through each row and get the Drug ID, Quantity, and Price
    rows.forEach((row) => {
      const prescriptionId = row.querySelector("td:nth-child(1)").textContent;
      const drugId = row.querySelector("td:nth-child(2)").textContent;
      const quantity = row.querySelector("td:nth-child(7)").textContent;
      const drugPrice = row.querySelector("td:nth-child(8)").textContent;

      // push the data to dispensed drugs as an object
      dispensedDrugs.push({prescriptionId, drugId, quantity, drugPrice});
    });

    // Send data to server using an AJAX request
    const xhr = new XMLHttpRequest();

    // Opening a request to the PHP Server
    xhr.open("POST", "../../process/dispense-drugs.process.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = () => {
      if (xhr.status === 200) {
        // Request was successful
        console.log(xhr.responseText);
        alert('Request successful');
      } else {
        // Request failed
        console.error(xhr.responseText);
      }
    };
    xhr.send(JSON.stringify(dispensedDrugs)); // sending the data
  });



});
