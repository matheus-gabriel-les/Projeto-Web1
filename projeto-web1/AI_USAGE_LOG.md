# Relatório de Uso de Inteligência Artificial Generativa

Este documento registra todas as interações significativas com ferramentas de IA generativa (como Gemini, ChatGPT, Copilot, etc.) durante o desenvolvimento deste projeto. O objetivo é promover o uso ético e transparente da IA como ferramenta de apoio, e não como substituta para a compreensão dos conceitos fundamentais.

## Política de Uso
O uso de IA foi permitido para as seguintes finalidades:
- Geração de ideias e brainstorming de algoritmos.
- Explicação de conceitos complexos.
- Geração de código boilerplate (ex: estrutura de classes, leitura de arquivos).
- Sugestões de refatoração e otimização de código.
- Debugging e identificação de causas de erros.
- Geração de casos de teste.

É proibido submeter código gerado por IA sem compreendê-lo completamente e sem adaptá-lo ao projeto. Todo trecho de código influenciado pela IA deve ser referenciado neste log.

---

## Registro de Interações

*Copie e preencha o template abaixo para cada interação relevante.*

### Interação 1

- **Data:** 20/10/2025
- **Etapa do Projeto:** 1 - Compressão de Arquivos
- **Ferramenta de IA Utilizada:** Gemini Advanced
- **Objetivo da Consulta:** Eu estava com dificuldades para entender como gerenciar o dicionário do algoritmo LZW quando ele atinge o tamanho máximo. Precisava de uma estratégia para lidar com isso.

- **Prompt(s) Utilizado(s):**
  1. "No algoritmo de compressão LZW, o que acontece quando o dicionário atinge o tamanho máximo? Quais são as estratégias mais comuns para lidar com isso?"
  2. "Pode me dar um exemplo em Python de como implementar a estratégia de 'resetar o dicionário' no LZW?"

- **Resumo da Resposta da IA:**
  A IA explicou três estratégias: 1) parar de adicionar novas entradas, 2) resetar o dicionário para o estado inicial, e 3) usar uma política de descarte, como LRU (Least Recently Used), que é mais complexa. A IA forneceu um pseudocódigo para a estratégia de reset, que parecia a mais simples e eficaz para este projeto.

- **Análise e Aplicação:**
  A resposta da IA foi extremamente útil para clarear as opções. Optei por implementar a estratégia de resetar o dicionário. O código fornecido pela IA não foi usado diretamente, pois estava muito simplificado e não se encaixava na minha arquitetura de classes. No entanto, a lógica de verificar o tamanho do dicionário e invocar uma função `reset_dictionary()` foi a base para a minha implementação. Isso me poupou tempo de pesquisa em artigos e livros.

- **Referência no Código:**
  A lógica inspirada por esta interação foi implementada no arquivo `compressor/lzw.py`, especificamente na função `compress()`, por volta da linha 85.

---

### Interação 2

- **Data:** 05/11
- **Etapa do Projeto:** Inicial
- **Ferramenta de IA Utilizada:** Chagpt
- **Objetivo da Consulta:** Correcao bug css 
- **Prompt(s) Utilizado(s):**
1-porque esse codigo nao esta dando um espaco entre os botoes nem alinhado eles na parte direita superior da tela ? ::ng-deep .p-button{ display: flex; justify-content: space-between; left: 0; }
2-com pixel nao e ruim de fazer ? <ng-template [ngIf]="projetoweb"> <div styleClass="container" > <p-button label="logar"></p-button> <p-button label="Criar conta"></p-button> </div> </ng-template> ::ng-deep .container{ display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px; }
- **Resumo da Resposta da IA:**
Reformulou o codigo, em vez de usar px em margem, colocou 1 rem. Na parte do html, retirou o styleClass na div e substituiu por class
- **Análise e Aplicação:**
Aplique a estilizacao nos botoes de login e cadastro, o que facilitou a compressao do porque a estilizacao nao estava funcionando.
- **Referência no Código:** 
As auteracoes foram aplicadas em app.component.html e em app.component.css, na parte do html foi aplicada na div na linha 3, trocando a funcao styleClass por class, no css autereou justify-content: space-between para justify-content: flex-end, retirou left 0 para adicionar gap 10 px, margem-top 1 rem. 

### Interação 3

- **Data:** 08/11
- **Etapa do Projeto:** Inicial
- **Ferramenta de IA Utilizada:** Chagpt
- **Objetivo da Consulta:** Correcao bug js 
- **Prompt(s) Utilizado(s):**
pq o codigo javascript nao esta funcionando ? <!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet"href=" Site.css" > <script src="Arquivo.js" defer></script> <title>Projeto Web I</title> </head> <body> <div id="alinha"> <h1 style="font-size: 5rem;">Jogo</h1> <div class="container"> <form action="index.php" method="post"> <button class="botao" type="submit" name="logar">logar</button> <button class="botao" type="submit" name="CriarConta">Criar conta</button> </form> </div> </div> </body> </html> const botoes = document.getElementsByClassName('botao'); function mudarCor() { Array.from(botoes).forEach(botao => { botao.addEventListener('mouseover', () => botao.style.backgroundColor = '#5A68D6'); botao.addEventListener('mouseout', () => botao.style.backgroundColor = '#8490E8'); }); }
- **Resumo da Resposta da IA:**
JS executando antes do DOM	Elementos ainda não existem	“Cannot read properties of undefined”
Função mudarCor() não chamada	Nenhum evento foi aplicado	Nada acontece ao passar o mouse
- **Análise e Aplicação:**
Utilizei os eventos mouseover e mouseout para deixar dar ao usuario uma melhor experiencia ao clicar nos botoes cadastrar e login

