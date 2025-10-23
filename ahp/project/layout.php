<?php
// layout.php - main template (do not add output before this include)
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($title ?? 'Dashboard Mahasiswa') ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Original app css (keamanan: tetap dimuat bila ada) -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Our custom style (override & theme) -->
  <link rel="stylesheet" href="style.css">

  <style>
    /* ensure container feels roomy on mobile */
    .container-fluid { max-width: 1200px; }
  </style>
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar-wrapper">
      <div class="sidebar-heading text-white text-center py-4 fs-4 fw-bold">🎓 SIP - Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action">🏠 Dashboard</a>
        <a href="history.php" class="list-group-item list-group-item-action">📜 Riwayat</a>
        <a href="view_run.php?id=1" class="list-group-item list-group-item-action">👁️ Detail Run</a>
        <a href="process.php" class="list-group-item list-group-item-action">⚙️ Proses</a>
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="flex-grow-1">
      <!-- Topbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
          <button class="btn btn-toggle" id="menu-toggle">☰</button>
          <div class="ms-3">
            <span class="fw-bold text-primary"><?= htmlspecialchars($title ?? '') ?></span>
          </div>
          <div class="ms-auto">
            <span class="small text-muted">Polije - AHP Demo</span>
          </div>
        </div>
      </nav>

      <!-- Content -->
      <div class="container-fluid mt-4">
        <?php
          // $page harus di-set sebelum include layout.php
          if(!empty($page) && file_exists($page)){
            include $page;
          } else {
            echo "<div class='alert alert-warning'>Halaman belum tersedia.</div>";
          }
        ?>
      </div>
      <div style="height:40px;"></div>
    </div>
  </div>

  <footer class="site-footer mt-4">
    <div class="container text-center py-3">
      <small>© 2025 — AHP Demo (sheet-based)</small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Keep original app JS if present (handles the AHP form steps) -->
  <script src="assets/js/app.js"></script>

  <script>
    // sidebar toggle
    const menuToggle = document.getElementById('menu-toggle');
    const wrapper = document.getElementById('wrapper');
    menuToggle?.addEventListener('click', ()=> wrapper.classList.toggle('toggled'));
  </script>
</body>
</html>
