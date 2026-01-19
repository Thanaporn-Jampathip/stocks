document.addEventListener("DOMContentLoaded", function () {
  const filterCategory = document.getElementById("filterCategory");
  const filterStatus = document.getElementById("filterStatus");
  const productRows = document.querySelectorAll("#productTableBody tr");

  // ฟังก์ชันสำหรับ filter
  function filterProducts() {
    const selectedCategory = filterCategory.value;
    const selectedStatus = filterStatus.value;

    productRows.forEach(function (row) {
      const rowCategory = row.getAttribute("data-category");
      const rowStatus = row.getAttribute("data-status");

      let showRow = true;

      // ตรวจสอบ category filter
      if (selectedCategory && selectedCategory !== "") {
        if (rowCategory !== selectedCategory) {
          showRow = false;
        }
      }

      // ตรวจสอบ status filter
      if (selectedStatus && selectedStatus !== "") {
        if (rowStatus !== selectedStatus) {
          showRow = false;
        }
      }

      // แสดงหรือซ่อนแถว
      if (showRow) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  }

  // เพิ่ม event listener ให้กับ select
  filterCategory.addEventListener("change", filterProducts);
  filterStatus.addEventListener("change", filterProducts);
});
