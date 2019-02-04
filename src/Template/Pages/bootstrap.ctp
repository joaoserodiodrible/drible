<main class="bd-masthead" id="content" role="main">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="container">
          <div class="text-center">
            <img src="/img/bootstrap.gif" class="img-fluid">
          </div>
          <hr>
          <h2>Introdução à <i>framework</i></h2>
          <p class="lead">Para quem não conhece o <strong>Bootstrap</strong> trata-se de uma <strong>framework front-end</strong> que facilita a criação da interface visual do seu site/página.</p>
          <p class="lead">A framework conta com uma série de recursos visuais pré-construídos que permitem inserir no site ou aplicativo, com facilidade, desde botões, painéis, tabelas personalizadas, formulários, alertas e muito mais.
            A ferramenta também conta com uma biblioteca de funções javascript que permitem criar modais, slides, carousels, tabs, popovers e outros elementos.</P>
            <div class="text-center">
              <img src="/img/templateboot.jpg" class="img-fluid">
              <figcaption class="figure-caption">Desenvolvido em Bootstrap</figcaption>
            </div>
            <hr>
            <h2>Vantagens de usar esta <i>framework</i></h2>
            <ul>
              <li class="lead"><strong>Fácil de usar: </strong>Bootstrap é fácil de usar e de entender. Ele vem com HTML básico e Modelos CSS, é muito adaptável e pode ser codificado em qualquer IDE ou Editor. Já que ele vem com blocos de código prontos para usar, isso é mais fácil para colaborar com os modelos básicos e com suas exigências. E ele não apenas fácil de usar, mas também muito rápido. </li>
              <li class="lead"><strong>Sistema de grades: </strong>O sistema de grade do Bootstrap é responsivo e permite até 12 colunas através da página. Ele tem 4 diferentes classes, dependendo do dispositivo e pode ser integrado com outro para criar layouts flexíveis. O layout do site, especialmente aqueles são vistos tanto em navegadores de desktops, quanto em dispositivos móveis, são de extrema importância. O aplicativo deve ser capaz de se ajustar dependendo do tamanho da tela. É nesse ponto que o
                sistema de grades do Bootstrap começa a ser útil.</li>
                <li class="lead"><strong>Componentes disponíveis gratuitamente: </strong>Como o Bootstrap vem com uma imensa coleção de componentes em pré-pacotes, fica fácil de entender e utilizar. Desde Dropdowns até barras de progresso, Bootstrap cobre quase todos os estilos. Isso também inclui grátis para usar, mais de 250 símbolos em formato de fonte.</li>
                <li class="lead"><strong>Plugins de JavaScript facilmente integrados: </strong>Bootstrap oferece quase uma dúzia de plugins do JavaScript para fazer o design ser mais fácil.</li>
                <li class="lead"><strong>Responsividade: </strong>Bootstrap faz os aplicativos móveis se ajustar na resolução de tela de maneira apropriada.</li>
                <li class="lead"><strong>Ótimo suporte: </strong>O Bootstrap é um projeto de código aberto hospedado no Github, onde existe uma grande e amigável comunidade de suporte que é constantemente atualizada.</li>
              </ul>
              <hr>
              <h2 class="pt-2"> Como instalar o Bootstrap </h2>
              <h4 class="pt-4">Instalação com Bower</h4>
              <p class="lead">Podes também instalar e manusear o Less, CSS, JavaScript e fonts do Bootstrap usando Bower:</p>
              <code>$ bower install bootstrap</code>
              <h4 class="pt-4">Instalação com npm</h4>
              <p class="lead">Podes instalar também através do npm: </p>
              <code>$ npm install bootstrap@3</code>
              <p class="lead pt-3"><code>require('bootstrap')</code> irá carregar todos os plugins jQuery do Bootstrap no objeto jQuery. O módulo de <code>bootstrap</code> não exporta nada. Você pode carregar manualmente os plugins jQuery do Bootstrap individualmente, carregando os arquivos <code> /js/*.js</code> no diretório de nível superior do pacote.</p>
              <p class="lead pt-3">O <code>package.json</code> do Bootstrap contém alguns metadados adicionais sob as seguintes chaves:</p>
              <ul>
                <li class="lead"> <code>less</code> - caminho para o arquivo principal Less do Bootstrap</li>
                <li class="lead"><code>style</code> - caminho para CSS não minificado do Bootstrap, que foram pré-compilados usando as configurações padrão (sem personalização)</li>
              </ul>
              <h4 class="pt-4">Instalação com Composer</h4>
              <p class="lead pt-4 pb-2"> Você pode tambem instalar e manusear o Less, CSS, JavaScript e fonts do Bootstrap usando Composer:</p>
              <code> $ composer require twbs/bootstrap </code>
              <h4 class="pt-4">Instalação através de um setup & Configuração dentro do editor de texto</h4>
              <p class="lead"> Podes também concretizar a instalação através de uma instalaçã direta clicando neste <a href="#">link (Irá iniciar automaticamente)</a>. Após o término do download, deverás ter estas duas pastas:</p>
              <div class="text-center">
                <img src="/img/pastas.png" class="img-fluid" style="width:100%;height:auto;">
                <figcaption class="figure-caption"> Pastas css & js do Bootsrap </figcaption>
              </div>
              <p class="lead p-4"> De seguida, entras na pasta "www" do teu WAMP64 e extrais essas duas pastas para dentro da pasta do teu site.</p>
              <div class="text-center">
                <img src="/img/pastas1.png" class="img-fluid" style="width:100%;height:auto;">
              </div>
              <p class="p-4"></p>
              <div class="p-2" style="border:1px solid rgb(255,0,0);">
                <p><div class="text-danger"><strong> NOTA:</strong></div> Caso tenhas o XAMPP instalado, tens de extrair para a pasta htdocs.</p>
              </div>
              <p class="lead pt-4"> Depois abres o editor de texto e escreves os seguintes códigos</p>
              <p class="lead"><code>meta name="viewport" content="width=device-width, initial-scale=1.0"</code></p>
              <p class="lead pt-2"><code> link rel="stylesheet" href="(diretório do bootstrap css)" </code> </p>
              <p class="lead pt-2"><code> script type="text/javascript" href="(diretório do bootstrap js)" </code> </p>
              <p class="lead pt-2">Deverás ter o código conforme a imagem abaixo: </p>
              <div class="text-center">
                <img src="/img/figura1.png" class="img-fluid" style="width:100%;height:auto;">
              </div>
              <p class="lead pt-4"> E já está pronto a ser utilizado </p>
              <h2> Usar bootstrap sem fazer download </h2>
              <p class="lead pt-4"> Copia os seguintes códigos através deste <a href="https://www.bootstrapcdn.com/">link</a> Segues os passos abaixo e dás copy no código contornado a vermelho. Depois de dares copy só tens de dar paste no teu editor.</p>
              <div class="text-center">
                <img src="/img/pasta2.png" class="img-fluid" style="width:100%;height:auto;">
              </div>
              <hr>
              <!-- ALINHAMENTO -->
              <h2>Utilização de classes que poderão ser úteis</h2>
              <h4 class="pt-4"> Alinhamento de texto, imagens... </h4>
              <p class="lead pt-3"><code>class="text-left"</code> Alinha à <strong>esquerda</strong></p>
              <div class="text-center"><p class="lead"><code>class="text-center"</code> Alinha ao <strong>centro</strong></p></div>
              <div class="text-right"><p class="lead"><code>class="text-right"</code> Alinha à <strong>direita</strong></p></div>
              <!-- PADDING -->
              <h4 class="pt-3">Espaçamento (padding) </h4>
              <p class="lead"><code>class="pt-(valor)"</code><strong> pt-</strong> Espaçamento em relação ao que <strong>está em cima</strong></p>
              <p class="lead"><code>class="pl-(valor)"</code><strong> pl-</strong> Espaçamento em relação <strong>à esquerda</strong></p>
              <p class="lead"><code>class="pr-(valor)"</code><strong> pr-</strong> Espaçamento em relação <strong>à direita</strong></p>
              <p class="lead"><code>class="pb-(valor)"</code><strong> pb-</strong> Espaçamento em relação ao que <strong>está abaixo</strong></p>
              <!-- CORES BACKGROUND -->
              <h4 class="pt-3">Cores de fundo e de texto</h4>
              <p class="lead"><code>class=".bg-primary"</code><strong> -primary</strong> Coloca o background <strong>azul</strong></p>
              <p class="lead"><code>class=".bg-secondary"</code><strong> -secondary</strong> Coloca o background <strong>cizento</strong></p>
              <p class="lead"><code>class=".bg-success"</code><strong> -success</strong> Coloca o background <strong>verde</strong></p>
              <p class="lead"><code>class=".bg-danger"</code><strong> -danger</strong> Coloca o background com tom <strong>vermelhado</strong></p>
              <p class="lead"><code>class=".bg-warning"</code><strong> -warning</strong> Coloca o background em tom <strong>amarelado</strong></p>
              <p class="lead"><code>class=".bg-dark"</code><strong> -dark</strong> Coloca o background num tom semelhante ao <strong>preto</strong></p>
              <p class="lead"><code>class=".bg-light"</code><strong> -light</strong>Coloca o background no tom semelhante ao <strong>branco</strong> </p>
              <div class="pl-3" style="border:1px solid rgb(255,0,0);">
                <p><div class="text-danger"><strong> NOTA: </div> Para mudar a cor do texto é só mudar a sintaxe de <code>.bg-primary</code> para <code>text-primary</strong></code></p>
              </div>
              <h4 class="pt-5"> Tornar as imagens responsivas </h4>
              <p class="lead">As imagens no Bootstrap são responsivas com a seguinte sintaxe <code>.img-fluid. max-width: 100%; height: auto;</code> que são aplicados à imagem para que ela seja redimensionada.</p>
              <hr>
              <div class="text-center">
                <h2> Temas desenvolvidos em Bootstrap </h2>
              </div>
            </div>
            <!-- INICIO DOS TEMAS -->
            <div class="row">
              <div class="col-6">
                <img src="/img/tema1.JPG" class="img-fluid pt-4">
              </div>
              <div class="col-6">
                <img src="/img/tema2.jpg" class="img-fluid pt-4">
              </div>
            </div>
            <!-- OUTRA LINHA DE TEMAS -->
            <div class="row">
              <div class="col-6">
                <img src="/img/tema3.jpg" class="img-fluid pt-4">
              </div>
              <div class="col-6">
                <img src="/img/tema4.JPG" class="img-fluid pt-4">
              </div>
            </div>
            <!-- OUTRA LINHA DE TEMAS -->
            <div class="row">
              <div class="col-6">
                <img src="/img/tema5.JPG" class="img-fluid pt-4">
              </div>
              <div class="col-6">
                <img src="/img/tema6.JPG" class="img-fluid pt-4">
              </div>
            </div>
            <!-- FIM DOS TEMAS  -->
          </div>
        </div>
      </div>
    </div>
  </main>
