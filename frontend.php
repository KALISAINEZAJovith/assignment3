  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICDL - International Computer Driving License</title>
    <style>
      /* Base Styles */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
      }

      body {
        background-color: #fff;
        color: #222;
      }

      .container {
        width: 100%;
        margin: 0 auto;
        border: 3px solid #000;
      }

      /* Header Styles */

      .header img {
        width: 100%;
        height: auto;
        color: white;
        display: flex;
        border-bottom: 3px solid #000;
      }

      /* Main Content Styles */
      .main-content {
        display: flex;
        border-bottom: 3px solid #000;
      }

      .read-more {
        display: inline-block;
        margin-top: 10px;
        color: white;
        text-decoration: underline;
      }

      .iste-badge-container {
        width: 33.33%;
        display: flex;
        align-items: center;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 15px;
        text-align: center;
      }

      /* Pension Management System Styles */
      .pension-container {
        width: 33.33%;
        padding: 0;
        background-color: #fff;
        border-left: 3px solid #000;
        border-right: 3px solid #000;
      }

      .pension-header {
        background-color: #f0f0f0;
        padding: 8px;
        text-align: center;
        font-weight: bold;
        border-bottom: 1px solid black;
      }

      .form-section {
        padding: 8px;
      }

      .form-row {
        display: flex;
        margin-bottom: 1px;
        align-items: center;
      }

      .form-label {
        width: 150px;
        text-align: right;
        padding-right: 10px;
        font-size: 14px;
      }

      .form-input {
        flex-grow: 1;
      }

      input[type="text"] {
        width: 100%;
        box-sizing: border-box;
        padding: 3px;
      }

      .output-section {
        padding: 1px;
      }

      .output-row {
        display: flex;
        margin-bottom: 1px;
        align-items: center;
      }

      .output-label {
        width: 150px;
        font-weight: bold;
      }

      .output-value {
        flex-grow: 1;
      }

      .actions {
        text-align: center;
        padding: 10px 0 15px;
        border-top: 1px solid black;
      }

      button {
        margin: 0 5px;
        padding: 3px 10px;
      }

      /* Programmes Section */
      .programmes-section {
        text-align: center;
      }

      .programmes-heading {
        padding: 10px 0;
        font-size: 18px;
        font-weight: bold;
        border-bottom: 3px solid #000;
        text-align: center;
      }

      .programmes-grid {
        display: flex;
      }

      .programme-card {
        width: 20%;
        padding: 15px 10px;
        color: white;
        text-align: center;
        border-right: 3px solid #000;
      }

      .programme-card:last-child {
        border-right: none;
      }

      .programme-card h3 {
        font-size: 14px;
        margin-bottom: 5px;
      }

      .programme-card p {
        font-size: 12px;
      }

      .workforce-card {
        background-color: #00a2e8;
      }

      .professional-card {
        background-color: #001833;
      }

      .insights-card {
        background-color: #001826;
      }

      .digital-student-card {
        background-color: #4ca73b;
      }

      .digital-citizen-card {
        background-color: #ff00ff;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <!-- Header -->
      <div class="header">
        <img src="./1 (4).jpeg" alt="">
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <!-- ICDL Info Panel -->
        <div class="info-panel">
          <div class="info-panel-content">
            <img src="./1 (3).jpeg" alt="">
          </div>
        </div>

        <!-- Employee Pension Management System -->
        <form action="./backend.php" id="employeeForm" method="POST" class="pension-container">
          <div class="pension-header">
            EMPLOYEE PENSION MANAGEMENT SYSTEM:
          </div>

          <div class="form-section">
            <input type="hidden" name="id" id="employeeId">
            <div class="form-row">
              <div class="form-label">EMPLOYEE NAMES:</div>
              <div class="form-input"><input type="text" name="names"></div>
            </div>

            <div class="form-row">
              <div class="form-label">EMPLOYEE ADDRESS:</div>
              <div class="form-input"><input type="text" name="address"></div>
            </div>

            <div class="form-row">
              <div class="form-label">MONTHLY SALARY:</div>
              <div class="form-input"><input type="text" name="salary"></div>
            </div>

            <div class="form-row">
              <div class="form-label">EMPLOYMENT PERIOD:</div>
              <div class="form-input"><input type="text" name="period"></div>
            </div>

            <div class="form-row">
              <div class="form-label">benefit IN %:</div>
              <div class="form-input"><input type="text" name="benefit"></div>
            </div>
          </div>

          <div class="button-section">
          <button type="button" onclick="calculatePension()">CLICK TO CALCULATE</button>

          </div>

          <div class="output-section">
            <div class="output-row">
              <div class="output-label">Total amount:</div>
              <div class="output-value"><input type="text" name="total" readonly id="total"></div>
            </div>

            <div class="output-row">
              <div class="output-label">Amount per month:</div>
              <div class="output-value"><input type="text" name="perMonth" readonly id="perMonth"></div>
            </div>
          </div>

          <div class="actions">
          <button type="submit" id="submitButton">Submit</button>
          <button type="reset" onclick="resetForm()">Clear</button>
        </div>
          <?php
          $con = mysqli_connect("localhost", "root", "", "users");
          if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $result = mysqli_query($con, "SELECT * FROM employees");

          echo "<h3 style='text-align:center; padding:10px;'>Employee Records</h3>";
          echo "<table border='1' cellspacing='0' cellpadding='6' style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
  <tr style='background-color:#f2f2f2;'>
  <th>ID</th>
  <th>Names</th>
  <th>Address</th>
  <th>Salary</th>
  <th>Period</th>
  <th>Benefit</th>
  <th>Actions</th>
  </tr>";

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['names'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td>" . $row['period'] . "</td>";
            echo "<td>" . $row['benefit'] . "</td>";
            echo "<td>
      <button type='button' onclick='editRecord(" . json_encode($row) . ")'>Edit</button>
      <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure to delete?\")'>
        <button type='button'>Delete</button>
      </a>
    </td>";
            echo "</tr>";
          }
          echo "</table>";

          mysqli_close($con);
          ?>

        </form>

        <!-- ISTE Badge -->
        <div class="iste-badge-container">
          <img src="./1 (5).jpeg" alt="ISTE Seal of Alignment" />
        </div>
      </div>

      <!-- Programmes Section Heading -->
      <div class="programmes-heading">
        ICDL Programme
      </div>

      <!-- Programmes Grid -->
      <div class="programmes-grid">
        <!-- Workforce Card -->
        <div class="programme-card workforce-card">
          <h3>ICDL<br>Workforce</h3>
          <p>Digital Skills for Employability and Productivity</p>
        </div>

        <!-- Professional Card -->
        <div class="programme-card professional-card">
          <h3>ICDL<br>Professional</h3>
          <p>Digital Skills for Occupational Requirements</p>
        </div>

        <!-- Insights Card -->
        <div class="programme-card insights-card">
          <h3>ICDL<br>Insights</h3>
          <p>Digital Understanding for Business Environments</p>
        </div>

        <!-- Digital Student Card -->
        <div class="programme-card digital-student-card">
          <h3>ICDL<br>Digital Student</h3>
          <p>Digital Skills to design and develop, learn and study</p>
        </div>

        <!-- Digital Citizen Card -->
        <div class="programme-card digital-citizen-card">
          <h3>ICDL<br>Digital Citizen</h3>
          <p>Digital Skills to engage and find opportunity in society</p>
        </div>
      </div>
    </div>
  </body>
  <script>
      function editRecord(data) {
        document.querySelector("input[name='id']").value = data.id;
        document.querySelector("input[name='names']").value = data.names;
        document.querySelector("input[name='address']").value = data.address;
        document.querySelector("input[name='salary']").value = data.salary;
        document.querySelector("input[name='period']").value = data.period;
        document.querySelector("input[name='benefit']").value = data.benefit;

        document.getElementById("employeeForm").action = "update.php";
        document.getElementById("submitButton").innerText = "Update";
      }

      function resetForm() {
        document.querySelector("input[name='id']").value = "";
        document.getElementById("employeeForm").action = "backend.php";
        document.getElementById("submitButton").innerText = "Submit";
      }

      function calculatePension() {
      const salary = parseFloat( document.querySelector("input[name='salary']").value);
      const period = parseFloat(document.querySelector("input[name='period']").value);
      const benefit = parseFloat(document.querySelector("input[name='benefit']").value);

      if (isNaN(salary) || isNaN(period) || isNaN(benefit)) {
        alert("Please enter valid numeric values for salary, period, and benefit.");
        return;
      }

      const total = (salary * period * benefit) / 100;
      const perMonth = total / period;

      document.querySelector("input[name='total']").value = total.toFixed(2);
      document.querySelector("input[name='perMonth']").value = perMonth.toFixed(2);
    }
    </script>
  </html>