
<?php
ob_start();
session_start();
require_once './_app/Config.inc.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

  <!-- Mirrored from www.convertte.com.br/gerador-link-whatsapp/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Feb 2019 19:03:22 GMT -->
  <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerador de Link para Whatsapp</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <style>
      .scroll {
        max-height: 400px;
        overflow-y: auto;
      }

    </style>
    <link rel="stylesheet" href="css/bootstrap.css">


    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML4C83"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app" class="row">   
      <aside class="col col-12">
        <ul class="list-number">
          <?php
          $dados = new Read();
          $dados->ExeRead("item, product", "WHERE item.id_product = product.id_product ORDER BY date DESC LIMIT 100");
          ?>
          <div class="row ">
            <div class="card-body scroll">
              <div class="card-title col-12 white">Lista de Telefones</div>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Item</th>
                    <th scope="col">Data</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Telefone</th>
                    <th>Mensagem</th>
                    <th scope="col">Text</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($dados->getResult() as $itens) {
                    ?>

                    <tr>
                      <th scope="row">
                        <div class="checkbox">  
                          <input type="checkbox" id="check<?=$i?>" class="get_value" value="PHP" />

                        </div> 


                      </th>
                      <th scope="row"><?= $itens['cod'] ?> </th>
                      <td><?= $itens['date'] ?></td>
                      <td><?= $itens['amount'] ?></td>
                      <td><?= $itens['ValueFinalProduct'] ?></td>
                      <?php
                      if ($itens['frontSize'] == 'withoutPrint') {
                        $itens['frontSize'] = 'Sem Estampa';
                      }
                      if ($itens['backSize'] == 'withoutPrint') {
                        $itens['backSize'] = 'Sem Estampa';
                      }


                      $descDin = $itens['ValueFinalProduct'] * 0.95;
                      $descDine = $itens['ValueFinalProduct'] * 0.05;
                      $subtotal = $itens['amount'] * $itens['ValueFinalProduct'];
                      $dessfull = $descDine * $itens['amount'];
                      $total = $subtotal - $dessfull;


                      $dessfull = number_format($dessfull, 2, ',', '.');
                      $descDins = number_format($descDin, 2, ',', '.');
                      $valUnit = number_format($itens['ValueFinalProduct'], 2, ',', '.');
                      $total = number_format($total, 2, ',', '.');

                      $p = array("(", ")", "-", " ");
                      $tel = str_replace($p, "", $itens['telephone']);
                      $enter = "\n\n";
                      $enters = "\n";
                      $text = ""
                              . "Olá, ficou alguma dúvida sobre o orçamento de nº*" . $itens['cod'] . "*" . $enter
                              . "Confira os dados do seu orçamento:" . $enters
                              . "Modelo: *" . $itens['name'] . "*" . $enters
                              . "Quantidade:*" . $itens['amount'] . "*" . $enters
                              . "Malha:*" . $itens['mash'] . "*" . $enter
                              . "*Estampa*" . $enters
                              . "Frente: *" . $itens['frontSize'] . " " . $itens['frontAmountColor'] . " cores*" . $enters
                              . "Costas: *" . $itens['backSize'] . " " . $itens['backAmountColor'] . " cores*" . $enter
                              . "*Valores*" . $enters
                              . "Valor Unitário: *R$ " . $valUnit . "*" . $enters
                              . "Valor Unit c/ Desconto: *R$ " . $descDins . "*" . $enters
                              . "Sub Total: *R$ " . $subtotal . "*" . $enters
                              . "Desconto Total: *R$ " . $dessfull . "*" . $enters
                              . "Valor Total: *R$ " . $total . "*" . $enter
                              . "Vamos dar continuidade?"
                      ;
                      ?>

                      <td><a class="btn badge-primary" target="_blank" href="https://api.whatsapp.com/send?phone=55<?= $tel ?>"><?= $itens['telephone'] ?></a>
                      </td>
                      <td>
                        <div id="" class="" style="font-size: 8pt">
                                                   
                          <textarea id="camptxt<?= $i ?>"><?= $text?></textarea>
                              
                    
                        </div>
                      </td>
                      <td>
                        <a onclick="CopiarTxt('camptxt' + [<?= $i ?>], '<?= $itens['cod'] ?>');" class="btn btn-warning">Copiar</a>
                      </td>

                    </tr>

                    <?php
                    $i++;
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
          <?php ?>



        </ul>


      </aside>


    </div>
  </div>

  <script src="./source/cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js">

  </script> 
  <script src="./source/unpkg.com/axios%400.17.0/dist/axios.min.js"></script>  
  <script src="./js/mask.min.js"></script>
  <script src="./js/main.min.js"></script>
  <script>

                        function CopiarTxt(camptxt, item) {

                          debugger;
                          const myTxt = document.getElementById(camptxt).value;
                          const myT = document.getElementById(camptxt);
                          myT.select();
                          document.execCommand("copy");

                        }

  </script>:

</body>

<!-- Mirrored from www.convertte.com.br/gerador-link-whatsapp/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Feb 2019 19:03:27 GMT -->
</html>
