




<style>
    #heatmapChart {
      display: block;
      max-height: 400px; /* Ensure the chart doesn't expand infinitely */
      max-width: 100%;
    }
  
    .card-body {
      overflow: hidden;
      padding: 16px; /* Add padding for better visual alignment */
    }
  
    .card-title {
      font-size: 16px;
      margin-bottom: 15px;
    }
  
    .card {
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1); /* Add light shadow for better styling */
      border: 1px solid #ddd; /* Subtle border for the card */
      border-radius: 8px; /* Rounded corners */
    }
  </style>
  



<div class="card p-0">
    <div class="card-body">
      <h5 class="card-title">Lead Source</h5>
      <div style="position: relative; height: 400px; width: 100%;">
        <canvas id="heatmapChart"></canvas>
      </div>
    </div>
</div>
  



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix"></script>

<script>
  // Heatmap Data
  const heatmapData = {
    datasets: [
      {
        label: "Orders",
        data: [
          { x: 0, y: "Facebook", v: 10 },
          { x: 6, y: "Facebook", v: 20 },
          { x: 12, y: "Facebook", v: 80 },
          { x: 18, y: "Facebook", v: 50 },
          { x: 0, y: "YouTube", v: 40 },
          { x: 6, y: "YouTube", v: 60 },
          { x: 12, y: "YouTube", v: 30 },
          { x: 18, y: "YouTube", v: 70 },
          { x: 0, y: "Instagram", v: 70 },
          { x: 6, y: "Instagram", v: 30 },
          { x: 12, y: "Instagram", v: 50 },
          { x: 18, y: "Instagram", v: 90 },
          { x: 0, y: "Twitter", v: 10 },
          { x: 6, y: "Twitter", v: 20 },
          { x: 12, y: "Twitter", v: 60 },
          { x: 18, y: "Twitter", v: 30 },
          { x: 0, y: "TikTok", v: 80 },
          { x: 6, y: "TikTok", v: 40 },
          { x: 12, y: "TikTok", v: 70 },
          { x: 18, y: "TikTok", v: 90 },
        ],
        backgroundColor(context) {
          const value = context.dataset.data[context.dataIndex].v;
          const alpha = value / 100; // Normalize value to [0, 1]
          return `rgba(255, 99, 132, ${alpha})`; // Adjust color intensity
        },
        borderWidth: 1,
        width(context) {
          const chartArea = context.chart.chartArea || {};
          return (chartArea.right - chartArea.left) / 24; // Divide width into 24 time slots
        },
        height(context) {
          const chartArea = context.chart.chartArea || {};
          return (chartArea.bottom - chartArea.top) / 5; // Divide height into 5 rows
        },
      },
    ],
  };

  // Heatmap Options
  const heatmapOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false, // Hide legend
      },
      tooltip: {
        callbacks: {
          title(context) {
            return `Hour: ${context[0].raw.x}`;
          },
          label(context) {
            return `${context.raw.y}: ${context.raw.v} orders`;
          },
        },
      },
    },
    scales: {
      x: {
        type: "linear",
        position: "top",
        ticks: {
          stepSize: 6, // Hourly intervals
          callback: (value) => `${value}:00`,
        },
        title: {
          display: true,
          text: "Hour of Day",
        },
      },
      y: {
        type: "category",
        labels: ["Facebook", "YouTube", "Instagram", "Twitter", "TikTok"],
        title: {
          display: true,
          text: "Platforms",
        },
      },
    },
  };

  // Initialize the Heatmap Chart
  const ctx = document.getElementById("heatmapChart").getContext("2d");
  new Chart(ctx, {
    type: "matrix", // Use matrix chart type
    data: heatmapData,
    options: heatmapOptions,
  });
</script>
