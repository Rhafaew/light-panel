<?php

function pageReturn($pg, $quantidade) {
    if (isset($pg)) {
        $pg = $pg;
    } else {
        $pg = 1;
    }
    $inicio = ($pg * $quantidade) - $quantidade;
    $exp = $pg . "," . $inicio . "," . $quantidade;
    $pglimit = explode(",", $exp);
    return $pglimit;
}

function FirstBackPage($geturl, $pg, $liOpen, $liEnd, $IconFirst, $IconPrev) {
    if (isset($pg)) {
        $pg = $pg;
    } else {
        $pg = 1;
    }
//////////*////////// PRIMEIRA //////////*//////////
    if ($pg > '1'):
        echo $liOpen . '<a href="' . $geturl . '">' . $IconFirst . '</a>' . $liEnd;
    endif;
//////////*////////// ANTERIOR //////////*//////////
    for ($i = $pg - 1; $i <= $pg - 1; $i++):
        if ($i < 1):
        else:
            echo $liOpen . '<a href="' . $geturl . $i . '">' . $IconPrev . '</a>' . $liEnd;
        endif;
    endfor;
}

function NumLoop($geturl, $pg, $links, $countResult, $quantidade, $liOpen, $liEnd, $liActive) {
    $paginas_total = ceil($countResult / $quantidade);
    if (isset($pg)) {
        $pg = $pg;
    } else {
        $pg = 1;
    }
//////////*////////// MENOS PAGINAS //////////*//////////
    for ($i = $pg - $links; $i <= $pg - 1; $i++):
        if ($i >= 1):
            echo $liOpen . '<a href="' . $geturl . $i . '">' . $i . '</a>' . $liEnd;
        endif;
    endfor;
//////////*////////// ATUAL ATIVA //////////*//////////
    echo $liActive . '<a href="' . $geturl . $pg . '">' . $pg . '</a>' . $liEnd;
//////////*////////// MAIS PAGINAS //////////*//////////
    for ($i = $pg + 1; $i <= $pg + $links; $i++):
        if ($i > $paginas_total): else:
            //NUMERO PAGINA PROXIMA ( + )
            echo $liOpen . '<a href="' . $geturl . $i . '">' . $i . '</a>' . $liEnd;
        endif;
    endfor;
}

function NextLastPage($geturl, $pg, $countResult, $quantidade, $liOpen, $liEnd, $IconProx, $IconLast) {
    $paginas_total = ceil($countResult / $quantidade);
//////////*////////// PROXIMA //////////*//////////
    if (isset($pg)) {
        $pg = $pg;
    } else {
        $pg = 1;
    }
    for ($i = $pg + 1; $i <= $pg + 1; $i++):
        if ($i > $paginas_total):
        //PROXIMA
        else:
            //PROXIMA
            echo $liOpen . '<a href="' . $geturl . $i . '">' . $IconProx . '</a>' . $liEnd;
        endif;
    endfor;
//////////*////////// ULTIMA //////////*//////////
    if ($pg != $paginas_total):
        //ULTIMA
        echo $liOpen . '<a href="' . $geturl . $paginas_total . '">' . $IconLast . '</a>' . $liEnd;
    endif;
}
