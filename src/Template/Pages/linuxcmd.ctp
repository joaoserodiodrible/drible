<main class="bd-masthead" id="content" role="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <!-- Texto -->
        <h1>Comandos Linux</h1>

        <hr>

        <h2>wget</h2>

        <p class="lead">A maneira mais simples de usar o wget é fornecer o local de um arquivo para download via HTTP. Por exemplo, para baixar o arquivo http://website.com/files/file.zip, este comando:</p>

        <code>wget http://website.com/files/file.zip</code>

        <h3>Syntax</h3>

        <code>wget [option]... [URL]...</code>

<!-- https://www.computerhope.com/unix/wget.htm -->


<!--
 wget     Retrieve web pages or files via HTTP, HTTPS or FTP                
  dig      DNS lookup                 https://ss64.com/bash/dig.html
  ifconfig Configure a network interface           https://ss64.com/bash/ifconfig.html
  ifdown   Stop a network interface                   https://ss64.com/bash/ifup.html
  ifup     Start a network interface up                 https://ss64.com/bash/ifup.html
  mtr      Network diagnostics (traceroute/ping)               https://ss64.com/bash/mtr.html
 nc       Netcat, read and write data across networks            https://ss64.com/bash/nc.html
  netstat  Networking connections/stats                        https://ss64.com/bash/netstat.html
nslookup Query Internet name servers interactively           https://ss64.com/bash/nslookup.html
ip       Routing, devices and tunnels           https://ss64.com/bash/ip.html
ping     Test a network connection                   https://ss64.com/bash/ping.html
rsync  Synchronize remote files via email
ethtool  Ethernet card settings
  traceroute Trace Route to Host
hostname Print or set system name
dhclient
route
host
nslookup
mii-tool
ethtool
tcpdump
iwlist
iwconfig
whois
-->
























        <!-- <ul>
        <h2>Pacotes RPM (Red Hat, Fedora e similares)</h2>
        <li><p class="lead"><code>rpm -ivh package.rpm</code>: Instale um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -ivh –nodeeps package.rpm</code>: Instale um pacote rpm ignorar solicitações de dependências.</p></li>
        <li><p class="lead"><code>rpm -U package.rpm</code>: atualize um pacote rpm sem alterar a configuração dos arquivos.</p></li>
        <li><p class="lead"><code>rpm -F package.rpm</code>: atualize um pacote rpm somente se ele estiver instalado.</p></li>
        <li><p class="lead"><code>rpm -e package_name.rpm</code>: Remova um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -qa</code>: Mostre todos os pacotes rpm instalados no sistema.</p></li>
        <li><p class="lead"><code>rpm -qa | grep httpd</code>: Mostre todos os rpm de pacotes com o nome “httpd”.</p></li>
        <li><p class="lead"><code>rpm -qi package_name</code>: informações sobre um pacote específico instalado.</p></li>
        <li><p class="lead"><code>rpm -qg “System Environment/Daemons”</code>: Mostar um grupo software pacotes rpm.</p></li>
        <li><p class="lead"><code>rpm -ql package_name</code>: Mostre lista de arquivos fornecidos por um pacote rpm instalados.</p></li>
        <li><p class="lead"><code>rpm -qc package_name</code>: Exiba a lista de arquivos, dada por uma configuração de pacote rpm instalados.</p></li>
        <li><p class="lead"><code>rpm -q package_name –whatrequires</code>: Mostre lista de dependências que são solicitados para um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -q package_name –whatprovides</code>: Mostar capacidade fornecida por um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -q package_name –scripts</code>: Mostre scripts começados durante a remoção da instalação.</p></li>
        <li><p class="lead"><code>rpm -q package_name –changelog</code>: Mostar o histórico das revisões de um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -qf /etc/httpd/conf/httpd.conf</code>: Verificar qual rpm pacote pertence um determinado arquivo.</p></li>
        <li><p class="lead"><code>rpm -qp package.rpm -l</code>: Mostre lista de arquivos fornecidos por um rpm do pacote que ainda não foi instalado.</p></li>
        <li><p class="lead"><code>rpm –import /media/cdrom/RPM-GPG-KEY</code>: importe a assinatura digital chave pública.</p></li>
        <li><p class="lead"><code>rpm –checksig package.rpm</code>: Verificar a integridade de um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -qa gpg-pubkey</code>: Verificar a integridade de todos os pacotes rpm instalados.</p></li>
        <li><p class="lead"><code>rpm -V package_name</code>: Verifique o tamanho do arquivo, licenças, tipos, proprietário, grupo, exame de saúde Resumo de MD5 e última modificado.</p></li>
        <li><p class="lead"><code>rpm -Va</code>: verificar todos os pacotes rpm instalados no sistema. Use com cuidado.</p></li>
        <li><p class="lead"><code>rpm -Vp package.rpm</code>: Verifique se que um pacote instalado ainda não rpm.</p></li>
        <li><p class="lead"><code>rpm2cpio package.rpm | cpio –extract –make-directories *bin*</code>: Extraia o arquivo executável de um pacote rpm.</p></li>
        <li><p class="lead"><code>rpm -ivh /usr/src/redhat/RPMS/arch/package.rpm</code>: Instale um pacote construído a partir de um rpm fonte.</p></li>
        <li><p class="lead"><code>rpmbuild –rebuild package_name.src.rpm</code>: Construa um pacote rpm a partir de um rpm fonte.</p></li>
      </ul>

      <ul>
      <h2>Pacotes YUM Updater (Red Hat, Fedora e similares)</h2>
      <li><p class="lead"><code></code>: Baixar e instalar um pacote rpm.</p></li>
      <li><p class="lead"><code></code>: Isto irá instalar um RPM e vai tentar resolver todas as dependências para você, usando seus repositórios.</p></li>
      <li><p class="lead"><code></code>: Atualize todos os pacotes rpm instalados no sistema.</p></li>
      <li><p class="lead"><code></code>: Upgrade / atualizar um pacote rpm.</p></li>
      <li><p class="lead"><code></code>: Remova um pacote rpm.</p></li>
      <li><p class="lead"><code></code>: Liste todos os pacotes instalados no sistema.</p></li>
      <li><p class="lead"><code></code>: Encontre um pacote no repositório rpm.</p></li>
      <li><p class="lead"><code></code>: Limpe um cache de rpm, apagando os pacotes baixados.</p></li>
      <li><p class="lead"><code></code>: exclua todo o cabeçalho de arquivos que o sistema usa para resolver a dependência.</p></li>
      <li><p class="lead"><code></code></p></li>
    </ul> -->
    <!--  -->
  </div>
  <div class="col-2"></div>
</div>
</div>
</main>
