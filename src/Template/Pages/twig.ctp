<main class="bd-masthead" id="content" role="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">

        <!-- Texto -->

        <h1 class="pb-2">Twig</h1>

        <hr>

        <h2 class="pb-1 pt-1">O que é Twig?</h2>

        <ul>
          <p class="lead">Twig é um mecanismo de template moderno para PHP</p>
          <li><p class="lead"><strong>Rápido </strong>: o Twig compila os modelos para um código PHP simples e otimizado. A sobrecarga comparada ao código PHP regular foi reduzida ao mínimo.</p></li>
          <li><p class="lead"><strong>Seguro </strong>: o Twig tem um modo seguro para avaliar o código do modelo não confiável. Isso permite que o Twig seja usado como uma linguagem de modelo para aplicativos nos quais os usuários podem modificar o design do modelo.</p></li>
          <li><p class="lead"><strong>Flexível </strong>: O Twig é alimentado por um lexer e parser flexível. Isso permite que o desenvolvedor defina suas próprias tags e filtros personalizados e crie sua própria DSL.</p></li>
        </ul>

        <p class="lead">Um modelo é simplesmente um arquivo de texto. Pode gerar qualquer formato baseado em texto (HTML, XML, CSV, LaTeX, etc.). Não tem uma extensão específica, o <code>.html</code> ou o <code>.xml</code> estão bem.</p>

        <p class="lead">Um modelo contém <strong>variáveis</strong> ou <strong>expressões</strong> , que são substituídas por valores quando o modelo é avaliado e <strong>tags</strong> , que controlam a lógica do modelo.</p>

        <p class="lead">Aqui está representado um modelo que mostra algumas noções basicas.</p>

        <code>&lt;!DOCTYPE html>
          <br>&lt; html &gt;
          <br>&lt; head &gt;
          <br>&lt; title &gt; My Webpage &lt;/ title &gt;
          <br>&lt;/ head &gt;
          <br>&lt; body &gt;
          <br>&lt; ul id = "navigation" &gt;
          <br>{% for item in navigation %}
          <br>&lt; li &gt;&lt; a href = " {{ item.href }} " &gt; {{ item.caption }} &lt;/ a &gt;&lt;/ li &gt;
          <br>{% endfor %}
          <br>&lt;/ ul &gt;
          <br>&lt; h1 &gt; My Webpage &lt;/ h1 &gt;
          <br>{{ a_variable }}
          <br>&lt;/ body &gt;
          <br>&lt;/ html &gt;
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Pré-requisitos</h2>

        <p class="lead">Twig precisa pelo menos do <strong>PHP 7.0.0</strong> para ser executado</p>

        <hr>

        <h2 class="pb-1 pt-1">Instalação</h2>

        <p class="lead">A maneira recomendada para instalar o Twig é através do Composer:</p>

        <code>composer require "twig/twig:^2.0"</code>

        <hr>

        <h2 class="pb-1 pt-1">Delimitadores</h2>

        <p class="lead">Existem dois tipos de delimitadores: <code>{% ... %}</code> e <code>{{ ... }}</code> . O primeiro é usado para executar instruções como for-loops, o último imprime o resultado de uma expressão no modelo.</p>

        <hr>

        <h2 class="pb-1 pt-1">Variáveis</h2>

        <p class="lead">O aplicativo passa variáveis ​​para os modelos para manipulação no modelo. Variáveis ​​podem ter atributos ou elementos que você pode acessar também. A representação visual de uma variável depende muito do aplicativo que a fornece.</p>

        <p class="lead">Pode-se usar um ponto ( . ) Para acessar atributos de uma variável (métodos ou propriedades de um objeto PHP, ou itens de uma matriz PHP), ou a assim chamada sintaxe "subscrito" ( [] ):</p>

        <code>{{ foo.bar }}
          <br>{{ foo [ 'bar' ] }}
        </code>

        <p class="lead pt-3">Quando o atributo contém caracteres especiais (como - isso seria interpretado como o operador menos), use a função de <code>attribute</code> para acessar o atributo da variável:</p>

        <code>{# equivalent to the non-working foo.data-foo #}
          <br>{{ attribute ( foo , 'data-foo' ) }}
        </code>

        <p class="lead pt-3">Se uma variável ou atributo não existir, você receberá um valor <code>null</code> quando a opção <code>strict_variables</code> estiver configurada como false ; Como alternativa, se <code>strict_variables</code> for definido, o Twig emitirá um erro</p>

        <hr>

        <h3 class="pb-1 pt-1">Implementação</h3>

        <ul>
          <p class="lead">Por conveniência, o <code>foo.bar</code> faz o seguinte na camada do PHP:</p>
          <li><p class="lead">verifica se <code>foo</code> é uma matriz e bar um elemento válido;</p></li>
          <li><p class="lead">se não, e se <code>foo</code> é um objeto, verifica se <code>bar</code> é uma propriedade válida;</p></li>
          <li><p class="lead">se não, e se <code>foo</code> é um objeto, verifica se a <code>bar</code>r é um método válido (mesmo se <code>bar</code> for o construtor - use <code>__construct()</code> );</p></li>
          <li><p class="lead">se não, e se <code>foo</code> é um objeto, verifica se <code>getBar</code> é um método válido;</p></li>
          <li><p class="lead">se não, e se <code>foo</code> é um objeto, verifica se <code>isBar</code> é um método válido;</p></li>
          <li><p class="lead">se não, e se <code>foo</code> é um objeto, verifica se <code>hasBar</code> é um método válido;</p></li>
          <li><p class="lead">se não, retorne um valor <code>null</code> .</p></li>
        </ul>
        <ul>
          <p class="lead"><code>foo['bar']</code> por outro lado só funciona com matrizes PHP:</p></li>
          <li><p class="lead">verifica se <code>foo</code> é uma matriz e <code>bar</code> um elemento válido;</p></li>
          <li><p class="lead">se não, retorne um valor <code>null</code> .</p></li>
        </ul>

        <hr>

        <h3 class="pb-1 pt-1">Variáveis Globais</h3>

        <ul>
          <p class="lead">As seguintes variáveis ​​estão sempre disponíveis em modelos:</p>
          <li><p class="lead"><code>_self </code>: faz referência ao nome do modelo atual;</p></li>
          <li><p class="lead"><code>_context </code>: faz referência ao contexto atual;</p></li>
          <li><p class="lead"><code>_charset </code>: faz referência ao conjunto de caracteres atual.</p></li>
        </ul>

        <hr>

        <h3 class="pb-1 pt-1">Definindo Variáveis </h3>

        <p class="lead">Você pode atribuir valores a variáveis ​​dentro de blocos de código. Atribuições usam a tag <a href="https://twig.symfony.com/doc/2.x/tags/set.html">set:</a> </p>

        <code>{% set foo = 'foo' %}
          <br>{% set foo = [1, 2] %}
          <br>{% set foo = {'foo': 'bar'} %}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Filtros </h2>

        <p class="lead">Variáveis ​​podem ser modificadas por <strong>filtros</strong> . Os filtros são separados da variável por um símbolo de pipe ( <code>|</code> ) e podem ter argumentos opcionais entre parênteses. Vários filtros podem ser encadeados. A saída de um filtro é aplicada ao próximo.</p>

        <p class="lead">O exemplo a seguir remove todas as tags HTML do name e das ocorrências:</p>

        <code> {{ name | striptags | title }} </code>

        <p class="lead pt-3">Filtros que aceitam argumentos têm parênteses a volta. Este exemplo irá juntar uma lista por vírgulas:</p>

        <code> {{ list | join ( ', ' ) }} </code>

        <p class="lead pt-3">Para aplicar um filtro em uma seção de código, coloque-o na tag <a href="https://twig.symfony.com/doc/2.x/tags/filter.html">filtro</a> :</p>

        <code> {% filter upper %}
          <br>This text becomes uppercase
          <br>{% endfilter %}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Funções</h2>

        <p class="lead">Funções podem ser chamadas para gerar conteúdo. As funções são chamadas pelo nome, seguidas por parênteses ( <code>()</code> ) e podem ter argumentos.</p>

        <p class="lead">Por exemplo, a função <code>range</code> retorna uma lista contendo uma progressão aritmética de inteiros:</p>

        <code>{% for i in range ( 0 , 3 ) %}
          <br>{{ i }} ,
          <br>{% endfor %}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Argumentos por Nome</h2>

        <code>{% for i in range(low=1, high=10, step=2) %}
          <br>{{ i }},
          <br>{% endfor %}
        </code>

        <p class="lead pt-3">Usar argumentos por nome torna seus modelos mais explícitos sobre o significado dos valores que você passa como argumentos:</p>

        <code>{{ data | convert_encoding ( 'UTF-8' , 'iso-2022-jp' ) }}
          <br>{# versus #}
          <br>{{ data | convert_encoding ( from = 'iso-2022-jp' , to = 'UTF-8' ) }}
        </code>

        <p class="lead pt-3">Os argumentos por nome também permitem ignorar alguns argumentos para os quais você não deseja alterar o valor padrão:</p>

        <code> {# the first argument is the date format, which defaults to the global date format if null is passed #}
          <br>{{ "now" | date ( null , "Europe/Paris" ) }}
          <br>{# or skip the format value by using a named argument for the time zone #}
          <br>{{ "now" | date ( timezone = "Europe/Paris" ) }}
        </code>

        <p class="lead pt-3">Você também pode usar argumentos por posição e nome em uma chamada, em cujo caso os argumentos por posição sempre devem vir antes dos argumentos por nome:</p>

        <code> {{ "now" | date ( 'd/m/Y H:i' , timezone = "Europe/Paris" ) }} </code>

        <hr>

        <h2 class="pb-1 pt-1">Estrutura de Controlo</h2>

        <p class="lead">Uma estrutura de controle refere-se a todas as coisas que controlam o fluxo de um programa - condicionais (ou seja, <code>if</code> / <code>elseif</code> / <code>else</code> ), <code>for</code> -loops, bem como coisas como blocos. Estruturas de controle aparecem dentro de blocos <code>{% ... %}</code> .</p>

        <p class="lead">Por exemplo, para exibir uma lista de usuários fornecidos em uma variável chamada <code>users</code> , use a tag <a href="https://twig.symfony.com/doc/2.x/tags/for.html">for</a> :</p>

        <code>&lt;h1&gt;Members&lt;/h1&gt;
          <br>&lt;ul&gt;
          <br>{% for user in users %}
          <br>&lt;li&gt; {{ user.username | e }} &lt;/li&gt;
          <br>{% endfor %}
          <br>&lt;/ul&gt;
        </code>

        <p class="lead pt-3">A tag <a href="https://twig.symfony.com/doc/2.x/tags/if.html">if</a> pode ser usada para testar uma expressão:</p>

        <hr>

        <h2 class="pb-1 pt-1">Comentários</h2>

        <p class="lead">Para comentar parte de uma linha em um modelo, use a sintaxe de comentário <code>{# ... #}</code> . Isso é útil para depurar ou adicionar informações para outros designers de modelos ou para você mesmo:</p>

        <code>{# note: disabled template because we no longer use this
          <br>{% for user in users %}
          <br>...
          <br>{% endfor %}
          <br>#}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Inclusão de outros modelos</h2>

        <p class="lead">A função de <a href="https://twig.symfony.com/doc/2.x/functions/include.html">inclusão</a> é útil para incluir um modelo e retornar o conteúdo renderizado desse modelo para o atual:</p>

        <code>{{ include ( 'sidebar.html' ) }} </code>

        <p class="lead pt-3">Por padrão, os modelos incluídos têm acesso ao mesmo contexto que o modelo que os inclui. Isso significa que qualquer variável definida no modelo principal também estará disponível no modelo incluído:</p>

        <code>{% for box in boxes %}
          <br>{{ include ( 'render_box.html' ) }}
          <br>{% endfor %}
        </code>

        <p class="lead pt-3">O modelo incluído <code>render_box.html</code> é capaz de acessar a variável box .</p>

        <p class="lead">O nome do modelo depende do carregador de modelos. Por exemplo, o <code>Twig_Loader_Filesystem</code> permite que você acesse outros modelos, dando o nome do arquivo. Você pode acessar modelos em subdiretórios com uma barra:</p>

        <code>{{ include ( 'sections/articles/sidebar.html' ) }} </code>

        <hr>

        <h2 class="pb-1 pt-1">Herança de modelos</h2>

        <p class="lead">A parte mais poderosa do Twig é a herança de modelos. A herança de modelos permite que você crie um modelo "esqueleto" básico que contenha todos os elementos comuns do site e defina <strong>blocos</strong> que os modelos secundários podem substituir.</p>

        <p class="lead">Vamos definir um modelo base, <code>base.html</code> , que define um documento esqueleto HTML simples que você pode usar para uma página simples de duas colunas:</p>

        <code>&lt;!DOCTYPE html&gl;
          <br>&lt; html &gl;
          <br>&lt; head &gl;
          <br>{% block head %}
          <br>&lt; link rel = "stylesheet" href = "style.css" /&gl;
          <br>&lt; title &gl; {% block title %}{% endblock %} - My Webpage &lt;/ title &gl;
          <br>{% endblock %}
          <br>&lt;/ head &gl;
          <br>&lt; body &gl;
          <br>&lt; div id = "content" &gl; {% block content %}{% endblock %} &lt;/ div &gl;
          <br>&lt; div id = "footer" &gl;
          <br>{% block footer %}
          <br>&copy ; Copyright 2011 by &lt; a href = "http://domain.invalid/" &gl; you &lt;/ a &gl; .
          <br>{% endblock %}
          <br>&lt;/ div &gl;
          <br>&lt;/ body &gl;
          <br>&lt;/ html &gl;
        </code>

        <p class="lead pt-3">Neste exemplo, as tags de <a href="https://twig.symfony.com/doc/2.x/tags/block.html">bloco</a> definem quatro blocos que os modelos-filhos podem preencher. Tudo o <code>block</code> tag de <code>block</code> faz é informar ao mecanismo de modelo que um modelo filho pode substituir essas partes do modelo.</p>

        <p class="lead">Um modelo filho pode ter esta aparência:</p>

        <code>{% extends "base.html" %}
          <br>{% block title %} Index {% endblock %}
          <br>{% block head %}
          <br>{{ parent () }}
          <br>&lt;style type="text/css"&gt;
          <br>.important { color: #336699; }
          <br>&lt;/style&gt;
          <br>{% endblock %}
          <br>{% block content %}
          <br>&lt;h1&gt;Index&lt;/h1&gt;
          <br>&lt;p class="important"&gt;
          <br>Welcome to my awesome homepage.
          <br>&lt;/p&gt;
          <br>{% endblock %}
        </code>

        <p class="lead pt-3">A tag <a href="https://twig.symfony.com/doc/2.x/tags/extends.html">estende</a> é a chave aqui. Ele informa ao mecanismo de modelo que esse modelo "estende" outro modelo. Quando o sistema de modelo avalia esse modelo, primeiro ele localiza o pai. A tag extends deve ser a primeira tag no modelo.</p>

        <p class="lead">Observe que, como o modelo filho não define o bloco de <code>footer</code> , o valor do modelo pai é usado.</p>

        <p class="lead">É possível renderizar o conteúdo do bloco pai usando a função <a href="https://twig.symfony.com/doc/2.x/functions/parent.html">pai</a> . Isso retorna os resultados do bloco pai:</p>

        <code>{% block sidebar %}
          <br>&lt;h3&gt;Table Of Contents&lt;/h3&gt;
          <br>...
          <br>{{ parent() }}
          <br>{% endblock %}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Escape HTML</h2>

        <p class="lead">Ao gerar HTML a partir de modelos, há sempre o risco de uma variável incluir caracteres que afetam o HTML resultante. Existem duas abordagens: escapar manualmente de cada variável ou automaticamente escapar tudo por padrão.</p>

        <p class="lead">O Twig suporta ambos, a escape automática esta ativa por padrão.</p>

        <p class="lead">A estratégia de escape automática pode ser configurada através da opção <a href="https://twig.symfony.com/doc/2.x/api.html#environment-options">autoescape</a> e padronizada para html .</p>

        <hr>

        <h3 class="pb-1 pt-1">Trabalhar com escape Manual</h3>

        <p class="lead">Se o escape manual estiver ativada, é a <strong>sua</strong> responsabilidade escapar variáveis, se necessário. O que escapar? Qualquer variável que você não confia.</p>

        <p class="lead">O <a href="https://twig.symfony.com/doc/2.x/filters/escape.html">escape</a> funciona canalizando a variável através do filtro <code>e</code> :</p>

        <code>{{ user.username | e }} </code>

        <p class="lead pt-3">Por padrão, o filtro de <code>escape</code> usa <code>a</code> estratégia html , mas dependendo do contexto de escape, você pode querer usar explicitamente outras estratégias disponíveis:</p>

        <code>{{ user.username | e ( 'js' ) }}
          <br>{{ user.username | e ( 'css' ) }}
          <br>{{ user.username | e ( 'url' ) }}
          <br>{{ user.username | e ( 'html_attr' ) }}
        </code>

        <hr>

        <h3 class="pb-1 pt-1">Trabalhando com Escape Automático</h3>

        <p class="lead">Se o escape automático está ativado ou não, você pode marcar uma seção de um modelo a ser ignorado ou não usando a tag <a>autoescape</a> :</p>

        <code>{% autoescape %}
          <br>Everything will be automatically escaped in this block (using the HTML strategy)
          <br>{% endautoescape %}
        </code>

        <p class="lead pt-3">Por padrão, o escape automático usa a estratégia de escape <code>html</code> . Se você gerar variáveis ​​em outros contextos, será preciso explicitamente evitá-las com a estratégia de escape apropriada:</p>

        <code>{% autoescape 'js' %}
          <br>Everything will be automatically escaped in this block (using the JS strategy)
          <br>{% endautoescape %}
        </code>

        <hr>

        <h2 class="pb-1 pt-1">Escapando</h2>

        <p class="lead">Às vezes, é desejável ou mesmo necessário que o Twig ignore partes que, de outra forma, seriam manipuladas como variáveis ​​ou blocos. Por exemplo, se a sintaxe padrão é usada e você quer usar {{ como string raw no template e não iniciar uma variável, você tem que usar um truque.</p>

          <p class="lead">A maneira mais fácil é a saída do delimitador variável ( <code>{{</code> ) usando uma expressão variável:</p>

            <code>{{ '{{' }} </code>

            <hr>

            <h2 class="pb-1 pt-1">Macros</h2>

            <p class="lead">Macros são comparáveis ​​com funções em linguagens de programação regulares. Eles são úteis para reutilizar fragmentos HTML usados ​​com frequência para não se repetirem.</p>

            <p class="lead">Uma macro é definida pela tag de <a href="https://twig.symfony.com/doc/2.x/tags/macro.html">macro</a> . Aqui está um pequeno exemplo (posteriormente chamado forms.html ) de uma macro que renderiza um elemento de formulário:</p>

            <code>{% macro input(name, value, type, size) %}
              <br>&lt;input type="{{ type|default('text') }}" name="{{ name }}" value="{{ value|e }}" size="{{ size|default(20) }}" /&gt;
              <br>{% endmacro %}
            </code>

            <p class="lead pt-3">As macros podem ser definidas em qualquer modelo e precisam ser "importadas" por meio da tag de importação antes de serem usadas:</p>

            <code>{% import "forms.html" as forms %}
              <br>&lt;p&gt;{{ forms.input('username') }}&lt;/p&gt;
            </code>

            <p class="lead pt-3">Como alternativa, você pode importar nomes de macro individuais de um modelo para o namespace atual por meio da tag de e, opcionalmente, aliasá-los:</p>

            <code>{% from 'forms.html' import input as input_field %}
              <br>&lt;dl&gt;
              <br>&lt;dt&gt;Username&lt;/dt&gt;
              <br>&lt;dd&gt; {{ input_field ( 'username' ) }} &lt;/dd&gt;
              <br>&lt;dt&gt;Password&lt;/dt&gt;
              <br>&lt;dd&gt; {{ input_field ( 'password' , '' , 'password' ) }} &lt;/dd&gt;
              <br>&lt;/dl&gt;
            </code>

            <p class="lead pt-3">Um valor padrão também pode ser definido para argumentos de macro quando não são fornecidos em uma chamada de macro:</p>

            <code>{% macro input ( name , value = "" , type = "text" , size = 20 ) %}
              <br>&lt;input type=" {{ type }} " name=" {{ name }} " value=" {{ value | e }} " size=" {{ size }} " /&gt;
              <br>{% endmacro %}
            </code>

            <p class="lead">Se argumentos adicionais posicionais forem passados ​​para uma chamada de macro, eles acabam na variável <code>varargs</code> especiais como uma lista de valores.</p>

            <hr>

            <h2 class="pb-1 pt-1">Expressões</h2>

            <p class="lead">O Twig permite expressões em todos os lugares. Estes funcionam muito parecidos com o PHP regular e mesmo que você não esteja trabalhando com PHP, você deve se sentir confortável com isso.</p>

            <hr>

            <h3 class="pb-1 pt-1">Literais</h3>

            <ul>
              <p class="lead">A forma mais simples de expressões são literais. Literais são representações para tipos PHP, como strings, números e matrizes. Os seguintes literais existem:</p>
              <li><p class="lead"><code>"Hello World"</code>: Tudo entre duas aspas duplas ou simples é uma string. Eles são úteis sempre que você precisar de uma sequência no modelo (por exemplo, como argumentos para chamadas de função, filtros ou apenas para estender ou incluir um modelo). Uma string pode conter um delimitador se for precedido por uma barra invertida ( <code>\</code> ) - como em '<code>It\'s good</code>' . Se a cadeia contiver uma barra invertida (por exemplo, '<code>c:\Program Files</code>' ), escape-a duplicando-a (por exemplo, '<code>c:\\Program Files</code>' ).</p></li>
              <li><p class="lead pt-3"><code>42 / 42.23</code>: números inteiros e de ponto flutuante são criados simplesmente escrevendo o número abaixo. Se um ponto estiver presente, o número é um float, caso contrário, um inteiro.</p></li>
              <li><p class="lead"><code>["foo", "bar"]</code>: Os arrays são definidos por uma seqüência de expressões separadas por uma vírgula ( <code>,</code> ) e agrupadas com colchetes quadrados ( <code>[]</code> ).</p></li>
              <li><p class="lead"><code>{"foo": "bar"}</code>: os hashes são definidos por uma lista de chaves e valores separados por uma vírgula ( <code>,</code> ) e agrupados com chaves ( <code>{}</code> ):</p></li>
              <code>{# keys as string #}
                <br>{ 'foo': 'foo', 'bar': 'bar' }
                <br>{# keys as names (equivalent to the previous hash) #}
                <br>{ foo: 'foo', bar: 'bar' }
                <br>{# keys as integer #}
                <br>{ 2: 'foo', 4: 'bar' }
                <br>{# keys as expressions (the expression must be enclosed into parentheses) #}
                <br>{% set foo = 'foo' %}
                <br>{ (foo): 'foo', (1 + 1): 'bar', (foo ~ 'b'): 'baz' }
              </code>
              <li><p class="lead pt-3"><code>true / false</code>: <code>true</code> representa o valor verdadeiro, <code>false</code> representa o valor falso.</p></li>
              <li><p class="lead"><code>null</code>: <code>null</code> representa nenhum valor específico. Este é o valor retornado quando uma variável não existe. <code>none</code> é um alias para <code>null</code> .</p></li>
            </ul>

            <p class="lead">Arrays e hashes podem ser aninhados:</p>

            <code>{% set foo = [ 1 , { "foo" : "bar" }] %} </code>

            <hr>

            <h3 class="pb-1 pt-1">Matematicos</h3>

            <ul>
              <p class="lead">O Twig permite calcular com valores. Isso raramente é útil em modelos, mas existe por completo. Os seguintes operadores são suportados:</p>
              <li><p class="lead"><code>+</code>: Adiciona dois objetos juntos (os operandos são convertidos em números). <code>{{ 1 + 1 }}</code> é <code>2</code> .</p></li>
              <li><p class="lead"><code>-</code>: Subtrai o segundo número do primeiro. <code>{{ 3 - 2 }}</code> é <code>1</code> .</p></li>
              <li><p class="lead"><code>/</code>: Divide dois números. O valor retornado será um número de ponto flutuante. <code>{{ 1 / 2 }}</code> é <code>{{ 0.5 }}</code> .</p></li>
              <li><p class="lead"><code>%</code>: Calcula o restante de uma divisão inteira. <code>{{ 11 % 7 }}</code> é <code>4</code> .</p></li>
              <li><p class="lead"><code>//</code>: Divide dois números e retorna o resultado do inteiro com piso. <code>{{ 20 // 7 }}</code> é <code>2</code> , <code>{{ -20 // 7 }}</code> é <code>-3</code> (isto é apenas açúcar sintático para o filtro redondo ).</p></li>
              <li><p class="lead"><code>*</code>: Multiplica o operando esquerdo pelo correto. <code>{{ 2 * 2 }}</code> retornaria <code>4</code> .</p></li>
              <li><p class="lead"><code>**</code>: Aumenta o operando esquerdo para o poder do operando direito. <code>{{ 2 ** 3 }}</code> retornaria <code>8</code> .</p></li>
            </ul>

            <hr>

            <h3 class="pb-1 pt-1">Lógicos</h3>

            <ul>
              <p class="lead">Você pode combinar várias expressões com os seguintes operadores:</p>
              <li><p class="lead"><code>and</code>: Retorna verdadeiro se os operandos esquerdo e direito forem verdadeiros.</p></li>
              <li><p class="lead"><code>or</code>: Retorna verdadeiro se o operando esquerdo ou direito for verdadeiro.</p></li>
              <li><p class="lead"><code>not</code>: Nega uma declaração.</p></li>
              <li><p class="lead"><code>(exp)</code>: Agrupa uma expressão.</p></li>
            </ul>

            <hr>

            <h3 class="pb-1 pt-1">Comparações</h3>

            <p class="lead">Os seguintes operadores de comparação são suportados em qualquer expressão: <code>==</code> <code>!=</code> , <code><</code> , <code>></code> , <code>>=</code> <code>E</code> <code><=</code> .</p>

            <code>{% if 'Fabien' starts with 'F' %}
              <br>{% endif %}
              <br>{% if 'Fabien' ends with 'n' %}
              <br>{% endif %}
            </code>

            <p class="lead pt-3">Para comparações complexas de cadeias, o operador matches permite que você use expressões regulares :</p>

            <code>{% if phone matches '/^[\\d\\.]+$/' %}
              <br>{% endif %}
            </code>

            <hr>

            <h3 class="pb-1 pt-1">Operador de Contenção</h3>

            <p class="lead">O operador <code>in</code> executa o teste de contenção.</p>

            <p class="lead">Retorna <code>true</code> se o operando esquerdo estiver contido à direita:</p>

            <code> {# returns true #}
              <br>{{ 1 in [ 1 , 2 , 3 ] }}
              <br>{{ 'cd' in 'abcde' }}
            </code>

            <p class="lead pt-3">Para realizar um teste negativo, use o operador <code>not in</code> :</p>

            <code>{% if 1 not in [ 1 , 2 , 3 ] %}
              <br>{# is equivalent to #}
              <br>{% if not ( 1 in [ 1 , 2 , 3 ]) %}
            </code>

            <hr>

            <h3 class="pb-1 pt-1">Operador de Teste</h3>

            <p class="lead">O operador <code>is</code> executa testes. Testes podem ser usados ​​para testar uma variável em relação a uma expressão comum. O operando da direita é o nome do teste:</p>

            <code>{# find out if a variable is odd #}
              <br>{{ name is odd }}
            </code>

            <p class="lead pt-3">Os testes podem aceitar argumentos também:</p>

            <code> {% if post.status is constant ( 'Post::PUBLISHED' ) %}</code>

            <p class="lead pt-3">Os testes podem ser negados usando o <code>is not</code> operador:</p>

            <code>{% if post.status is not constant ( 'Post::PUBLISHED' ) %}
              <br>{# is equivalent to #}
              <br>{% if not ( post.status is constant ( 'Post::PUBLISHED' )) %}
            </code>

            <hr>

            <h3 class="pb-1 pt-1">Outros operadores</h3>

            <ul>
              <p class="lead">Os seguintes operadores não se encaixam em nenhuma das outras categorias:</p>
              <li><p class="lead"><code>|</code>: Aplica um filtro.</p></li>
              <li><p class="lead"><code>..</code>: Cria uma seqüência baseada no operando antes e depois do operador (isto é apenas açúcar sintático para a função range ):</p></li>
              <code>{{ 1. .5 }}
                <br>{# equivalent to #}
                <br>{{ range ( 1 , 5 ) }}
              </code>
              <p class="lead pt-3">Observe que deve usar parênteses ao combiná-lo com o operador de filtro devido às regras de precedência do operador :</p>
              <code>(1..5)|join(', ')</code>
              <li><p class="lead pt-3"><code>~</code></p>: Converte todos os operandos em strings e concatena-os. <code>{{ "Hello " ~ name ~ "!" }}</code> <code>{{ "Hello " ~ name ~ "!" }}</code> retornaria (assumindo que o <code>name</code> é '<code>John</code>' ) <code>Hello John!</code> .</li>
              <li><p class="lead"><code>.,[]</code>: Obtém um atributo de um objeto.</p></li>
              <li><p class="lead"><code>?</code>: O operador ternário:</p></li>
              <code>{{ foo ? 'yes' : 'no' }}
                <br>{{ foo ?: 'no' }} is the same as {{ foo ? foo : 'no' }}
                <br>{{ foo ? 'yes' }} is the same as {{ foo ? 'yes' : '' }}
              </code>
              <li><p class="lead pt-3"><code>??</code>: O operador de coalescência nula:</p></li>
              <code>{# returns the value of foo if it is defined and not null, 'no' otherwise #}
                <br>{{ foo ?? 'no' }}
              </code>
            </ul>

            <hr>

            <h3 class="pb-1 pt-1">Interpolação de String</h3>

            <p class="lead">A interpolação de string ( <code>#{expression}</code> ) permite que qualquer expressão válida apareça em uma string de aspas duplas . O resultado da avaliação dessa expressão é inserido na string:</p>

            <code>{{ "foo #{bar} baz" }}
              <br>{{ "foo #{1 + 2} baz" }}
            </code>

            <hr>

            <h2 class="pb-1 pt-1">Controle de espaço em branco</h2>

            <p class="lead">A primeira nova linha depois de uma tag de template é removida automaticamente (como em PHP). O espaço em branco não é mais modificado pelo engine de templates, então cada whitespace (espaços, tabs, newlines etc.) é retornado inalterado.</p>

            <p class="lead">Use a tag <code>spaceless</code> espaço para remover o espaço em branco entre as tags HTML :</p>

            <code>{% spaceless %}
              <br>&lt;div&gt;
              <br>&lt;strong&gt;foo bar&lt;/strong&gt;
              <br>&lt;/div&gt;
              <br>{% endspaceless %}
              <br>{# output will be &lt;div&gt;&lt;strong&gt;foo bar&lt;/strong&gt;&lt;/div&gt; #}
            </code>

            <p class="lead pt-3">Além da tag sem espaço, você também pode controlar os espaços em branco em um nível por tag. Usando o modificador de controle de espaços em branco nas suas tags, você pode aparar os espaços em branco iniciais e <code>/</code> ou finais:</p>

            <code>{% set value = 'no spaces' %}
              <br>{#- No leading/trailing whitespace -#}
              <br>{% - if true - %}
              <br>{{ - value - }}
              <br>{% - endif - %}
              <br>{# output 'no spaces' #}
            </code>

            <p class="lead pt-3">O exemplo acima mostra o modificador de controle de espaço em branco padrão e como você pode usá-lo para remover espaços em branco em torno de tags. O espaço de recorte consumirá todo o espaço em branco para esse lado da tag. É possível usar o recorte de espaços em branco em um lado de uma tag:</p>

            <code>{% set value = 'no spaces' %}
              <br>&lt;li&gt;     {{ - value }}     &lt;/li&gt;
              <br>{# outputs '&lt;li&gt;no spaces    &lt;/li&gt;' #}
            </code>

          </div>
          <div class="col-2"></div>
        </div>
      </div>
    </main>
