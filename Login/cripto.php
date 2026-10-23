<?php
$senha = "1324@1234";

$embaralhar = password_hash($senha, PASSWORD_DEFAULT);

echo $embaralhar;
?>