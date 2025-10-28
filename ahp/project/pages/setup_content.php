<div class="card p-4">
  <h4>Setup Awal</h4>
  <form action="criteria.php" method="POST">
    <div class="mb-3">
      <label class="form-label">Jumlah Kriteria</label>
      <input type="number" class="form-control" name="numCrit" min="2" max="12" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jumlah Alternatif</label>
      <input type="number" class="form-control" name="numAlt" min="2" max="12" required>
    </div>
    <button type="submit" class="btn btn-primary">Lanjut →</button>
  </form>
</div>
