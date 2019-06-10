<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>
<body>
    <?php
    //pegar os campos
    if(isset($_POST["id"])){
    $id = $_POST["id"];
    if(isset($_POST["nome"])){
    $nome = $_POST["nome"];
    if(isset($_POST["preco"])){
        $preco = $_POST["preco"];
        if(isset($_POST["categoria"])){
            $categoria = $_POST["categoria"];
            if(isset($_POST["descricao"])){
                $descricao = $_POST["descricao"];
                if(isset($_POST["imagem"])){
                  $imagem = $_POST["imagem"];
                if(empty($nome)||empty($preco)||empty($categoria)||empty($descricao)||empty($imagem)){
                    echo "<h1>Preencha todos os Campos</h1>";
                } else {
                    $id=$_POST["id"];

                    //conectar com o BD         
                    try {
                        require_once "conectar.php";
                        //atualizar o registro na tbesudo
                        $sqltbesudo = $conn->prepare("Update tbesudo set nome='".$nome."', preco='".$preco."',categoria='".$categoria."',descricao='".$descricao."',imagem='". $imagem."' where id=".$id);
                        $sqltbesudo->execute();
                        // echo a message to say the UPDATE succeeded
                        if($sqltbesudo->rowCount()>0)
                        ?>
                        <body>
                    <script type="text/javascript">
                    alert ("Atualizado com Sucesso!");
                    document.location.href="listar.php";
                    
                    </script>
                    </body>
                     <?php
                    
                    
                    }//fim do try
                    catch(PDOException $e)
                    {
                        echo $sql . "<h2>Erro:" . $e->getMessage() . "</h2>";
                    }
                    $conn = null; 
                }
            }else {
                    ?>
                    <body>
                <script type="text/javascript">
                alert ("Tente novamente");
                document.location.href="edit1.php";
                
                </script>
                </body>
                
                <?php
                }
                 } } } } } 
            //fim do else
             else {
                echo "<h2>Preencha todos os campos</h2>";
            }
        
    ?>
</body>
</html>

