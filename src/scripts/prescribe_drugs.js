// Import functions from table_actions.js
import { saveTableData } from "./table_actions.js";
import { loadTableData } from "./table_actions.js";
import { clearTable } from "./table_actions.js";


document.addEventListener("DOMContentLoaded", () => {
    // Load table data from local storage
  loadTableData(".prescriptions-table-data");

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
            "/user_menu/doctor_options/prescribe_drugs.php?error=none";
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
      const prescriptionDetails = document.querySelector(".prescription-details");
      const patientSSN = prescriptionDetails
        .querySelector("span:nth-child(1)")
        .textContent.split(": ")[1];
      const drugId = prescriptionDetails
        .querySelector("span:nth-child(2)")
        .textContent.split(": ")[1];
      const tradeName = prescriptionDetails
        .querySelector("span:nth-child(3)")
        .textContent.split(": ")[1];
      const formula = prescriptionDetails
        .querySelector("span:nth-child(4)")
        .textContent.split(": ")[1];
      const quantity = prescriptionDetails
        .querySelector("span:nth-child(5)")
        .textContent.split(": ")[1];
      const dosage = prescriptionDetails
        .querySelector("span:nth-child(6)")
        .textContent.split(": ")[1];
      const dosageSchedule = prescriptionDetails
        .querySelector("span:nth-child(7)")
        .textContent.split(": ")[1];
      const prescriptionDate = prescriptionDetails
        .querySelector("span:nth-child(8)")
        .textContent.split(": ")[1];
    
      // Check if any of the input fields are empty
      if (
          !patientSSN ||
          !drugId ||
          !tradeName ||
          !formula ||
          !quantity ||
          !dosage ||
          !dosageSchedule ||
          !prescriptionDate
      ) {
          alert("Blank records cannot be added.");
          return;
        }
    
      // Check if a row with the same Drug ID already exists in the table
      const rows = document.querySelectorAll(".prescriptions-table-data tr");
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
              <td>${patientSSN}</td>
              <td>${drugId}</td>
              <td>${tradeName}</td>
              <td>${formula}</td>
              <td>${quantity}</td>
              <td>${dosage}</td>
              <td>${dosageSchedule}</td>
              <td>${prescriptionDate}</td>
            `;
          document.querySelector(".prescriptions-table-data").appendChild(newRow);
          alert("Record added!");
          saveTableData(".prescriptions-table-data");
      } else {
          alert("A record with this Drug ID already exists in the table.");
      }
    });

  // Functionality for the 'clear' button
  document.querySelector(".btn-clear").addEventListener("click", () => {
      clearTable(".drugs-table-data tr");
    });



  // Functionality for the 'dispense' button
  document.querySelector(".btn-prescribe").addEventListener("click", () => {
    // Get all rows in the table
    const rows = document.querySelectorAll(".drugs-table-data tr");
    // Create an array to hold the drug data
    const dispensedDrugs = [];
    // Loop through each row and get the Drug ID, Quantity, and Price
    rows.forEach((row) => {
      const patientSSN = row.querySelector("td:nth-child(1)").textContent;
      const drugId = row.querySelector("td:nth-child(2)").textContent;
      const prescribedQuantity = row.querySelector("td:nth-child(5)").textContent;
      const dosageSchedule = row.querySelector("td:nth-child(6)").textContent;
      const prescriptionDate = row.querySelector("td:nth-child(7)").textContent;

      // push the data to prescribed drugs as an object
      prescribedDrugs.push({patientSSN, drugId, prescribedQuantity, dosageSchedule, prescriptionDate});
    });

    // Send data to server using an AJAX request
    const xhr = new XMLHttpRequest();

    // Opening a request to the PHP Server
    xhr.open("POST", "../../process/prescribe-drugs.process.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = () => {
      if (xhr.status === 200) {
        // Request was successful
        console.log(xhr.responseText);
        alert('Drugs dispensed successfully!');
      } else {
        // Request failed
        console.error(xhr.responseText);
      }
    };
    xhr.send(JSON.stringify(dispensedDrugs)); // sending the data
  });


});