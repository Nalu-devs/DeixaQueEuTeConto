<?php
$imgDir = 'img/';
$imgFiles = array_values(array_diff(scandir($imgDir), array('.', '..'))); // corrigido aqui
$audioDir = 'audios/';
$audioFiles = array_values(array_diff(scandir($audioDir), array('.', '..')));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deixa que eu te conto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Deixa que eu te conto</h1>
    <p>Selecione um número e ouça seu conto</p>

    <div class="conteudo">
        <?php 
        $i = 0;
        foreach ($audioFiles as $audioFile): 
            $imgFile = $imgFiles[$i] ?? "";//existe? se n retorna vazio
        ?>
            <div class="card">
                <div class="img">
                    <img src="img/<?php echo $imgFile; ?>" alt="Imagem do conto" class="img">
                </div>

                <div onclick="playAudio('<?php echo $audioFile; ?>')"><?php echo $audioFile; ?></div>
                <div class="audio">
                    
                </div>
            </div>
        <?php 
        $i++;
        endforeach; 
        ?>
        <audio id="audioPlayer" controls class="audio">
            <source id="audioSource" src="" type="audio/mp3">
            Seu navegador não suporta o elemento de áudio.
        </audio>
        <input onkeypress="buscar(event)" type="number" id="pesquisa" placeholder="Digite o numero. . .">
    </div>

    <script>
        document.getElementById('pesquisa').focus();

        function buscar(event) {
        if (event.key === 'Enter') {
            var input = document.getElementById('pesquisa');
            var valor = input.value;
            playAudio(valor+".mp3");
            input.value = '';
        }
    }
    
        function playAudio(fileName) {
            var audioPlayer = document.getElementById('audioPlayer');
            var audioSource = document.getElementById('audioSource');
            
            audioSource.src = 'audios/' + fileName;
            audioPlayer.load(); 
            audioPlayer.play(); 
        }
    </script>
</body>
</html>

<!--funcionaria assim os professores teriam um banco de dados de perguntas diversas areas e poderiam criar novas perguntas tbm, ai os alunos poderiam entrar e responder elas para avaliar seus conhecimentos, o diferencial seria filtrar por escola para apenas os alunos de determinada escola responderem as perguntas que o professor gerar, gamificação para quem acertar mais e teria uma parte de redação que vc poderia escrever e uma ia avaliaria para ver se esta bom e etc, publico alvo seria escola, estudantes, quem vai fazer vestibular e etc>
