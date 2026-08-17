<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mat = $_POST["mat"];
    $cpf = $_POST["cpf"];
    $msg = ""; 

    echo "nome: " . $nome . " email: " . $email . " mat: " . $mat . " cpf: " . $cpf;
    
    if (!file_exists("alunos.txt")) {
        $arqAluno = fopen("alunos.txt","w") or die("erro ao criar arquivo");
        $linha = "nome;email;mat;cpf\n";
        fwrite($arqAluno,$linha);
        fclose($arqAluno);
    }
    
    $arqAluno = fopen("alunos.txt","a") or die("erro ao abrir arquivo");
    
    $linha = $nome . ";" . $email . ";" . $mat . ";" . $cpf . "\n";
    
    fwrite($arqAluno,$linha);
    fclose($arqAluno);
    $msg = "Aluno cadastrado com sucesso!!!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Aluno</title>
</head>
<body>
    <h1>Criar Novo Aluno</h1>
     <form action="CodeAlun.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        Email: <input type="text" name="email">
        <br><br>
        Matrícula: <input type="text" name="mat">
        <br><br>
        CPF: <input type="text" name="cpf">
        <br><br>
        <input type="submit" value="Criar Novo Aluno">
    </form>
    
    <p><?php echo $msg; ?></p>
    <br>
</body>
</html>
