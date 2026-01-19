<?php $current = basename($_SERVER['PHP_SELF']); ?>

<a href="dashboard.php" class="<?php echo ($current == 'dashboard.php') ? 'active' : '' ?>"><i class="bi bi-house"></i>หน้าหลัก</a>

<h6 class="text-secondary text-left">เกี่ยวกับผู้ใช้งาน</h6>
<a href="manage_user.php" class="<?php echo ($current == 'manage_user.php') ? 'active' : '' ?>"><i class="bi bi-person-circle"></i>จัดการผู้ใช้งาน</a>

<h6 class="text-secondary text-left">เกี่ยวกับสินค้า</h6>
<a href="manage_product.php" class="<?php echo ($current == 'manage_product.php') ? 'active' : '' ?>"><i class="bi bi-box-seam"></i>จัดการสินค้า</a>
<a href="manage_type.php" class="<?php echo ($current == 'manage_type.php') ? 'active' : '' ?>"><i class="bi bi-card-checklist"></i>จัดการหมวดหมู่</a>
<a href="manage_brand.php" class="<?php echo ($current == 'manage_brand.php') ? 'active' : '' ?>"><i class="bi bi-bag"></i>จัดการแบรนด์</a>

<h6 class="text-secondary text-left">คลังสินค้า</h6>
<a href="storage.php" class="<?php echo ($current == 'storage.php') ? 'active' : '' ?>"><i class="bi bi-inboxes"></i>สต็อกคงเหลือ</a>

<h6 class="text-secondary text-left">รายงานและอื่นๆ</h6>
<a href="manage_supplier.php" class="mb-3 class="<?php echo ($current == 'manage_supplier.php') ? 'active' : '' ?>""><i class="bi bi-truck"></i>ซัพพลายเออร์</a>