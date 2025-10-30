# 🧠 Quiz dos Games e Futebol

Um jogo de perguntas e respostas desenvolvido em **PHP puro**, que testa seus conhecimentos sobre **games, futebol e clubes históricos**.  
O projeto utiliza **sessões PHP** para controlar o progresso do jogador e permite escolher o número de perguntas a serem respondidas.

---

## 🚀 Funcionalidades

✅ Escolha o número de questões (1 a 20)  
✅ Perguntas e respostas embaralhadas automaticamente  
✅ Controle de acertos e erros em tempo real  
✅ Exibição do progresso do jogo  
✅ Término automático ao final do quiz  
✅ Banco de perguntas temático (Games, Futebol e Palmeiras)

---

## 🧩 Estrutura do Projeto

/
├── index.php # Controlador principal do jogo
├── start.php # Tela inicial (configuração do quiz)
├── game.php # Tela onde as perguntas são exibidas
├── gameover.php # Tela final com o placar e resultado
├── /data
│ ├── futebol.php # Perguntas sobre futebol
│ ├── games.php # Perguntas sobre jogos eletrônicos
│ └── palmeiras.php # Perguntas exclusivas sobre o Palmeiras
├── /assets
│ ├── style.css # (opcional) estilos personalizados
│ └── ...
└── README.md # Este arquivo

--

## ⚙️ Como Funciona

1. **O usuário acessa o site** e escolhe o número de perguntas desejadas.  
2. O PHP sorteia perguntas aleatórias do banco (`data/*.php`).  
3. Cada pergunta é exibida com **3 alternativas** (1 correta + 2 incorretas).  
4. O sistema registra se o jogador acertou ou errou.  
5. Ao final, o jogador é levado para a tela de resultados (`gameover.php`).  

---

## 🧠 Estrutura de uma Pergunta

Cada arquivo de perguntas (`data/*.php`) retorna um array no formato:

```php
return [
    ["Pergunta", "Resposta correta", ["Alternativa errada 1", "Alternativa errada 2"]],
    ...
];
Exemplo:

php
Copiar código
["Quem foi o artilheiro da Copa do Mundo de 2002?", "Ronaldo", ["Rivaldo", "Miroslav Klose"]],
💡 Exemplo de Uso
Abra o projeto no navegador (ex: http://localhost/quiz/).

Escolha o número de perguntas.

Clique em Iniciar.

Responda as perguntas clicando nas opções.

Veja o resultado final com seu número de acertos e erros.

🧰 Tecnologias Utilizadas
PHP 8+

HTML5 / CSS3

JavaScript (puro) para os cliques e navegação

Sessions PHP para armazenar o progresso do jogo

🏆 Créditos
Desenvolvido por [Pedro de Oliveira]
Disciplina: Programação Back-End
Professor: [Raul🧙‍♂️]
Instituição: [Senai Jacob Lafer]

📄 Licença
Este projeto é livre para uso educacional.
Sinta-se à vontade para modificar as perguntas, adicionar novos temas e personalizar o visual do jogo.
