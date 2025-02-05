<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Cards</title>
  <style>
    /* Container styles */
    .card-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
    }

    /* Card styles */
    .card {
      background-color: #f8f9fc;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: calc(25% - 16px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      text-align: left;
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    /* Icon container */
    .icon-container {
      display: flex;
      justify-content: flex-end;
    }

    .icon {
      width: 30px;
      height: 30px;
      background-color: #000;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 12px;
    }

    /* Title and content styles */
    .card-title {
      font-size: 1rem;
      font-weight: 500;
      margin-bottom: 8px;
      color: #333;
    }

    .card-subtitle {
      font-size: 0.9rem;
      color: #777;
      margin-bottom: 16px;
    }

    .card-value {
      font-size: 1.5rem;
      font-weight: bold;
      color: #000;
    }

    /* Colors for individual cards */
    .card-1 {
      background-color: #e9e7fc;
    }

    .card-2 {
      background-color: #fce7f3;
    }

    .card-3 {
      background-color: #ffe7e9;
    }

    .card-4 {
      background-color: #fff5e4;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .card {
        width: calc(50% - 16px);
      }
    }

    @media (max-width: 480px) {
      .card {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="card-container">
    <div class="card card-1">
      <h3 class="card-title">Total Revenue This Month</h3>
      <p class="card-subtitle">Summary of Monthly Revenue</p>
      <p class="card-value">$85,625</p>
      <div class="icon-container">
        <div class="icon">➔</div>
      </div>
    </div>
    <div class="card card-2">
      <h3 class="card-title">Products Sold</h3>
      <p class="card-subtitle">Number of Products Sold This Month</p>
      <p class="card-value">3,721</p>
      <div class="icon-container">
        <div class="icon">➔</div>
      </div>
    </div>
    <div class="card card-3">
      <h3 class="card-title">Total Products</h3>
      <p class="card-subtitle">Number of Available Products</p>
      <p class="card-value">1,245</p>
      <div class="icon-container">
        <div class="icon">➔</div>
      </div>
    </div>
    <div class="card card-4">
      <h3 class="card-title">Total Customers</h3>
      <p class="card-subtitle">Number of Active Customers</p>
      <p class="card-value">12,548</p>
      <div class="icon-container">
        <div class="icon">➔</div>
      </div>
    </div>
  </div>
</body>
</html>
