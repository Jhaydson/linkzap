
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


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({'gtm.start':
                  new Date().getTime(), event: 'gtm.js'});
        var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
                '../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-ML4C83');</script>
    <!-- End Google Tag Manager -->
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML4C83"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app" class="box-center">   
      <aside class="col-half col-half--first">
        <figure class="flex-default">
          <img src="images/logo.png" alt="" class="img"/>
        </figure>

        <h2 class="tit-principal">Como funciona?</h2>
        <ul class="list-number">
          <?php
          $dados = new Read();
          $dados->ExeRead("itens");


          foreach ($dados->getResult() as $lista) {
            print "numero do pedido";
          }
          ?>



        </ul>
        <h6><span style="color: #ffffff;">O gerador de links para o WhatsApp é uma ótima ferramenta para ações de marketing ou relacionamento. Com o link para mensagens personalizadas do WhatsApp, você poderá utilizar em campanhas, redes sociais, email marketing, banners e etc. O bom de encurtar e personalizar links e mensagens do WhatsApp é que funcionará no desktop e no mobile da mesma forma. Faça bom uso da ferramenta encurtadora de WhatsApp.</span></h6>

      </aside>

      <div class="col-half flex-center">
        <script async src="./source/pagead2.googlesyndication.com/pagead/js/f.txt"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-6656297947223154",
              enable_page_level_ads: true
            });
        </script>
        <script async src="./source/pagead2.googlesyndication.com/pagead/js/f.txt"></script>
        <!-- CVTT_WHATSAPP -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6656297947223154"
             data-ad-slot="2494581499"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <img src="images/logo-whatsapp.png" alt="" class="img img--whatsapp"/>     
        <h2 class="tit-principal">Gerador de link para Whatsapp</h2>

        <div class="box-mensagem box-mensagem--error" v-if="mensagemError">
          {{ mensagemError }}
        </div>    

        <form class="form" @submit="event.preventDefault()" v-if="!sucessForm">
          <div class="form__control">
            <label for="numero" class="form__label">N° do celular</label>
            <input type="text" placeholder="(99) 9 9999-9999" class="form__input" id="numero" v-model="numero" @keyup="validaNumero" />
            <input type="text" class="input-hidden" v-model="robo" />
          </div>

          <div class="form__control">
            <label for="mensagem" class="form__label">Mensagem</label>
            <input type="text" placeholder="Escreva o texto" class="form__input" id="mensagem" v-model="mensagem"/>
          </div>

          <button type="submit" class="form__submit" @click="gerarLink">Gerar Link</button>
          <small class="tit-obs">Não guardamos nenhum dado informado.</small>
        </form>

        <div class="box-mensagem" v-if="sucessForm">
          <h2><strong>Pronto!</strong> Copie e compartilhe com usuários do Whatsapp!</h2>    

          <div class="box-input form form--inline">
            <input type="text" class="form__input form__input--text" v-model="link" />
            <input type="text" class="input-hidden" v-model="robo" />
            <button class="form__submit form__input--copy" @click="copiarLink">Copiar Link</button>
            <button :disabled="encurtado == 1" class="form__submit form__submit--short" @click="ajaxBitly">Encurtar</button>
          </div>

          <a href="#" class="btn-link" @click="gerarNovoLink">Gerar novo link.</a>
        </div>
      </div>
    </div>

    <script src="./source/cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js">
        debugger;
    </script> 
    <script src="./source/unpkg.com/axios%400.17.0/dist/axios.min.js"></script>  
    <script src="./js/mask.min.js"></script>
    <script src="./js/main.min.js"></script>
  </body>

  <!-- Mirrored from www.convertte.com.br/gerador-link-whatsapp/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Feb 2019 19:03:27 GMT -->
</html>
