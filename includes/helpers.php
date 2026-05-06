<?php
function nilaiKeHuruf(float $na): array {
    if ($na >= 85) return ['huruf' => 'A', 'bobot' => 4.00];
    elseif ($na >= 80) return ['huruf' => 'B+', 'bobot' => 3.50];
    elseif ($na >= 75) return ['huruf' => 'B', 'bobot' => 3.00];
    elseif ($na >= 70) return ['huruf' => 'C+', 'bobot' => 2.50];
    elseif ($na >= 65) return ['huruf' => 'C', 'bobot' => 2.00];
    elseif ($na >= 60) return ['huruf' => 'D', 'bobot' => 1.00];
    else return ['huruf' => 'E', 'bobot' => 0.00];
}
function badgeHuruf(string $huruf): string {
    $map = ['A'=>'bg-success','B+'=>'bg-primary','B'=>'bg-info text-dark','C+'=>'bg-warning text-dark','C'=>'bg-warning text-dark','D'=>'bg-danger','E'=>'bg-dark'];
    return $map[$huruf] ?? 'bg-secondary';
}
function statusLulus(string $huruf): string {
    return in_array($huruf, ['E', 'D']) ? 'Tidak Lulus' : 'Lulus';
}
?>