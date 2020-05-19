<?

if (!isset($_SESSION['nick']) and URL::getURL(0) == 'admin'):
    header("Location: " . LinkLogin);
    exit;
endif;

// VALIDAR USUARIOS
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'usuarios' and URL::getURL(2) == NULL):
    header("Location: " . LinkAdmin);
    exit;
endif;
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'usuarios' and URL::getURL(2) == 'cadastrar'):
    header("Location: " . LinkAdmin);
    exit;
endif;
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'usuarios' and URL::getURL(2) == 'atualizar'):
    header("Location: " . LinkAdmin);
    exit;
endif;

// VALIDAR PUBLICAÇÕES
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(2) == 'categorias'):
    header("Location: " . LinkAdmin);
    exit;
endif;

// VALIDAR PAGINAS
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'paginas' and URL::getURL(2) == NULL):
    header("Location: " . LinkAdmin);
    exit;
endif;
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'paginas' and URL::getURL(2) == 'cadastrar'):
    header("Location: " . LinkAdmin);
    exit;
endif;
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'paginas' and URL::getURL(2) == 'atualizar'):
    header("Location: " . LinkAdmin);
    exit;
endif;

// VALIDAR MENU
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'menu' and URL::getURL(2) == NULL):
    header("Location: " . LinkAdmin);
    exit;
endif;

// VALIDAR LAYOUT
if (isset($_SESSION['nivel']) and $_SESSION['nivel'] == '0' and URL::getURL(1) == 'layout' and URL::getURL(2) == NULL):
    header("Location: " . LinkAdmin);
    exit;
endif;