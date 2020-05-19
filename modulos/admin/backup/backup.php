<h4>Backup do Banco de Dados</h4>
<p><a href="<?= LinkBackup ?>new_backup" class="btn light-blue"><i class="material-icons left">library_add</i>Fazer Backup</a></p>

<?
////////////////////
//LISTAR ARQUIVOS DA PASTA
$path = "arquivos/backup/";
$diretorio = dir($path);

echo "Lista de Arquivos do diretório '<strong>" . $path . "</strong>':<br />";
while ($arquivo = $diretorio->read()):
    echo "<a href='" . BaseHost . $path . $arquivo . "'>" . $arquivo . "</a><br />";
endwhile;
$diretorio->close();
