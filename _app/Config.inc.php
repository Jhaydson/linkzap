<?php

// CONFIGRAÇÕES DO BANCO ####################
define('HOST', 'bdhost0075.servidorwebfacil.com');
define('USER', 'speedcon_jaidson');
define('PASS', 'Jaidson00123!');
define('DBSA', 'speedcon_speed');

// DEFINE SERVIDOR DE E-MAIL ################
define('MAILUSER', 'email@dominio.com.br');
define('MAILPASS', 'senhadoemail');
define('MAILPORT', 'postadeenvio');
define('MAILHOST', 'servidordeenvio');

// DEFINE IDENTIDADE DO SITE ################
define('SITENAME', 'Cidade Online');
define('SITEDESC', 'Este site foi desenvolvido no curso de PHP Orientado a Objetos da UPINSIDE TREINAMENTOS. O mesmo utiliza a arquitetura semântica do HTML5 e foi criado com as últimas técnologias disponíveis!');

// DEFINE A BASE DO SITE ####################
define('HOME', 'http://dominiocompleto.com.br');
define('THEME', 'speed');

define('INCLUDE_PATH', HOME . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . THEME);
define('REQUIRE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);

// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {

  $cDir = ['Conn', 'Helpers', 'Models'];
  $iDir = null;

  foreach ($cDir as $dirName):
    if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php') && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php')):
      include_once (__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php');
      $iDir = true;
    endif;
  endforeach;

  if (!$iDir):
    trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
    die;
  endif;
}

// TRATAMENTO DE ERROS #####################
//CSS constantes :: Mensagens de Erro
define('WS_ACCEPT', 'success');
define('WS_INFOR', 'info');
define('WS_ALERT', 'warning');
define('WS_ERROR', 'danger');

//WSErro :: Exibe erros lançados :: Front
function WSErro($ErrMsg, $ErrNumero, $ErrNo, $ErrDie = null) {
  $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
  if ($ErrNo == WS_INFOR) {
    $iconeAlert = 'info';
  } elseif ($ErrNo == WS_ALERT) {
    $iconeAlert = 'exclamation-triangle';
  } elseif ($ErrNo == WS_ERROR) {
    $iconeAlert = 'hand-paper';
  } else {
    $iconeAlert = 'thumbs-up';
  }
  echo "<div class=\"alert alert-{$ErrNo} \" role=\"alert\" id=\"alertMsg\"style=\"text-align:left; margin:auto;\">
        <button type=\"button\" onclick=\"fecharMSG()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" >×
        </button>
        <i class=\"fa fa-$iconeAlert\" aria-hidden=\"true\"></i>
                                 {$ErrMsg} {$ErrNumero}
                            </div> ";
  if ($ErrDie):
    die;
  endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
  $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
  echo "<p class=\"trigger {$CssClass}\">";
  echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
  echo "<small>{$ErrFile}</small>";
  echo "<span class=\"ajax_close\"></span></p>";

  if ($ErrNo == E_USER_ERROR):
    die;
  endif;
}

set_error_handler('PHPErro');

// escolhendo idioma;

