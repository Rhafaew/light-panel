<?php

// LISTA DE TIMEZONE (BRASIL)
// America/Araguaia = TO
// America/Bahia = BA
// America/Belem = AP, PA
// America/Boa_Vista = RR
// America/Campo_Grande = MS
// America/Cuiaba = MT
// America/Fortaleza = PB, CE, MA, PI, RN
// America/Maceio = SE, AL
// America/Manaus = AM
// America/Porto_Velho = RO
// America/Recife = PE
// America/Rio_branco = AC
// America/Sao_Paulo = DF, GO, MG, RJ, RS, ES, PR, SC, SP
//
// TIMEZONE
date_default_timezone_set('America/Porto_Velho');


// MOSTRA ERROS DO PHP
ini_set('display_errors', TRUE);

session_start();

// CONFIGRAÇÕES DA CONEXÃO
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'meu_painel');
