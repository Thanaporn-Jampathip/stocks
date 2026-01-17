function filterByCategory(categoryId) {
  if (categoryId === "") {
    // ถ้าเลือก "ทั้งหมด" ให้ไปหน้าเดิมโดยไม่มี parameter
    window.location.href = "manage_product.php";
  } else {
    // ถ้าเลือกหมวดหมู่ ให้ส่ง parameter ไปด้วย
    window.location.href = "manage_product.php?category=" + categoryId;
  }
}
