
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="borda">
     <form action="calculadora.php" method="POST">
        N° Máquinas<br>
       <input type="text" name="num" required></input><br>
       Hora de Funcionamento<br>
       <input type="text" name="hora" required></input><br>
       Custo/hora da maquina<br>
       <input type="text" name="custo" required></input><br>
       Custo de mao de obra<br>
      <input type="text" name="mao" required></input><br>
      %de disponibilidade atual da máquina<br>
      <input type="text" name="porc" required></input><br>
       <input class="botao" type="submit" name="botao" value="Calcular"></input><br><br><br>
      </form>
  </div>
<?php
  if (isset($_POST['botao'])) {
    $numero = $_POST['num'];
    $hora = $_POST['hora'];
    $custo = $_POST['custo'];
    $mao  = $_POST['mao'];
    $disp = $_POST['porc'];
    
    if (is_numeric($numero) && is_numeric($hora) && is_numeric($custo) && is_numeric($mao) && is_numeric($disp)) {
        $total_inatividade = ($numero*$hora*$disp)/100;
        $total_inatividade = $hora-$total_inatividade;
        $paralisacao_causada_falhas_mecanicas = 0.65*$total_inatividade;
        $paralisacao_falhas_hidraulicas = 0.35*$total_inatividade;
        $fluido_contaminado = 0.80*$paralisacao_falhas_hidraulicas;
        $total_custo_tempo_inatividade = $fluido_contaminado*$custo;
        $total_custo_mao_de_obra = $fluido_contaminado*$mao;
        $total_despesas = $total_custo_tempo_inatividade+$total_custo_mao_de_obra;
        $horas_inatividades_reduzidos = 0.20*$total_inatividade;
        $custo_tempo_inatividade_reduzido = 0.20*$total_custo_mao_de_obra;
        $custo_mao_reduzido = 0.20*$total_custo_mao_de_obra;
        $total_restante_usando_triple = 0.20*$total_despesas;
        $economia_total_custos = $total_restante_usando_triple-$total_despesas;

    } else {
      $resultado = "<br>Entrada inválida. Digite apenas números.";
    }
  } else {
    $resultado = "";
  }
?>
  <p>Total de horas de inatividade por ano: <?php echo $total_inatividade; ?></p>
  <p>Paralisação causada por falhas Mecânicas ou Elétricas:<?php echo $paralisacao_causada_falhas_mecanicas; ?></p>
  <p>Paralisção causada por falhas Hidráulicas: <?php echo $paralisacao_falhas_hidraulicas; ?></p>
  <p>...dos quais causados pelo fluido contaminado:<?php echo $fluido_contaminado; ?></p>
  <p>Total dos custos de tempo de inatividade relacionados a fluidos:<?php echo $total_custo_tempo_inatividade; ?></p>
  <p>Total do custo de  mão de obra para reparo: <?php echo $total_custo_mao_de_obra; ?></p>
  <p>Total das suas despesas de manutenção neste momento:<?php echo $total_despesas; ?></p>

  <h2>O serviço perfeito de fluidos e o óleo constantemente limpo evitarão 80% dos custos relacionados a fluidos. O que resta é apenas 20% do seu custo real de manutenção.</h2>
  <p>Horas de inatividade reduzidas para: <?php echo $horas_inatividades_reduzidos; ?></p>
  <p>Custo de tempo de inatividade reduzido para: <?php echo $custo_tempo_inatividade_reduzido ; ?></p>
  <p>Custo de mão de obra reduzido para: <?php echo $custo_mao_reduzido; ?></p>
  <p>Total restante usando Triple R:<?php echo $total_restante_usando_triple;?></p>
  <p>Economia total de custos: <?php echo $economia_total_custos; ?></p>
  
</body>
</html>


 

