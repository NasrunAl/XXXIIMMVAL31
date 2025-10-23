<?php
// pages/view_run_content.php
include 'db_config.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
$run = $mysqli->query("SELECT * FROM runs WHERE id=".$id)->fetch_assoc();
$crit = $mysqli->query("SELECT * FROM run_criteria WHERE run_id=".$id." ORDER BY idx");
$alts = $mysqli->query("SELECT * FROM run_alternatives WHERE run_id=".$id." ORDER BY final_score DESC");
?>
<div class="panel">
  <h4>Detail Run #<?= htmlspecialchars($id) ?></h4>
  <?php if($run): ?>
    <h5><?= htmlspecialchars($run['description']) ?></h5>
    <p class="small text-muted">Waktu: <?= htmlspecialchars($run['created_at'] ?? '') ?></p>

    <h6>Bobot Kriteria</h6>
    <table class="table table-sm">
      <thead>
        <tr><th>#</th><th>Kriteria</th><th>Bobot</th></tr>
      </thead>
      <tbody>
      <?php while($c = $crit->fetch_assoc()){
        echo "<tr><td>".($c['idx']+1)."</td>
                  <td>".htmlspecialchars($c['name'])."</td>
                  <td>".round($c['weight'],4)."</td>
              </tr>";
      } ?>
      </tbody>
    </table>

    <h6>Ranking</h6>
    <table class="table table-sm">
      <thead><tr><th>Pos</th><th>Nama</th><th>Skor</th></tr></thead>
      <tbody>
      <?php $p=1; while($a=$alts->fetch_assoc()){
        echo "<tr><td>".$p."</td><td>".htmlspecialchars($a['name'])."</td><td>".round($a['final_score'],4)."</td></tr>";
        $p++;
      } ?>
      </tbody>
    </table>

  <?php else: ?>
    <div class="alert alert-warning">Run tidak ditemukan.</div>
  <?php endif; ?>
</div>
