<main class="bd-masthead" id="content" role="main">
      <div class="container">

            <h1>O que vamos fazer?</h1>
            
            <hr>

            <h2>Configuração do Git</h2>

            <p>Para começar, tens que criar uma conta no <a href="https://github.com/join">Github</a>.</p>

            <p>Em Seguida, tens que fazer <a href="https://desktop.github.com/">download</a> do GitHub.</p>

            <hr>

            <h2>Configuração do Atom</h2>

            <ul>
                  <li>Abre o Atom. </li>
                  <li>Clica em “File” no canto superior esquerdo do ecrã. </li>
                  <li>Em seguida, clica em “Open Folder” e seleciona a pasta onde tu guardaste o teu clone. </li>
            </ul>

            <p>Agora já deves ter o clone do fork no teu Atom. Para teres certeza de que funcionou, a tua pasta deve ficar parecida a como ficou a pasta da imagem abaixo.</p>

            <img src="/img/atom_folderexample.png" alt="Atom Folder">

            <hr>

            <h2>Github Desktop</h2>

            <ul>
                  <li>Ao abrires o programa, em princípio o teu repositório, já deve estar selecionado.</li>
                  <li>No Atom, sempre que fizeres uma alteração e guardares-la (Ctrl+S), a alteração irá te aparecer no GitHub Desktop no painel esquerdo.</li>
                  <li>Depois onde diz “Summary”, preenche com um título para a alteração que fizeste.</li>
                  <li>Onde diz “Description”, podes descrever o que fizeste (não obrigatório).</li>
                  <li>Quando terminares os passos anteriores clicas em “Commit to gh-pages”.</li>
                  <li>E depois em cima clica em “Push to origin”.</li>
                  <li>Verifica se tens o “Commit” guardado no repositório.</li>
            </ul>

            <hr>

            <h2>Fork</h2>

            <p> Criar um “fork” é produzir um cópia pessoal do projeto de alguém. Os forks como se fossem uma ponte entre o repositório original e a tua cópia pessoal. Podes enviar Pull Requests para ajudar a fazer as outras pessoas a tornar os seus projetos melhor oferecendo as tuas mudanças ao projeto original. </p>

            <h3> Dar Fork a um repositório </h3>

            <p> Para dar fork num repositório, clica no botão Fork localizado acima do repositório.</p>

            <img src="/img/fork_forkbutton.png" alt="Fork Button">

            <p>Quando o fork acabar, serás levado á tua cópia do repositório.</p>

            <hr>

            <h2>Clone</h2>

            <ul>
                  <li>Entra na tua conta em <a href="https://github.com/">GitHub.com<a> e no GitHub Desktop.</li>
                        <li>No GitHub.com, navega até à barra de codificação do teu repositório.</li>
                        <li>No lado direito do ecrã, clica em “Clone or download”.</li>
                        <img src="/img/clone_clonebutton.png" alt="Clone Button" width="700" height="400">
                        <li>Depois clica em “Open in Desktop”. Isto abrir-te-á o GitHub Desktop.</li>
                        <img src="/img/clone_opendesktop.png" alt="Open in Dekstop Button">
                        <li>Cria uma pasta com o nome “Drible” no teu disco.</li>
                        <li>Guarda o diretório da pasta “Drible”.</li>
                        <li>Clica em Clone.</li>
                        <li>Seleciona a pasta “Drible” para guardares o clone.</li>
                  </ul>

                  <hr>

                  <h2>Escolhe 5 issues</h2>

                  <p>Ao abrires este <a href="https://github.com/popperz0r/drible/issues">link</a>, vai-te levar a uma webpage onde terá diversos issues (problemas) e terás que escolher 5 desses problemas e resolvê-los.</p>

                  <hr>

                  <h2>Branching</h2>

                  <p>Para fazeres um branch basta ires ao canto inferior direito do Atom e clicar no botão á direita das setas. Em princípio esse botão deve ter um nome do género “master” ou assim. </p>

                  <img src="/img/branch_howto.png" alt="How to Branch">

                  <hr>

                  <h2>Alteração de código</h2>

                  <p>Agora vais ficar a conhecer alguns dos códigos básicos do git.</p>

                  <p><b>-Cabeçalhos/Títulos</b></p>

                  <p>Para colocar cabeçalhos ou títulos apenas é preciso um cardinal antes do texto que queremos como cabeçalho. Quanto mais cardinais tiver , menor será o título. Ou seja, no exemplo a seguir o “Header 1” será o maior dos títulos e o “Header 3” o menor.</p>

                  <p>Exemplos:</p>

                  <p>#Header 1</p>

                  <p>##Header 2</p>

                  <p>###Header 3</p>

                  <p><b>-Lista</b></p>

                  <p>Para fazer uma lista, apenas é necessário colocar um hífen e deixar um espaço antes do que queremos na lista:</p>

                  <p>Exemplo:- Lista</p>

                  <p><b>-Lista numérica</b></p>

                  <p>Para criar uma lista númerica basta adicionar-mos o número, um ponto e um espaço antes do que queremos escrever:</p>

                  <p>Exemplo:1. Lista Numérica</p>

                  <p><b>-Negrito e Itálico</b></p>

                  <p>Para colocar a Negrito basta colocar 2 asteriscos antes e depois do texto que queremos a Negrito e não deixar espaço.</p>

                  <p>Exemplo:**Negrito**</p>

                  <p>Para colocar em Itálico basta colocar um underscore antes e depois do texto que queremos a Itálico e não deixar espaço.</p>

                  <p>Exemplo:_Itálico_</p>

                  <p><b>Links e Imagens</b></p>

                  <p>Para colocar um link colocamos o texto que queremos dentro de parênteses retos e colocamos o URL que queremos que nos leve dentro de parênteses normais e não deixar espaço.</p>

                  <p>Exemplo:[Link](Url) </p>

                  <ul>
                        <li>Dentro da pasta Drible que criaste acima, cria uma página com o nome “images”</li>
                        <li>Coloca lá as imagens que queres usar. </li>
                        <li>Depois no Atom, coloca um ponto de exclamação, seguido do texto Image dentro de parênteses retos e a source da imagem em parênteses normais. </li>
                        <li>A source da imagem será o diretório da imagem, mas terás que remover a parte do computador</li>
                        <li>Ficará algo do género sys-config/images/imagem1.</li>
                  </ul>

                  <p>Exemplo:![Image](source)</p>

                  <hr>

                  <h2>Commit</h2>

                  <p>Um commit refere-se a submeter alterações do código fonte ao repositório e fazer com que estas alterações se tornem parte da versão principal do repositório. Deste modo, quando outros utilizadores fazem um UPDATE do repositório, eles receberão a versão enviada mais recentemente.</p>

                  <p>Para dar commit às tuas alterações basta:</p>

                  <ul>
                        <li>Verificar que todas as alterações estão corretas.</li>
                        <li>Dar Ctrl + S no separador onde fizeste as alterações.</li>
                        <li>No lado direito do ecrã, clicar em “Stage All”.</li>
                        <li>Depois onde diz “Commit message”, coloca lá um resumo das alterações que fizeste.</li>
                        <li>Clica em Commit.</li>
                  </ul>

                  <hr>

                  <h2>Push</h2>

                  <p>Depois de dares commit às tuas alterações, o “Push” envia o teu codigo para ser atualizado no repositório. Para dar push basta clicares nas setas abaixo do botão “Commit” e clicar em “Push”.</p>

                  <hr>

                  <h2>Pull</h2>

                  <p>O “Pull” serve para atualizar o teu repositório local com a mais nova versão. Para dar “Pull” clica nas setas abaixo de “Commit” e clica em “Pull”.</p>

                  <hr>

                  <h2>Pull Request</h2>

                  <p>Pull requests permitem-te dizer ao outros utilizadores das alterações que fizeste para um repositório no GitHub. Uma vez que um pull request é aberto, tu podes discutir e rever as potenciais alterações com os teus colaboradores e adicionar commits novos antes das alterações serem juntas ao repositório. </p>

                  <p>Para criares um pull request basta:</p>

                  <ul>
                        <li>Na página do teu repositório no GitHub.com, clica em “New Pull Request”.</li>
                        <li>Depois clica em “Create Pull Request” e já deve estar o Pull Request feito.</li>
                  </ul>

                  <hr>

                  <h2>Merge</h2>

                  <p>Merging é a maneira do Git de pegar num fork e voltar a juntar-lo ao código fonte. O merge deixa-te tomar linhas de desenvolvimento independentes criadas pelo branch e integrá-las de volta ao código fonte. O branch atual será atualizado para refletir o merge, mas o branch escolhido será completamente inafetado.</p>

                  <hr>

                  <h2>Merge Conflicts</h2>

                  <p> Git pode, frequentemente, resolver as diferenças entre branchs que foram “merged”. Normalmente, as mudanças são em linhas diferentes, ou até em ficheiros diferentes, o que faz do merge simples para computadores compreenderem. No entanto, às vezes existe alterações que o Git precisa da tua ajuda para decidir quais alterações incorparar no merge final. Frequentemente, os merge conflicts acontecem quando as pessoa querem fazer diferentes alterações á mesma linha do mesmo ficheiro, ou quando uma pessoa edita um ficheiro e outra pessoa apaga o mesmo ficheiro. Tu tens de resolver os conflitos antes de poderes dar merge aos branches. </p>

                  <p> Existe um plugin no Atom chamado “Merge-Conflicts” que te pode ajudar com isto. Fica com os passos que queres saber sobre como instalar o plugin:</p>

                  <ul>
                        <li>Vai a “File”, no canto superior esquerdo do Atom.</li>
                        <li>Clica em “Settings”.</li>
                        <li>Em seguida vai a “Install” e pesquisa por “merge-conflicts”.</li>
                        <li>Irá te aparecer um plugin, instala-o.</li>
                  </ul>

            </div>
      </main>
