<?php
// pages/index_content.php
// maintain original behavior: include db config (some functions may rely)
include 'db_config.php';
?>
<!-- main content (only inner HTML) -->
<div class="panel">
  <h3 class="mb-3">AHP - Pemilihan Mahasiswa Terbaik</h3>

  <div class="steps">
    <div class="step-nav mb-3">
      <button class="step-btn active btn btn-outline-secondary me-1" data-step="1">1. Setup</button>
      <button class="step-btn btn btn-outline-secondary me-1" data-step="2">2. Kuesioner Kriteria</button>
      <button class="step-btn btn btn-outline-secondary me-1" data-step="3">3. Kuesioner Alternatif</button>
      <button class="step-btn btn btn-outline-secondary" data-step="4">4. Review & Hitung</button>
    </div>

    <form id="form" method="post" action="process.php">
      <!-- Step 1 -->
      <section class="step" data-step="1">
        <h5>Setup</h5>
        <label class="form-label">Jumlah Kriteria</label>
        <input id="numCrit" class="form-control mb-2" type="number" min="1" max="12" value="5">
        <label class="form-label">Jumlah Alternatif (Mahasiswa)</label>
        <input id="numAlt" class="form-control mb-2" type="number" min="2" max="50" value="3">
        <div class="d-flex gap-2 mt-2 mb-2">
          <button type="button" id="makeBtn" class="btn btn-outline">Buat Form</button>
          <button type="button" id="fillSample" class="btn btn-outline">Isi Contoh (dari Sheet)</button>
        </div>
        <div id="namesArea" class="mb-3"></div>
        <div class="actions text-end">
          <button type="button" id="toCrit" class="btn btn-primary">Lanjut ke Kuesioner Kriteria →</button>
        </div>
      </section>

      <!-- Step 2 -->
      <section class="step hidden mt-3" data-step="2">
        <h5>Kuesioner Perbandingan Kriteria</h5>
        <p class="small">Pilih nilai pada skala AHP (1..9). Pilih A dibanding B. Reciprok otomatis diset.</p>
        <div id="critQ"></div>
        <div class="actions mt-3 d-flex justify-content-between">
          <button type="button" id="back1" class="btn btn-outline">← Kembali</button>
          <button type="button" id="toAltQ" class="btn btn-primary">Lanjut ke Kuesioner Alternatif →</button>
        </div>
      </section>

      <!-- Step 3 -->
      <section class="step hidden mt-3" data-step="3">
        <h5>Kuesioner Perbandingan Alternatif (per kriteria)</h5>
        <div id="altQ"></div>
        <div class="actions mt-3 d-flex justify-content-between">
          <button type="button" id="back2" class="btn btn-outline">← Kembali</button>
          <button type="button" id="toReview" class="btn btn-primary">Lanjut ke Review →</button>
        </div>
      </section>

      <!-- Step 4 -->
      <section class="step hidden mt-3" data-step="4">
        <h5>Review & Hitung</h5>
        <div id="review"></div>
        <div class="actions mt-3 d-flex justify-content-between">
          <button type="button" id="back3" class="btn btn-outline">← Kembali</button>
          <button type="submit" class="btn btn-primary">Hitung & Simpan</button>
        </div>
      </section>

      <input type="hidden" name="criteria_names" id="criteria_names">
      <input type="hidden" name="alt_names" id="alt_names">
      <input type="hidden" name="crit_matrix" id="crit_matrix">
      <input type="hidden" name="alt_matrices" id="alt_matrices">
    </form>
  </div>
</div>

<div class="panel mt-3">
  <h5>Riwayat</h5>
  <p><a href="history.php" class="btn btn-outline">Lihat Riwayat Perhitungan</a></p>
</div>
