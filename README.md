Jogo de Digitação – Desenvolvimento Web I (TADS/UFPR)
Este projeto é um jogo de digitação de frases desenvolvido para a disciplina Desenvolvimento Web I do curso de Tecnologia em Análise e Desenvolvimento de Sistemas (TADS) da UFPR. O objetivo do jogo é medir a velocidade de digitação do usuário com base em frases exibidas na tela.

📝 Funcionalidades
Exibição automática de frases para digitação.
Leitura das frases a partir de um arquivo externo (palavras.json) via PHP.
Verificação da digitação em tempo real com JavaScript.
Interface construída com HTML e CSS.
Feedback visual durante a digitação (acertos e erros).
Registro do tempo gasto para completar a frase.
🚀 Tecnologias Utilizadas
HTML5 – estrutura da interface
CSS3 – layout e estilização
JavaScript – lógica do jogo e interação com o usuário
PHP – leitura das frases e comunicação com o frontend
JSON - Dados NoSQL
MySQL - Banco de dados SQL


▶️ Como Executar
Coloque todos os arquivos em um servidor local (Apache, XAMPP, WAMP ou similar).
Certifique-se de que o PHP está ativado.
Acesse pelo navegador:
http://localhost/AbaSite.html/
O jogo carregará a tela de cadastro/login
📄 Como Funciona
Ao carregar a página, o JavaScript solicita ao PHP uma lista de frases.
O PHP lê o arquivo palavras.JSON e retorna as frases.
A frase escolhida aparece na tela.
O usuário digita no campo indicado e o sistema compara letra por letra.
Quando a frase termina, o total de acertos é exibido.
👨‍🏫 Projeto Acadêmico
Este repositório faz parte das atividades da disciplina Desenvolvimento Web I, com foco em:

uso básico de PHP para leitura de arquivos
manipulação de DOM com JavaScript
organização de páginas HTML
práticas iniciais de usabilidade e layout

Versão 7.0.1-Alpha
