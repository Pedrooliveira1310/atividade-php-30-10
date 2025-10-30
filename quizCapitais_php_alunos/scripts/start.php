<?php
session_start();

// Verifica se a requisição é do tipo POST (quando o formulário é enviado)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtém o número total de questões (ou usa 10 como padrão)
    $total_questions = intval($_POST['text_total_questions']) ?? 10;

    // Prepara o jogo
    prepare_game($total_questions);

    // Redireciona para a página do jogo
    header('Location: index.php?route=game');
    exit;
}

/**
 * Prepara o jogo com base no número total de perguntas.
 * Compatível com perguntas no formato:
 * [ "Pergunta", "Resposta correta", ["Errada 1", "Errada 2"] ]
 */
function prepare_game($total_questions)
{
    global $capitals; // ainda é o mesmo nome da variável do require no index.php

    // Embaralha todas as perguntas disponíveis
    shuffle($capitals);

    // Seleciona apenas a quantidade desejada
    $selected = array_slice($capitals, 0, $total_questions);

    $questions = [];

    foreach ($selected as $item) {
        // Estrutura esperada: [pergunta, resposta_correta, [erradas]]
        $question_text = $item[0];
        $correct_answer = $item[1];
        $wrong_answers = $item[2] ?? [];

        // Junta as três opções (1 correta + 2 erradas)
        $answers = array_merge([$correct_answer], $wrong_answers);

        // Embaralha a ordem das opções
        shuffle($answers);

        // Monta o array da questão
        $questions[] = [
            'question' => $question_text,
            'correct_answer' => $correct_answer,
            'answers' => $answers
        ];
    }

    // Armazena tudo na sessão
    $_SESSION['questions'] = $questions;
    $_SESSION['game'] = [
        'total_questions' => $total_questions,
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0
    ];
}
?>

<!-- HTML da página inicial -->
<div class="container">
    <div class="row">
        <!-- Título principal -->
        <h1>Quiz do Futebol</h1>
        <hr>

        <!-- Formulário de início -->
        <form action="index.php?route=start" method="post">
            <h3>
                <label for="text_total_questions" class="form-label">Número de questões:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="text_total_questions" 
                    name="text_total_questions" 
                    value="10" 
                    min="1" 
                    max="20"
                >
            </h3>

            <div>
                <button type="submit" class="btn">Iniciar</button>
            </div>
        </form>
    </div>
</div>
