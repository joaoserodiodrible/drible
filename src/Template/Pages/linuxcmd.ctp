<main class="bd-masthead" id="content" role="main">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="container">
          <div class="text-center">
            <img src="/img/linux.png" class="img-fluid">
          </div>
          <h2 class="text-center pt-3"> Shell script para linux </2>
            <hr>
            <h2 class="pt-5"> Criação do Shell script </h2>
            <p class="lead"> Em primeiro lugar precisaremos de um arquivo para escrever o nosso script. Podemos fazer isso via terminal ou via modo gráfico, sendo que, no último caso, basta apenas clicar com o botão direito do rato e escolher um diretório para o nosso ficheiro <code>criar novo arquivo de texto</code> ou <code>criar novo documento</code>.</p>
            <p class="lead">Para criar um arquivo via terminal, basta abrir o mesmo e digitar <code>viexemplo1.sh</code>, mas também podemos digitar <code>touchexemplo1.sh</code></p>
            <p class="lead">O comando <code>vi</code> cria e abre um arquivo para leitura/escrita no terminal, enquanto o comando <code>touch</code> cria um arquivo, mas não o abre. Posteriormente é possível abri-lo com um editor de sua preferência.</p>
            <hr>
            <h2> Atribuir permissões ao arquivo </h2>
            <p class="lead">Para editar o arquivo, precisamos de lhe dar permissões de escrita.</p>
            <p class="lead">Para a primeira alternativa, em que o <code>vi</code> abriu diretamente o arquivo, precisamos de pressionar <code>ESC</code> para editá-lo, assim, fazendo isso, vai aparecer o seguinte caractere <code>:</code> , então digite <code>!chmod777%</code>.</p>
            <p class="lead">Para a segunda alternativa, em que o <code>touch</code> não abriu o arquivo criado, basta digitar: <code>chmod777exemplo1.sh</code>.</p>
            <p class="lead">O <code>chmod</code> é utilizado para atribuir permissões a arquivos e/ou diretórios. O valor <code>777</code> concede todos os direitos (read, write, execute) para o utilizador, o grupo e os outros. Invés de <code>777</code>, outro modo de fazer isso é digitando <code>+rwx</code>.</p>
            <p class="lead">O caractere <code>!</code> força o <code>vi</code> a executar o que lhe está a ser pedido (neste caso, executar o <code>chmod</code>).</p>
            <p class="lead">O caractere <code>%</code> faz referência ao arquivo atual. Pode-se também, invés de utilizá-lo, fornecer o nome do arquivo.</p>
            <hr>
            <h2>Edição e execução do arquivo</h2>
            <p class="lead">Neste exemplo utilizaremos o <code>vi</code>, no terminal, mas você pode escolher qualquer outro editor, gráfico ou não.</p>
            <p class="lead">Abra o arquivo com o comando <code>vi exemplo1.sh</code>, com o <code>vi</code> você precisa de digitar <code>i</code> para colocá-lo no modo de inserção.</p>
            <p class="lead pb-2">Um shell script começa (não necessariamente) definindo qual o interpretador de comandos que será utilizado para interpretar e executar o script. Existem outros além do <code>bash</code>, como o <code>sh</code>, o <code>ksh</code> e o <code>csh</code>.</p>
            <div class="text-center">
              <img src="/img/shell1.JPG" class="img-fluid">
              <p class="pt-2"></p>
              <img src="/img/shell2.JPG" class="img-fluid">
            </div>
            <p class="lead pt-3">A primeira linha de um shell script define qual o interpretador de comandos será utilizado.</p>
            <p class="lead">Repara que utilizamos o <code>path</code> completo onde se encontra o <code>shell</code>, no caso, no diretório <code>/bin/</code>.</p>
            <hr>
            <!-- COMANDOS/OPERADORES -->
            <h2> Comandos e operadores lógicos </h2>
            <h4 class="pt-4"> Comparação Numérica </h4>
            <ul>
              <li class="lead"><code>-lt</code>: É menor que (LessThan) </li>
              <li class="lead"><code>-gt</code>: É maior que (GreaterThan)</li>
              <li class="lead"><code>-le</code>: É menor ou igual (LessEqual)</li>
              <li class="lead"><code>-ge</code>: É maior ou igual (GreaterEqual)</li>
              <li class="lead"><code>-eq</code>: É igual (EQual)</li>
              <li class="lead"><code>-ne</code>: É diferente (NotEqual)</li>
            </ul>
            <h4 class="pt-4"> Comparação de Strings </h4>
            <ul>
              <li class="lead"><code>=</code>: É igual</li>
              <li class="lead"><code>!=</code>: É diferente</li>
              <li class="lead"><code>-n</code>: É não nula (não vazia)</li>
              <li class="lead"><code>-z</code>: É nula (vazia)</li>
            </ul>
            <h4 class="pt-4"> Operadores Lógicos </h4>
            <ul>
              <li class="lead"><code>!</code>: NÃO lógico (NOT)</li>
              <li class="lead"><code>-a</code>: E lógico (AND)</li>
              <li class="lead"><code>-o</code>: OU lógico (OR)</li>
            </ul>
            <hr>
            <!-- FIM OPERADORES -->
            <h2>Estruturas de condição</h2>
            <p class="lead">As estruturas de condição deslocam o fluxo de execução, conforme as determinadas condições.</p>
            <!-- IF -->
            <h4> Estruta IF </h4>
            <div class="text-center">
              <img src="/img/shell3.JPG" class="img-fluid">
            </div>
            <p class="lead pt-3">Onde:</p>
            <ul>
              <li class="lead"><code>CONDICAO:</code> testa que, se for verdadeiro, passará o controlo para o bloco dentro do <code>then;</code></li>
              <li class="lead"><code>AÇÕES:</code> serão os comandos a serem executados se o resultado de <code>CONDICAO</code><strong> for verdadeiro</strong>.</li>
            </ul>
            <div class="p-3" style="border:1px solid #000;">
              <p class="lead"><strong>Nota:</strong> É muito comum o programador esquecer-se de fechar o <code>if</code>. Lembre-se sempre que, para cada <code>if</code> aberto, você precisa de fechá-lo com o <code>fi</code>.</p>
            </div>
            <p class="lead pt-4">Vamos a um exemplo prático em que o utilizador deverá digitar um número e verificaremos se ele está num determinado intervalo.</p>
            <div class="text-center">
              <img src="/img/shell4.JPG" class="img-fluid">
            </div>
            <hr>
            <!-- ELSE -->
            <h4>O comando else</h4>
            <p class="lead">Existe a possibilidade de também tratar o nosso caso em que o nosso teste falha. Para isso temos o comando else, cuja sintaxe é:</p>
            <div class="text-center">
              <img src="/img/shell5.JPG" class="img-fluid">
            </div>
            <p class="lead pt-4">Onde:</p>
            <ul>
              <li class="lead"><code>CONDICAO</code>: testa que, se for verdadeiro, passará o controlo para o bloco dentro do <code>then</code>;</li>
              <li class="lead"><code>AÇÕES_1</code>: comandos a serem executados se o resultado da <code>CONDICAO</code><strong>for verdadeiro</strong>;</li>
              <li class="lead"><code>AÇÕES_2</code>: comandos a serem executados se o resultado da <code>CONDICAO</code><strong>for falso</strong>.</li>
            </ul>
            <p class="lead">Vejamos um exemplo prático onde iremos verificar se um número digitado pelo utilizador é positivo ou negativo.</p>
            <div class="text-center">
              <img src="/img/shell6.JPG" class="img-fluid">
            </div>
            <hr>
            <!-- ELIF -->
            <h4> O comando elif </h4>
            <p class="lead">Há casos em que temos mais do que uma condição a ser testada, todas relacionadas. Para isso existe o comando <code>elif</code>, cuja sintaxe é:</p>
            <div class="text-center">
              <img src="/img/shell7.JPG" class="img-fluid">
            </div>
            <p class="lead pt-4">Onde: </p>
            <ul>
              <li class="lead"><code>CONDICAO_1 … CONDICAO_N</code>: teste que, se for verdadeiro, passará o controlo para o bloco dentro do respectivo <code>then</code>;</li>
              <li class="lead"><code>AÇÕES_1 … AÇÕES_N</code>: comandos a serem executados se os resultados de <code>CONDICAO_1 … CONDICAO_N</code> forem verdadeiros.</li>
            </ul>
            <hr>
            <!-- CASE -->
            <h4>O comando case</h4>
            <p class="lead">O comando <code>case</code> tem a mesma funcionalidade do <code>if...then...elif</code>, com a diferença de sua sintaxe ser mais compacta:</p>
            <div class="text-center">
              <img src="/img/shell8.JPG" class="img-fluid">
            </div>
            <p class="lead pt-4">Onde: </p>
            <ul>
              <li class="lead"><code>VARIAVEL</code>: variável que terá seu valor verificado;</li>
              <li class="lead"><code>CASO_1 … CASO_N</code>: possíveis estados da variável;</li>
              <li class="lead"><code>AÇÕES_1 … AÇÕES_N</code>: ações a serem tomadas caso a variável combine com <code>CASO_1 … CASO_N</code>, respectivamente.</li>
            </ul>
            <hr>
            <h4 class="pt-4 pb-4">LOOP for </h4>
            <p class="lead">Loops são muito úteis para ficar iterando sobre determinadas ações até que uma condição seja satisfeita e interrompa o ciclo.</p>
            <div class="text-center">
              <img src="/img/shell9.JPG" class="img-fluid">
            </div>
            <p class="lead pt-4">Onde:</p>
            <ul>
              <li class="lead"><code>VARIAVEL</code>: variável cujo valor será inicializado e incrementado, respeitando os limites dos valores do conjunto fornecido;</li>
              <li class="lead"><code>VALOR_1, VALOR_2 … VALOR_N</code>: valores que <code>VARIAVEL</code> poderá assumir durante o loop;</li>
              <li class="lead"><code>AÇÕES</code>: ações a serem tomadas repetidamente até que o valor de <code>VARIAVEL</code> ultrapasse o último valor informado no conjunto de valores fornecido.</li>
            </ul>
            <div class="p-3" style="border:1px solid #000;">
              <p class="lead"><strong>Nota</strong>: A sequência <code>VALOR_1, VALOR_2 … VALOR_N</code>; na sintaxe pode ser substituída por: <code>{VALOR_1..VALOR_N}</code>.</p>
            </div>
            <p class="lead pt-4 pb-4">Veja o exemplo abaixo, que faz a contagem decrescente de 10 a 0.</p>
            <div class="text-center">
              <img src="/img/shell11.JPG" class="img-fluid">
            </div>
            <hr>
            <h4 class="pt-4">LOOP while</h4>
            <p class="lead">Enquanto que o loop for é mais ideal para quando sabemos até quanto iremos contar, o loop while é bom para quando não temos essa noção, mas sabemos de uma condição que deverá ser atendida para que o laço termine.Logo a sua sintaxe é:</p>
            <div class="text-center">
              <img src="/img/shell10.JPG" class="img-fluid">
            </div>
            <p class="lead">Onde:</p>
            <ul>
              <li class="lead"><code>CONDICAO</code>: condição cuja veracidade determina a permanência no ciclo;</li>
              <li class="lead"><code>AÇÕES</code>: ações a serem tomadas enquanto <code>CONDICAO</code> <strong>for verdadeira</strong>.</li>
            </ul>
            <p class="lead"> O exemplo abaixo representa um sistema onde o utilizador pode digitar o que quiser, porém se colocar "-1", o programa termina o ciclo. </p>
            <div class="text-center">
              <img src="/img/shell12.JPG" class="img-fluid">
            </div>
            <hr>
            <!-- asdasdasdasdasdasdasdasdadasdasdadasdasd -->
            <!-- REDES -->
            <h2> Comandos de Rede </h2>
            <hr>
            <h2>wget</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>wget [option]... [URL]...</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>wget</code> significa "<strong>w</strong>eb <strong>get</strong>"</p>
            <p class="lead"><code>wget</code> é um comando utilitario que faz download de ficheiros de uma rede</p>
            <hr>
            <h2>dig</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>dig [@server] [-b address] [-c class] [-f filename] [-k filename] [-p port#] [-t type] [-x addr] [-y name:key] [-4] [-6] [name] [type] [class] [queryopt...]<br><br></code>
            <code>dig [-h]<br><br></code>
            <code>dig [global-queryopt...] [query...]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">dig (que significa <strong>D</strong>omain <strong>I</strong>nformation <strong>G</strong>roper) é uma ferramenta flexível para interrogar servidores de nomes DNS.</p>
            <hr>
            <h2>ifconfig</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ifconfig [-v] [-a] [-s] [interface]<br><br></code>
            <code>ifconfig [-v] interface [aftype] options | address ...</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>ifconfig</code> significa "<strong>I</strong>nter<strong>f</strong>ace <strong>Config</strong>uration", é usado para visualizar e alterar a configuração das interfaces de rede em seu sistema.</p>
            <hr>
            <h2>ifdown</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ifdown [-nv] [--no-act] [--verbose] [-i FILE|--interfaces=FILE] [--allow CLASS] -a|IFACE...</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">ifdown retira uma interface de rede, colocando-a em um estado em que não pode transmitir ou receber dados.</p>
            <hr>
            <h2>ifup</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ifup [-nv] [--no-act] [--verbose] [-i FILE|--interfaces=FILE] [--allow CLASS] -a|IFACE...<br><br></code>
            <code>ifup -h|--help<br><br></code>
            <code>ifup -V|--version</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">ifup traz uma interface de rede para cima, disponibilizando-a para transmitir e receber dados.</p>
            <hr>
            <h2>ifquery</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ifquery [-nv] [--no-act] [--verbose] [-i FILE|--interfaces=FILE] [--allow CLASS] -a|IFACE...<br><br></code>
            <code>ifquery -l|--list [-nv] [--no-act] [--verbose] [-i FILE|--interfaces=FILE] [--allow CLASS] -a|IFACE...</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">ifquery analisa a configuração de uma interface de rede, permitindo que você obtenha respostas para perguntas sobre como ela está configurada atualmente.</p>
            <hr>
            <h2>mtr</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>mtr [-hvrctglspni46] [--help] [--version] [--report] [--report-cycles COUNT] [--curses] [--split] [--raw] [--no-dns] [--gtk] [--address IP.ADD.RE.SS] [--interval SECONDS] [--psize BYTES | -s BYTES] HOSTNAME [PACKETSIZE]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">Diagnóstico de rede (<code>traceroute</code> / <code>ping</code>)</p>
            <p class="lead">O <code>mtr</code> combina a funcionalidade dos programas <code>traceroute</code> e <code>ping</code> em uma ferramenta de diagnóstico de rede.</p>
            <hr>
            <h2>nc</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>nc [-46bCDdhklnrStUuvZz] [-I length] [-i interval] [-O length] [-P proxy_username] [-p source_port] [-q seconds] [-s source] [-T toskeyword] [-V rtable] [-w timeout] [-X proxy_protocol] [-x proxy_address[:port]] [destination] [port]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>nc</code> é o comando que executa o netcat, um utilitário simples do Unix que lê e grava dados através de conexões de rede, usando o protocolo TCP ou UDP. Ele é projetado para ser uma ferramenta de "back-end" confiável que pode ser usada diretamente ou conduzida por outros programas e scripts. Ao mesmo tempo, é uma ferramenta de depuração e exploração de rede rica em recursos, pois pode criar praticamente qualquer tipo de conexão que você precisa e possui vários recursos internos interessantes.</p>
            <hr>
            <h2>netstat</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>netstat [address_family_options] [--tcp|-t] [--udp|-u] [--raw|-w] [--listening|-l] [--all|-a] [--numeric|-n] [--numeric-hosts] [--numeric-ports] [--numeric-users] [--symbolic|-N] [--extend|-e[--extend|-e]] [--timers|-o] [--program|-p] [--verbose|-v] [--continuous|-c]<br><br></code>
            <code>netstat {--route|-r} [address_family_options] [--extend|-e[--extend|-e]] [--verbose|-v] [--numeric|-n] [--numeric-hosts] [--numeric-ports] [--numeric-users] [--continuous|-c]<br><br></code>
            <code>netstat {--interfaces|-i} [--all|-a] [--extend|-e[--extend|-e]] [--verbose|-v] [--program|-p] [--numeric|-n] [--numeric-hosts] [--numeric-ports] [--numeric-users] [--continuous|-c]<br><br></code>
            <code>netstat {--groups|-g} [--numeric|-n] [--numeric-hosts] [--numeric-ports] [--numeric-users] [--continuous|-c]<br><br></code>
            <code>netstat {--masquerade|-M} [--extend|-e] [--numeric|-n] [--numeric-hosts] [--numeric-ports] [--numeric-users] [--continuous|-c]<br><br></code>
            <code>netstat {--statistics|-s} [--tcp|-t] [--udp|-u] [--raw|-w]<br><br></code>
            <code>netstat {--version|-V}<br><br></code>
            <code>netstat {--help|-h}</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>netstat</code> ("<code>net</code>work <code>stat</code>istics") é uma ferramenta de linha de comando que exibe conexões de rede (entrada e saída), tabelas de roteamento e várias interfaces de rede (controlador de interface de rede ou interface de rede definida por software) e de protocolo de rede.</p>
            <hr>
            <h2>nslookup</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>nslookup [-option] [name | -] [server]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O <code>nslookup</code>, que significa "<code>n</code>ame <code>s</code>erver <code>lookup</code>", é uma ferramenta útil para descobrir informações sobre um domínio nomeado.</p>
            <hr>
            <h2>ip</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ip [ OPTIONS ] OBJECT { COMMAND | help }</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">Mostrar e manipular roteamento, dispositivos, roteamento de políticas e túneis.</p>
            <hr>
            <h2>ping</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>ping [-LRUbdfnqrvVaAB] [-c count] [-m mark] [-i interval] [-l preload] [-p pattern] [-s packetsize] [-t ttl] [-w deadline] [-F flowlabel] [-I interface] [-M hint] [-N nioption] [-Q tos] [-S sndbuf] [-T timestamp option] [-W timeout] [hop ...] destination</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O <code>ping</code> é uma maneira simples de enviar dados de rede e receber dados de rede de outro computador em uma rede. É frequentemente usado para testar, no nível mais básico, se outro sistema pode ser acessado por uma rede e, em caso afirmativo, quanto tempo leva para que os dados sejam trocados.</p>
            <hr>
            <h2>rsync</h2>
            <h3 class="pt-2">Syntax</h3>
            <p class="lead">Uso local:</p>
            <code>rsync [OPTION...] SRC... [DEST]</code>
            <p class="lead">Acesso via shell remoto (PULL):</p>
            <code>rsync [OPTION...] [USER@]HOST:SRC... [DEST]</code>
            <p class="lead">Acesso via shell remoto (PUSH):</p>
            <code>rsync [OPTION...] SRC... [USER@]HOST:DEST</code>
            <p class="lead">Acesso via daemon rsync (PULL):</p>
            <code>rsync [OPTION...] [USER@]HOST::SRC... [DEST]<br><br></code>
            <code>rsync [OPTION...] rsync://[USER@]HOST[:PORT]/SRC... [DEST]</code>
            <p class="lead">Acesso via daemon rsync (PUSH):</p>
            <code>rsync [OPTION...] SRC... [USER@]HOST::DEST<br><br></code>
            <code>rsync [OPTION...] SRC... rsync://[USER@]HOST[:PORT]/DEST</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O rsync é uma ferramenta de cópia de arquivos rápida e extraordinariamente versátil. Pode copiar localmente, para / de outro host através de qualquer shell remoto, ou para / de um daemon rsync remoto. Ele oferece um grande número de opções que controlam cada aspecto de seu comportamento e permite uma especificação muito flexível do conjunto de arquivos a serem copiados. É famosa por seu algoritmo de transferência delta, que reduz a quantidade de dados enviados pela rede enviando apenas as diferenças entre os arquivos de origem e os arquivos existentes no destino. O rsync é amplamente usado para backups e espelhamento e como um comando de cópia aprimorado para uso diário.</p>
            <hr>
            <h2>ethtool</h2>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O ethtool é usado para consultar e controlar configurações de hardware e driver de dispositivo de rede, particularmente para dispositivos Ethernet com fio.</p>
            <hr>
            <h2>traceroute</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>traceroute [-46dFITUnreAV] [-f first_ttl] [-g gate,...] [-i device] [-m max_ttl] [-p port] [-s src_addr] [-q nqueries] [-N squeries] [-t tos] [-l flow_label] [-w waittime] [-z sendwait] [-UL] [-D] [-P proto] [--sport=port] [-M method] [-O mod_options] [--mtu] [--back] host [packet_len] </code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>raceroute</code> imprime a rota que os pacotes levam para um host de rede.</p>
            <hr>
            <h2>hostname</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>hostname [-v] [-a|--alias] [-d|--domain] [-f|--fqdn|--long] [-A|--all-fqdns] [-i|--ip-address] [-I|--all-ip-addresses] [-s|--short] [-y|--yp|--nis]<br><br></code>
            <code>hostname [-v] [-b|--boot] [-F|--file file name] [hostname]<br><br></code>
            <code>hostname [-v] [-h|--help] [-V|--version]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead"><code>hostname</code> é usado para exibir o nome DNS do sistema e para exibir ou definir seu nome de host ou nome de domínio NIS (Network Information Services).</p>
            <hr>
            <hr>dhclient</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>dhclient [ -4 | -6 ] [ -S ] [ -N [ -N... ] ] [ -T [ -T... ] ] [ -P [ -P... ] ] [ -p port ] [ -d ] [ -e VAR=value ] [ -q ] [ -1 ] [ -r | -x ] [ -lf lease-file ] [ -pf pid-file ] [ -cf config-file ] [ -sf script-file ] [ -s server ] [ -g relay ] [ -n ] [ -nc ] [ -nw ] [ -w ] [ -B ] [ -I dhcp-client-identifier ] [ -H host-name ] [ -F fqdn.fqdn ] [ -V vendor-class-identifier ] [ -R request-option-list ] [ -timeout timeout ] [ -v ] [ --version ][ if0 [ ...ifN ] ]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O Cliente DHCP do Internet Systems Consortium, dhclient, fornece um meio de configurar uma ou mais interfaces de rede usando o protocolo BOOTP ou, se esses protocolos falharem, atribuindo estaticamente um endereço.</p>
            <hr>
            <h2>route</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>route [-CFvnee]<br><br></code>
            <code>route [-v] [-A family] add [-net|-host] target [netmask Nm] [gw Gw] [metric N] i [mss M] [window W] [irtt m] [reject] [mod] [dyn] [reinstate] [[dev] If]<br><br></code>
            <code>route [-v] [-A family] del [-net|-host] target [gw Gw] [netmask Nm] [metric N] [[dev] If]<br><br></code>
            <code>route [-V] [--version] [-h] [--help]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">Mostrar ou manipular a tabela de roteamento IP.</p>
            <hr>
            <h2>host</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>host [-aCdlnrsTwv] [-c class] [-N ndots] [-R number] [-t type] [-W wait] [-m flag] [-4] [-6] {name} [server]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">Utilitário de pesquisa de DNS (e pesquisa inversa).</p>
            <hr>
            <h2>mii-tool</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>mii-tool [-v, --verbose] [-V, --version] [-R, --reset] [-r, --restart] [-w, --watch] [-l, --log] [-A, --advertise=media,...] [-F, --force=media] [interface ...]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">Este utilitário verifica ou define o status da unidade MII (Media Independent Interface) da interface de rede. A maioria dos adaptadores Ethernet rápidos usa uma MII para autonegociar a velocidade do link e a configuração do duplex.</p>
            <hr>
            <h2>tcpdump</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>tcpdump [ -AbdDefhHIJKlLnNOpqRStuUvxX ] [ -B buffer_size ] [ -c count ] [ -C file_size ] [ -G rotate_seconds ] [ -F file ] [ -i interface ] [ -j tstamp_type ] [ -m module ] [ -M secret ] [ -r file ] [ -s snaplen ] [ -T type ] [ -w file ] [ -W filecount ] [ -E spi@ipaddr algo:secret,... ] [ -y datalinktype ] [ -z postrotate-command ] [ -Z user ] [ expression ]</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O <code>Tcpdump</code> imprime uma descrição do conteúdo dos pacotes em uma interface de rede que corresponde à expressão booleana especificada na linha de comando. Ele também pode ser executado com o sinalizador -w, o que faz com que ele salve os dados do pacote em um arquivo para análise posterior ou com o sinalizador -r, que faz com que ele leia um arquivo de pacote salvo em vez de ler pacotes de um pacote interface de rede.</p>
            <hr>
            <h2>iwconfig</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>iwconfig [interface]<br><br></code>
            <code>iwconfig interface [essid X] [nwid N] [mode M] [freq F] [channel C][sens S ] [ap A ][nick NN ] [rate R] [rts RT] [frag FT] [txpower T] [enc E] [key K] [power P] [retry R] [modu M] [commit]<br><br></code>
            <code>iwconfig --help<br><br></code>
            <code>iwconfig --version</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">O Iwconfig é semelhante ao ifconfig, mas é dedicado às interfaces sem fio. Ele é usado para definir os parâmetros da interface de rede que são específicos para a operação sem fio (a frequência sem fio, por exemplo). O Iwconfig também pode ser usado para exibir esses parâmetros e as estatísticas sem fio (extraídas de / proc / net / wireless).</p>
            <hr>
            <h2>whois</h2>
            <h3 class="pt-2">Syntax</h3>
            <code>whois [ -h HOST ] [ -p PORT ] [ -aCFHlLMmrRSVx ] [ -g SOURCE:FIRST-LAST ] [ -i ATTR ] [ -S SOURCE ] [ -T TYPE ] object<br><br></code>
            <code>whois -t TYPE<br><br></code>
            <code>whois -v TYPE<br><br></code>
            <code>whois -q keyword</code>
            <h3 class="pt-3">Sobre</h3>
            <p class="lead">whois procura por um objeto em um banco de dados WHOIS. WHOIS é um protocolo de consulta e resposta amplamente usado para consultar bancos de dados que armazenam os usuários registrados de um recurso da Internet, como um nome de domínio ou um bloco de endereços IP, mas também é usado para uma variedade maior de outras informações.</p>
            <!-- FIM -->
          </div>
        </div>
      </div>
    </div>
  </main>
