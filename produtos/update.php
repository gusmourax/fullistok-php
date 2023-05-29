<?php require_once('../header.php'); ?>
<style>

</style>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form method="post" id="form">
        <?php
        require_once('../connect.php');

        $id = $_GET['id'];

        $sth = $pdo->prepare("SELECT id, descricao,estoque_minimo,estoque_maximo from produtos WHERE id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
        $sth->execute();

        $reg = $sth->fetch(PDO::FETCH_OBJ);

        $id = $reg->id;
        $descricao = $reg->descricao;
        $estoque_minimo = $reg->estoque_minimo;
        $estoque_maximo = $reg->estoque_maximo;
        ?>
        <table class="table table-bordered table-responsive table-hover">
          <h3>Produtos</h3>
          <tr>
            <td>Descrição</td>
            <td><input name="descricao" id="descricao" type="text" value="<?= $descricao ?>"></td>
          </tr>
          <tr>
            <td>Estoque mínimo</td>
            <td><input name="estoque_minimo" id="minimo" type="number" value="<?= $estoque_minimo ?>"></td>
          </tr>
          <tr>
            <td>Estoque máximo</td>
            <td><input name="estoque_maximo" id="maximo" type="number" value="<?= $estoque_maximo ?>"></td>
          </tr>
          <tr>
            <td></td>
            <td>
              <input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="id" type="hidden" value="<?= $id ?>">
              <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['enviar'])) {
  $id = $_POST['id'];
  $descricao = $_POST['descricao'];
  $estoque_minimo = $_POST['estoque_minimo'];
  $estoque_maximo = $_POST['estoque_maximo'];

  $data = [
    'descricao' => $descricao,
    'estoque_minimo' => $estoque_minimo,
    'estoque_maximo' => $estoque_maximo,
    'id' => $id,
  ];

  $sql = "UPDATE produtos SET descricao=:descricao, estoque_minimo=:estoque_minimo,estoque_maximo=:estoque_maximo  WHERE id=:id";
  $stmt = $pdo->prepare($sql);

  if ($stmt->execute($data)) {
    print "<script>alert('Registro alterado com sucesso!');location='index.php';</script>";
  } else {
    print "Erro ao editar o registro!<br><br>";
  }
}
?>
<?php require_once('../footer.php'); ?>