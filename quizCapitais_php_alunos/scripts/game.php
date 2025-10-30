<?php
// Verifica se foi enviada uma resposta via GET
if (isset($_GET['answer'])) {

    // Obtém a questão atual
    $current_question = $_SESSION['game']['current_question'];

    // Pega o índice da resposta clicada
    $answer_index = intval($_GET['answer']);

    // Pega o texto da resposta escolhida
    $answer_given = $_SESSION['questions'][$current_question]['answers'][$answer_index];

    // Verifica se é a resposta correta
    if ($answer_given === $_SESSION['questions'][$current_question]['correct_answer']) {
        $_SESSION['game']['correct_answers']++;
    } else {
        $_SESSION['game']['incorrect_answers']++;
    }

    // Verifica se acabou o jogo
    if ($_SESSION['game']['current_question'] >= $_SESSION['game']['total_questions'] - 1) {
        header('Location: index.php?route=gameover');
        exit;
    }

    // Vai para a próxima questão
    $_SESSION['game']['current_question']++;
    header('Location: index.php?route=game');
    exit;
}

// Pega os dados da sessão
$current_question = $_SESSION['game']['current_question'];
$total_questions = $_SESSION['game']['total_questions'];
$correct_answers = $_SESSION['game']['correct_answers'];
$incorrect_answers = $_SESSION['game']['incorrect_answers'];

$question = $_SESSION['questions'][$current_question]['question'];
$answers = $_SESSION['questions'][$current_question]['answers'];
?>

<!-- HTML da tela do jogo -->
<div class="container">
    <h1>Quiz do Futebol</h1>

    <h5>Questão n.º <strong><?= $current_question + 1 ?> / <?= $total_questions ?></strong></h5>

    <div>
        <h4>
            Corretas: <strong><?= $correct_answers ?></strong> |
            Erradas: <strong><?= $incorrect_answers ?></strong>
        </h4>
    </div>

    <hr>
    <h4><strong><?= htmlspecialchars($question) ?></strong></h4>
    <hr>

    <div>
        <!-- Exibe as 3 opções de resposta -->
        <?php foreach ($answers as $index => $answer): ?>
            <h3 style="cursor: pointer" id="answer_<?= $index ?>">
                <?= htmlspecialchars($answer) ?>
            </h3>
        <?php endforeach; ?>
    </div>

    <div>
        <a href="index.php?route=start">Desistir</a>
    </div>
</div>

<!-- Script para capturar o clique e enviar a resposta -->
<script>
    document.querySelectorAll("[id^='answer_']").forEach(element => {
        element.addEventListener('click', () => {
            let id = element.id.split('_')[1];
            window.location.href = `index.php?route=game&answer=${id}`;
        });
    });
</script>
