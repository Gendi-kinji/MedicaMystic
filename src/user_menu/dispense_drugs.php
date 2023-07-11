<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/dispense_drugs.css">
    <title>Dispense Drugs</title>
</head>
<body>
    <div class="topbar">
        <h1>MedicaMystic Dispensary</h1>
    </div>
    <div class="maincontainer">
        <div class="main-header">
            <h2>Dispense Drugs</h2>
        </div>
        <div class="main-content">
            <div class="main-left">
                <div class="drug-search">
                    <div class="search-labels">
                        <span>Search by ID:</span>
                        <span>Search by name:</span>
                    </div>
                    <div class="search-dropdowns">
                        <select class="drug_ids" name="drug_id">
                            <option value="Paracetamol">Paracetamol</option>
                        </select>
                        <select class="trade_names" name="trade_name">
                            <option value="RegenX">RegenX</option>
                        </select>
                    </div>
                    <div class="search-button">
                        <button type="button" class="btn-actions btn-search">Search</button>     
                    </div>     
                </div>
                <br>
                <div class="drug-details-container">
                    <div class="drug-details">
                        <span>Trade Name:<span></span></span>
                        <span>Dosage:<span></span></span>
                        <span>Quantity:<span></span></span>
                        <span>Drug Price:<span></span></span>
                        <span>Expiry date:<span></span></span>
                    </div>
                    <div class="add-button">
                        <button type="button" class="btn-actions btn-add">Add</button>
                    </div>
                </div>
            </div>
    
            <div class="main-right">
                <table class="drugs-table">
                    <thead>
                        <tr>
                            <th scope="col">Item number</th>
                            <th scope="col">Trade name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Drug price</th>
                            <th scope="col">Expiry date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="table-buttons">
                    <button type="button" class="btn-actions btn-dispense">Dispense</button>
                    <button type="button" class="btn-actions btn-clear">Clear</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>