<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <?php
    $conecta=pg_connect("host=localhost port=5432 dbname=bd_72a user=aleka password=ecommerce2019");
    if(!$conecta)
    {
        echo"Erro na conexão com o Banco de Dados";
        exit;
    }
    else
    {
        echo"Conexão com o Banco de Dados realizada com sucesso...";
        $nome='admin';
        $senha='admin';
        $mail='grupo7cti2019@gmail.com';
        $sql="insert into e_7.cliente values('$nome','$senha','$mail');";
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
        if($linhas>0)
        {
            echo"Inserção realizada com sucesso!!";
            exit;
        }
        else
        {
            echo"Erro na gravação dos produtos!!";
        }
    }
    ?>
</body>
</html>