<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "conexao.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = ($_POST["nome"]);
            $email = ($_POST["email"]);
             $senha = ($_POST["senha"]);

             $senha_hash = password_hash ($senha, PASSWORD_DEFAULT);
             $sql = "INSERT INTO usuario (nome, email, senha) VALUES(?, ?, ?)";

             $stmt = $acesso -> prepare($sql);
             $stmt -> bind_param("sss", $nome, $email, $senha_hash);

             if ( $stmt ->execute()){
                echo "Usuário cadastrado";}else{
                    echo "erro:" . $stmt->error;
                }

            $stmt ->close();
            $acesso ->close();
       
   
        }
?>
</body>
</html>

