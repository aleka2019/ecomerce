<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    include"conecta.php";
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];
    $senha_crip=md5($senha);
    $email=$_POST['conf_email'];
    $telefone=$_POST['telefone'];
    $sql_1="SELECT email_cliente FROM public.cliente WHERE email_cliente='".$email."';";
    $resultado_1=pg_query($conecta, $sql_1);
    $lin_1=pg_num_rows($resultado_1);
    if($lin_1>0)
    {
        echo"<script>window.alert('O e-mail já está cadastrado...')</script>";
        echo"<script>var confirm=window.confirm('Deseja voltar ao cadastro?')
        if(confirm){
             window.location.href = 'http://200.145.153.175/eduardopires/saite/cadastro.html'
        }
        </script>";
    }
    else
    {
        $sql_2="SELECT nome_cliente FROM public.cliente WHERE nome_cliente='".$nome."';";
        $resultado_2=pg_query($conecta, $sql_2);
        $lin_2=pg_num_rows($resultado_2);
        if($lin_2>0)
        {
            echo"<script>window.alert('O nome de usuário já existe...')</script>";
            echo"<script>var confirm=window.confirm('Deseja voltar ao cadastro?')
            if(confirm){
                window.location.href = 'http://200.145.153.175/eduardopires/saite/cadastro.html'
            }
            </script>";
        }
        else
        {
            $sql_3="INSERT INTO public.cliente VALUES(nextval('cliente_id_cliente_seq'::regclass), '$nome', '$senha_crip', '$email', '$telefone', 'n', 'n');";
            $resultado_3=pg_query($conecta, $sql_3);
            $lin_3=pg_affected_rows($resultado_3);
            if($lin_3==0)
            {
                echo"<script>window.alert('O cadastro não pode ser realizado por alguma razão desconhecida, nos perdoe...')</script>";
                echo"<script>var confirm=window.confirm('Deseja voltar ao cadastro?')
                if(confirm){
                    window.location.href = 'http://200.145.153.175/eduardopires/saite/cadastro.html'
                }
                </script>";
            }
            else
            {
                echo"<script>window.alert('Seu cadastro foi realizado com Sucesso!')</script>";
                echo"<script>var confirm=window.confirm('Deseja voltar ao cadastro?')
                if(confirm){
                    window.location.href = 'http://200.145.153.175/eduardopires/saite/cadastro.html'
                }
                </script>";
            }
        }
    }
    ?>
</body>
</html>