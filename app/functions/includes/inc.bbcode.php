<?

function bbCode($string) {


    $urlText = explode("[url=", $string);
    $urlTexto = explode("]", $urlText[0]);
    $urlTexto = $urlTexto[0];


    $bb_troca = array('[b]', '[/b]', '[i]', '[/i]', '[u]', '[/u]', '[url=', '][/url]', '[/url]', ']');
    $bb_recebe = array('<b>', '</b>', '<i>', '</i>', '<u>', '</u>', '<a href="', '">' . $urlTexto . '</a>', '</a>', '">');

    $bbCodeResult = str_replace($bb_troca, $bb_recebe, $string);

    return $bbCodeResult;
}