-- **Referência no Código:** 
Foi adicionado ao codigo a linha document.addEventListener("DOMContentLoaded", () => {}) para possibilitar o navegador ler e html e disponibilizar a execucao do js, o que com o codigo anterior, estava sendo barrada

### Interação 3
- **Data:** 08/11
- **Etapa do Projeto:** Em progresso
- **Ferramenta de IA Utilizada:** Claude
- **Objetivo da Consulta:** Correcao bug e melhora codigo js 
- **Prompt(s) Utilizado(s):**
1-corrija esse codigo para que nao apareca o item de selecionar o arquivo, pois quero que o codigo leia o arquivo e ja forneca o texto na tela. OBS:nao retire a estilização que coloquei.
2- O texto nao apareceu.Tem como fazer isso com php entao para resolver esse problema sem que ter q apagar todo o codigo js ?
- **Resumo da Resposta da IA:**
1-O que foi adicionado/corrigido:
Carregamento automático - O arquivo palavras.txt agora é carregado automaticamente quando a página abre, através da função loadPalavras() que é chamada no final do código
Async/await - Corrigido o uso de fetch() com async/await para carregar o arquivo corretamente (antes estava faltando o await)
Geração automática de texto - Assim que as palavras são carregadas, o texto é gerado e exibido automaticamente na tela

2-Quando você abre um arquivo HTML diretamente do disco (file:///), os navegadores modernos bloqueiam o acesso a outros arquivos locais por segurança. Por isso o fetch("palavras.txt") não funcionava.
Este arquivo PHP: Lê o conteúdo do palavras.txt do servidor
Separa as palavras usando espaços/quebras de linha
Converte para formato JSON
Retorna as palavras para o JavaScript
Por que PHP? Porque PHP roda no servidor, não no navegador, então ele consegue ler arquivos locais sem restrições de segurança.

- **Análise e Aplicação:**
Com os prompts elaborados com a ia, foi possivel automatizar o processo, possibilitando o algoritimo ler um arquivo externo, fazendo com que a necessidade de um array complexo dentro do js nao seja necessaria.

-- **Referência no Código:** 
Foi adicionado a funcao <?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$arquivo = 'palavras.txt';
if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $palavras = preg_split('/\s+/', trim($conteudo));
    $palavras = array_filter($palavras);
    
    echo json_encode(array('palavras' => array_values($palavras)));
} else {
    echo json_encode(array('erro' => 'Arquivo não encontrado'));
}
?>, para ler o arquivo, sendo acessada atravez do const resposta = await fetch("jogo.php"); dentro do js

### Interação 4

* **Data:** 14/11

* **Etapa do Projeto:** Tela de Cadastro

* **Ferramenta de IA Utilizada:** ChatGPT

* **Objetivo da Consulta:** Ajuda na correção de erro na tela de cadastro que não enviava os dados corretamente.

* **Prompt(s) Utilizado(s):**

  1. “Meu formulário de cadastro não está enviando os dados para o PHP. O botão dispara o submit, mas no PHP as variáveis chegam vazias. Pode verificar o HTML e o JS para ver onde está o erro?”
  2. “O campo de email está sendo validado, mas mesmo quando está correto ele retorna a mensagem de erro. Pode revisar minha função de validação?”

* **Resumo da Resposta da IA:**
  A IA identificou dois problemas:

  1. Na tag `<form>`, o atributo `name` estava faltando, impedindo o PHP de capturar as variáveis `$_POST`.
  2. A função de validação tinha uma expressão regular incompleta e sempre retornava `false`. A IA sugeriu uma regex mais apropriada e corrigiu o retorno da função.

* **Análise e Aplicação:**
  As correções foram aplicadas e finalmente o formulário começou a enviar os dados corretamente. O ajuste da regex também eliminou o erro permanente no campo de email. A ajuda acelerou muito o processo, pois eu estava testando várias soluções sem conseguir encontrar o problema real.

* **Referência no Código:**
  Correções aplicadas no arquivo `cadastro.html` (linha 12 – adição do atributo `name`) e no arquivo `cadastro.js` (função `validarEmail()` por volta da linha 33).

---

### Interação 5

* **Data:** 18/11

* **Etapa do Projeto:** Refinamento da Interface

* **Ferramenta de IA Utilizada:** Copilot

* **Objetivo da Consulta:** Ajuste de estilização e melhoria de acessibilidade.

* **Prompt(s) Utilizado(s):**

  1. “Preciso melhorar a acessibilidade dos botões sem alterar a aparência visual. Como posso adicionar suporte para teclado e descrição para leitores de tela?”
  2. “O botão do Érick não está seguindo o estilo padrão. Consegue sugerir o que revisar no CSS?”

* **Resumo da Resposta da IA:**
  Copilot sugeriu adicionar atributos `aria-label` e eventos de teclado (`keyup`, `keydown`) para garantir acessibilidade.
  Também identificou que o botão do Érick estava recebendo dois estilos conflitantes devido a uma classe duplicada no HTML.

* **Análise e Aplicação:**
  As melhorias deixaram o projeto mais consistente e acessível. A sugestão sobre o botão do Érick resolveu o problema de estilo imediatamente. Não houve alterações profundas, apenas ajustes pontuais orientados pela IA.

* **Referência no Código:**

  * Atributos ARIA adicionados no arquivo `app.component.html` (linhas 5 e 6).
  * Remoção da classe duplicada aplicada ao botão do Érick (linha 14).
  * Eventos de teclado adicionados no arquivo `acessibilidade.js`, entre as linhas 10 e 25.
