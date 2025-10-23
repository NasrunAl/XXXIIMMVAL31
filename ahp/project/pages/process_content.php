<?php
// pages/process_content.php
include 'db_config.php';

/* ---- AHP helper functions (keaslian logic diambil dari file asli) ---- */
function col_norm_avg($mat){
    $n = count($mat);
    $colsum = array_fill(0,$n,0.0);
    for($j=0;$j<$n;$j++){ for($i=0;$i<$n;$i++) $colsum[$j] += $mat[$i][$j]; }
    $w = array_fill(0,$n,0.0);
    for($i=0;$i<$n;$i++){
        for($j=0;$j<$n;$j++){ if($colsum[$j]==0) $w[$i]+=0; else $w[$i] += $mat[$i][$j]/$colsum[$j]; }
        $w[$i] = $w[$i]/$n;
    }
    return $w;
}
function mult_mat_vec($mat,$vec){ $n=count($mat); $res=array_fill(0,$n,0.0); for($i=0;$i<$n;$i++){ for($j=0;$j<$n;$j++) $res[$i]+=$mat[$i][$j]*$vec[$j]; } return $res; }
function consistency_ratio($mat,$w){
    $Aw = mult_mat_vec($mat,$w);
    $n = count($w);
    $lambda = 0.0;
    for($i=0;$i<$n;$i++){ if(@$w[$i]!=0) $lambda += $Aw[$i]/$w[$i]; }
    $lambda = $lambda / $n;
    $ci = ($lambda - $n) / ($n - 1);
    $ri_table = [0.0,0.0,0.58,0.90,1.12,1.24,1.32,1.41,1.45,1.49,1.51,1.48];
    $ri = ($n < count($ri_table)) ? $ri_table[$n] : 1.49;
    $cr = ($ri==0)?0:($ci/$ri);
    return ['lambda'=>$lambda,'CI'=>$ci,'RI'=>$ri,'CR'=>$cr];
}

/* ---- read POST data (dari form index_content) ---- */
$criteria_names = json_decode($_POST['criteria_names'] ?? '[]', true);
$alt_names = json_decode($_POST['alt_names'] ?? '[]', true);
$crit_matrix = json_decode($_POST['crit_matrix'] ?? '[]', true);
$alt_matrices = json_decode($_POST['alt_matrices'] ?? '[]', true);

if(!$criteria_names || !$alt_names || !$crit_matrix || !$alt_matrices){
    echo "<div class='panel'><div class='alert alert-danger'>Data tidak lengkap. Pastikan form sudah diisi.</div>
    <p><a href='index.php' class='btn btn-outline'>Kembali</a></p></div>";
    return;
}

/* ---- compute criteria weights ---- */
$critMat = array_map(function($r){ return array_map('floatval', $r); }, $crit_matrix);
$wCrit = col_norm_avg($critMat);
$sum = array_sum($wCrit); for($i=0;$i<count($wCrit);$i++) $wCrit[$i] = $wCrit[$i]/$sum;
$consCrit = consistency_ratio($critMat,$wCrit);

/* ---- compute alt weights per criterion ---- */
$altWeights = [];
foreach($alt_matrices as $mat){
    $m = array_map(function($r){ return array_map('floatval',$r); }, $mat);
    $w = col_norm_avg($m); $s = array_sum($w); if($s==0) $s=1; for($i=0;$i<count($w);$i++) $w[$i]=$w[$i]/$s;
    $altWeights[] = $w;
}

/* ---- aggregate final scores ---- */
$nAlt = count($alt_names);
$final = array_fill(0,$nAlt,0.0);
for($k=0;$k<count($wCrit);$k++){
    for($i=0;$i<$nAlt;$i++) $final[$i] += $wCrit[$k] * $altWeights[$k][$i];
}

/* ---- ranking ---- */
$idx = range(0,$nAlt-1);
usort($idx, function($a,$b) use ($final){ if($final[$a]==$final[$b]) return 0; return ($final[$a]<$final[$b])?1:-1; });

/* ---- save to DB (sama seperti sebelumnya) ---- */
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
$mysqli->set_charset('utf8mb4');
$mysqli->query("INSERT INTO runs (description) VALUES ('Run AHP - ')");
$run_id = $mysqli->insert_id;

// save criteria weights
$stmt = $mysqli->prepare("INSERT INTO run_criteria (run_id, idx, name, weight) VALUES (?,?,?,?)");
for($i=0;$i<count($criteria_names);$i++){
    $stmt->bind_param('iisd', $run_id, $i, $criteria_names[$i], $wCrit[$i]);
    $stmt->execute();
}
$stmt->close();

// save alternatives and final scores
$stmt2 = $mysqli->prepare("INSERT INTO run_alternatives (run_id, idx, name, final_score) VALUES (?,?,?,?)");
for($i=0;$i<$nAlt;$i++){
    $stmt2->bind_param('iisd', $run_id, $i, $alt_names[$i], $final[$i]);
    $stmt2->execute();
}
$stmt2->close();

// save alt weights per criterion
$stmt3 = $mysqli->prepare("INSERT INTO run_alt_weights (run_id, crit_idx, alt_idx, weight) VALUES (?,?,?,?)");
for($c=0;$c<count($altWeights);$c++){
    for($a=0;$a<$nAlt;$a++){
        $stmt3->bind_param('iiid', $run_id, $c, $a, $altWeights[$c][$a]);
        $stmt3->execute();
    }
}
$stmt3->close();
$mysqli->close();

/* ---- show results (styled) ---- */
?>
<div class="panel">
  <h4>Hasil AHP</h4>
  <p>CR (kriteria) = <strong><?= round($consCrit['CR'],4) ?></strong> (λ = <?= round($consCrit['lambda'],4) ?>)</p>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead><tr><th>Pos</th><th>Nama</th><th>Skor</th></tr></thead>
      <tbody>
      <?php $pos=1; foreach($idx as $i){ ?>
        <tr>
          <td><?= $pos ?></td>
          <td><?= htmlspecialchars($alt_names[$i]) ?></td>
          <td><?= round($final[$i],4) ?></td>
        </tr>
      <?php $pos++; } ?>
      </tbody>
    </table>
  </div>

  <div class="d-flex gap-2">
    <a href="history.php" class="btn btn-outline">Lihat Riwayat</a>
    <a href="index.php" class="btn btn-primary">Kembali</a>
  </div>
</div>
