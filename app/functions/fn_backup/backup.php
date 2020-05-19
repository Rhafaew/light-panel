<?php

error_reporting(0);
//$mysql_host = "mysql.hostinger.com.br";
//$mysql_user = "u845253909_rhafa";
//$mysql_password = "15975382";
//$mysql_database = "u845253909_site";

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_database = 'meu_painel';

$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
$db = mysql_select_db($mysql_database, $con);

backup_database_tables($mysql_host, $mysql_user, $mysql_password, $mysql_database, '*');

// backup db function
function backup_database_tables($host, $user, $pass, $name, $tables) {
    $link = mysql_connect($host, $user, $pass);
    mysql_select_db($name, $link);
    //get all of the tables
    if ($tables == '*') {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while ($row = mysql_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }
    $return.= '--' . "\n" . '-- Banco de dados: `' . $name . '`' . "\n" . '--' . "\n";
    $CREATE = 'CREATE DATABASE IF NOT EXISTS ' . $name . ' DEFAULT CHARACTER SET utf8;' . "\n";
    $USETAB = 'USE ' . $name . ';' . "\n\n";
    $return.= $CREATE . $USETAB;
    //cycle through each table and format the data
    foreach ($tables as $table) {
        $result = mysql_query('SELECT * FROM ' . $table);
        $num_fields = mysql_num_fields($result);
        $return.= '--' . "\n" . '-- Estrutura para tabela `' . $table . '`' . "\n" . '--' . "\n";
        $return.= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE ' . $table));
        $return.= "\n" . $row2[1] . ";\n\n";
        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysql_fetch_row($result)) {
                $return.= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n", "\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return.= '"' . $row[$j] . '"';
                    } else {
                        $return.= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return.= ',';
                    }
                }
                $return.= ");\n";
            }
        }
        $return.="\n";
    }
    //save the file
    $handle = fopen('backup.sql', 'w+');
    fwrite($handle, utf8_encode($return));
    fclose($handle);
}

header("Location: ../");
?>