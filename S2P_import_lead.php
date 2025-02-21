


  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importLeadModal">
    <i class="ti ti-upload"></i> Import Lead Data
  </button>



      <!-- Import Lead Modal -->
      <div class="modal fade" id="importLeadModal" tabindex="-1" aria-labelledby="importLeadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="importLeadModalLabel"><i class="ti ti-file-import"></i> Import Lead Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="importLeadForm" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="leadFile" class="form-label">Upload CSV File</label>
                  <input type="file" class="form-control" id="leadFile" accept=".csv" required>
                  <small class="form-text text-muted">Only CSV format is allowed.</small>
                </div>
              </form>

              <!-- CSV Preview Section -->
              <div id="previewContainer" class="mt-3 d-none">
                <h5 class="d-flex justify-content-between align-items-center">
                  File Preview:
                  <!-- Reload Icon (Tabler SVG) -->
                  <button id="reloadPreview" class="btn btn-icon btn-link text-primary" title="Reload Preview">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-reload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" /><path d="M20 4v5h-5" /></svg>
                  </button>
                </h5>
                <div class="table-responsive">
                  <table class="table table-bordered"> 
                    <thead id="previewTableHead"></thead>
                    <tbody id="previewTableBody"></tbody> 
                  </table>
                </div>
              </div>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              <i class="ti ti-x"></i> Cancel
            </button>

            <button type="submit" class="btn btn-success" form="importLeadForm">
              <i class="ti ti-upload"></i> Upload
            </button> 
            </div>
          </div>
        </div>
      </div>






      <script>
    $(document).ready(function () {
      const fixedHeaders = ['lead_source', 'lead_product', 'lead_name', 'lead_email', 
                            'lead_mobile', 'lead_created_at'];

      $('#leadFile').on('change', function (e) {
        const file = e.target.files[0];
        if (file && file.type === 'text/csv') {
          const reader = new FileReader();
          reader.onload = function (e) {
            const csvData = e.target.result;
            previewCSV(csvData);
          };
          reader.readAsText(file);
        } else {
          $('#previewContainer').addClass('d-none');
          Swal.fire({
            icon: 'error',
            title: 'Invalid File',
            text: 'Please upload a valid CSV file.'
          });
        }
      });

      function previewCSV(data) {
        const rows = data.trim().split('\n').map(row => row.split(',').map(cell => cell.trim()));
        const tableHead = $('#previewTableHead');
        const tableBody = $('#previewTableBody');

        tableHead.empty();
        tableBody.empty();

        if (rows.length > 0) {
          const headers = rows[0];

          if (!arraysEqual(headers, fixedHeaders)) {
            Swal.fire({
              icon: 'error',
              title: 'Invalid CSV Headers',
              text: `Headers must be: ${fixedHeaders.join(', ')}`
            });
            return;
          }

          // **Fix Header Row** (Ensuring proper column alignment)
          let headerRow = `<tr><th>Validation</th>`;
          headers.forEach(header => {
            headerRow += `<th>${header}</th>`;
          });
          headerRow += `</tr>`;
          tableHead.append(headerRow);

          for (let i = 1; i < rows.length; i++) {
            const cells = rows[i];
            if (cells.length !== headers.length) continue; // Skip malformed rows

            const row = $('<tr></tr>');

            let isValid = true;
            let errors = [];

            // Validation for existing fields
            if (!cells[0]) {
              isValid = false;
              errors.push('Lead Source is required');
            }

            if (!['sec2pay', 'indirail'].includes(cells[1].toLowerCase())) {
              isValid = false;
              errors.push('Lead Product must be sec2pay or indirail');
            }

            if (!/^[A-Za-z\s]+$/.test(cells[2])) {
              isValid = false;
              errors.push('Lead Name must only contain alphabets');
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(cells[3])) {
              isValid = false;
              errors.push('Invalid Email Format');
            }

            if (!/^\d{10}$/.test(cells[4])) {
              isValid = false;
              errors.push('Mobile Number must be 10 digits');
            }
 

            // Validate the date format for lead_created_at (e.g., YYYY-MM-DD)
            const datePattern = /^\d{4}-\d{2}-\d{2}$/;
            if (!datePattern.test(cells[5])) {
              isValid = false;
              errors.push('Lead Created At must be in the format YYYY-MM-DD');
            }

            // Create tooltip content with errors
            const errorTooltip = errors.length > 0
              ? `<b>Errors:</b><br>${errors.join('<br>')}`
              : '';

            // Add validation icon with tooltip
            let validationIcon = isValid
              ? `<td class="text-success text-center"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.626 7.293a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg> </td>`
              : `<td class="text-danger text-center" data-bs-toggle="tooltip" data-bs-html="true" title="${errorTooltip}">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-xbox-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10m3.6 5.2a1 1 0 0 0 -1.4 .2l-2.2 2.933l-2.2 -2.933a1 1 0 1 0 -1.6 1.2l2.55 3.4l-2.55 3.4a1 1 0 1 0 1.6 1.2l2.2 -2.933l2.2 2.933a1 1 0 0 0 1.6 -1.2l-2.55 -3.4l2.55 -3.4a1 1 0 0 0 -.2 -1.4" /></svg>
                </td>`;

            row.append(validationIcon);

            for (let j = 0; j < headers.length; j++) {
              row.append(`<td>${cells[j] || ''}</td>`);
            }

            tableBody.append(row);
          }

          $('#previewContainer').removeClass('d-none');

          // Initialize Bootstrap tooltips for the dynamically added tooltip elements
          $('[data-bs-toggle="tooltip"]').tooltip();

        } else {
          $('#previewContainer').addClass('d-none');
          Swal.fire({
            icon: 'error',
            title: 'Empty File',
            text: 'The uploaded CSV file is empty.'
          });
        }
      }

      function arraysEqual(arr1, arr2) {
        return JSON.stringify(arr1) === JSON.stringify(arr2);
      }

      $('#reloadPreview').on('click', function () {
        $('#previewTableHead').empty();
        $('#previewTableBody').empty();
        $('#previewContainer').addClass('d-none');
        $('#leadFile').val('');
      });

      function importDataToDatabase() {
        if (validData.length > 0) {
          $.ajax({
            url: 'your_backend_endpoint.php',  // Your server-side PHP script
            type: 'POST',
            data: {
              action: 'import',
              data: validData
            },
            success: function(response) {
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'Data Imported Successfully',
                  text: 'The validated data has been imported into the database.'
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Import Failed',
                  text: 'There was an error while importing the data.'
                });
              }
            },
            error: function() {
              Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'An error occurred while communicating with the server.'
              });
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'No Valid Data',
            text: 'There is no valid data to import.'
          });
        }
      }
    }); 
  </script>