<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .dashboard-header {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .dashboard-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  
  .stat-card {
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    flex-basis: calc(33.33% - 20px);
  }
  
  .dashboard-graph {
    background-color: #f2f2f2;
    height: 200px;
    margin-bottom: 20px;
    /* Add additional styles for your graph or chart */
  }
  
  .dashboard-section {
    margin-bottom: 20px;
  }
  
  h1, h2 {
    color: #333;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }
  
  th {
    font-weight: bold;
  }
  .button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .button:hover {
    background-color: #2980b9;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="dashboard-header">
      <h1>Admin Dashboard</h1>
    </div>
    <div class="dashboard-stats">
      <div class="stat-card">
        <h2>Total Rooms</h2>
        <p>50</p>
      </div>
      <div class="stat-card">
        <h2>Occupancy</h2>
        <p>75%</p>
      </div>
      <div class="stat-card">
        <h2>Upcoming Reservations</h2>
        <p>15</p>
      </div>
      <div class="stat-card">
        <h2>Total Revenue</h2>
        <p>$25,000</p>
      </div>
    </div>
    <div class="dashboard-graph">
      <!-- Add your graph or chart here -->
    </div>
    <div class="dashboard-section">
      <h2>Recent Reservations</h2>
      <table>
        <thead>
          <tr>
            <th>Guest Name</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
            <th>Room Type</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>2023-06-01</td>
            <td>2023-06-05</td>
            <td>Standard Room</td>
            <td>Confirmed</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>2023-06-02</td>
            <td>2023-06-06</td>
            <td>Deluxe Suite</td>
            <td>Pending</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
          <!-- Add more reservation rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
