<?php
include "ipsloginver.php";

##################################################
#                                                #
#  Site do Empreendedor                          #
#                                                #
#  WeB Site Desenvolvido por: iGoR PS            #
#  Responsável: José Iomar Batista da Silva      #
#                                                #
##################################################

##################################################
//Incluir VARIáVEIS.php
include "../include.php";
?>

<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Site do Empreendedor :: Painel de Administração (iPS)</title>
<LINK href="../ips.css" type=text/css rel=stylesheet>
</head>

<body bgcolor="#EBEBEB" text="#000000" topmargin="0" leftmargin="0">

<div align="left">
  <table border="0" cellpadding="0" cellspacing="0" width="560">
    <tr>
      <td width="560" align="center">| <b>ARTIGOS ---------------------------------------------------------------------------------</b></td>
    </tr>
    <tr><td width="560" height="5" align="center"><b>---------------------------------------------------------------------------------------------</b></td></tr>
    <tr>
      <td width="560" align="right"><a href="?acao=index" class="line">Artigos publicados</a> | <a href="?acao=adicionar" class="line">Adicionar</a></td>
    </tr>
    <tr><td width="560" height="5" align="center"><b>---------------------------------------------------------------------------------------------</b></td></tr>
    <tr>
      <td width="560"><br>

<?php
#
# Ações:
#
    //Incluir VARIáVEIS
    include "../include.php";
    //Conectar e selecionar Bando de Dados
    $conexao = mysql_connect($sedbhost,$sedbuser,$sedbsenha) or die ("Falha na conexão com o Bando de Dados, por favor contate o administrador");
    $selectbd = mysql_select_db("$sedb") or die("Erro ao selecionar o banco de dados, por favor contate o administrador");

switch ($_GET[acao])
{
  default:
    echo "<b>+ Artigos publicados</b><BR><BR><BR>";
    echo "
        <div align=\"center\">
          <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"465\" bordercolorlight=\"#000000\" bordercolordark=\"#EBEBEB\" bgcolor=\"#FFCC0\" bordercolor=\"#FFCC00\">
            <tr>
              <td width=\"17\" height=\"30\" align=\"center\" bgcolor=\"#000000\"><b><font color=\"#FFFFFF\">ID</font></b></td>
              <td width=\"300\" height=\"30\" align=\"center\" bgcolor=\"#000000\"><b><font color=\"#FFFFFF\">ARTIGO</font></b></td>
              <td width=\"148\" height=\"30\" align=\"center\" bgcolor=\"#000000\"><b><font color=\"#FFFFFF\">CONFIGURAÇÕES</font></b></td>
            </tr>";
    //Comandos SQL
    $selecionar = mysql_query("SELECT * FROM se_artigos ORDER BY `id` DESC") or die("Erro no PHP ao selecionar as historias");
    while($dados = mysql_fetch_array($selecionar))
    {
      $id     = $dados["id"];
      $data   = $dados["data"];
      $titulo = $dados["titulo"];

      echo "
            <tr>
              <td width=\"17\" height=\"20\" align=\"center\"><b>$id</td>
              <td width=\"300\" height=\"20\">&nbsp;<b>$data</b> - $titulo</td>
              <td width=\"148\" align=\"center\" height=\"20\"><a href=\"?acao=ver&id=$id\" class=\"linesimples\">Ver</a> | <a href=\"?acao=editar&id=$id\" class=\"linesimples\">Editar</a> | <a href=\"?acao=excluir&id=$id\" class=\"linesimples\">Excluir</a></td>
            </tr>";
    }

    echo "</table></div><br><br><br>";
  break;

  case adicionar:
    echo "<b>+ Adicionar Artigo</b><BR><BR><BR>";
    $datatual = date("d")."/".date("m")."/".date("Y");
    echo "
        <div align=\"center\">
          <form method=\"POST\" action=\"?acao=exe&exe=adicionar\">
          <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"465\">
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" height=\"10\"></td>
              <td width=\"311\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Título:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" class=\"inputadmin\" name=\"titulo\" size=\"38\" maxlength=\"255\"><br>
                Título do Artigo, esse título será usado na paginação dos artigos cadastrados.
                Máx: <b>255 Caractéres</b></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Data:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" class=\"inputadmin\" name=\"data\" size=\"15\" value=\"$datatual\" maxlength=\"10\"><br>
                Data em que está sendo adicionado o Artigo.<br>
                Formato: <b>DD/MM/AAAA</b></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Autor:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" name=\"autor\" size=\"48\" class=\"inputadmin\" maxlength=\"255\"><br>
                Autor do artigo.<br>
                Máx: <b>255 Caractéres</b></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Artigo:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><textarea rows=\"15\" name=\"artigo\" cols=\"48\"></textarea><br>
                Texto completo do artigo</td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"top\"></td>
              <td width=\"10\" align=\"center\" valign=\"top\" height=\"10\">|</td>
              <td width=\"311\" valign=\"top\" align=\"right\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"top\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\" align=\"right\"><input type=\"submit\" value=\"&gt;&gt;\" name=\"enviar\">
                <input type=\"reset\" value=\"Redefinir\" name=\"resetar\">&nbsp; </td>
            </tr>
          </table>
          </form>
        </div>
        <br>";
  break;

  case ver:
    echo "<b>+ Ver Artigo</b><BR><BR>";

    //Comandos SQL
    $selecionar = mysql_query("SELECT * FROM se_artigos WHERE id='$_GET[id]'") or die("Erro ao selecionar o id");

    if(mysql_num_rows($selecionar)>0)
    {
      $dados = mysql_fetch_array($selecionar);
       $id        = $dados["id"];
       $data      = $dados["data"];
       $titulo    = $dados["titulo"];
       $autor     = $dados["autor"];
       $artigo    = $dados["artigo"];

      echo "
        <div align=\"center\">
          <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"465\">
            <tr>
              <td width=\"145\" align=\"right\"><b>iD:</b></td>
              <td width=\"9\" align=\"center\"></td>
              <td width=\"311\">$id</td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\"><b>Título:</b></td>
              <td width=\"9\" align=\"center\"></td>
              <td width=\"311\">$titulo</td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\"><b>Data:</b></td>
              <td width=\"9\" align=\"center\"></td>
              <td width=\"311\">$data</td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\"><b>Autor:</b></td>
              <td width=\"9\" align=\"center\"></td>
              <td width=\"311\">$autor</td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"top\"><b>Artigo:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\"></td>
              <td width=\"311\" valign=\"top\"><p align=\"justify\">$artigo</p></td>
            </tr>
          </table>
        </div>
        <br>";
    }
    else { echo "<b><center>ID inexistente.</center></b><br><br>"; }
  break;

  case editar:
    echo "<b>+ Editar Artigo</b><BR><BR>";

    //Comandos SQL
    $selecionar = mysql_query("SELECT * FROM se_artigos WHERE id='$_GET[id]'") or die("Erro ao selecionar o id");

    if(mysql_num_rows($selecionar)>0)
    {
      $dados = mysql_fetch_array($selecionar);
       $id        = $dados["id"];
       $data      = $dados["data"];
       $titulo    = $dados["titulo"];
       $autor     = $dados["autor"];
       $artigo    = $dados["artigo"];

       $artigo = str_replace("<br>",chr(13),$artigo);
       
       echo "
        <div align=\"center\">
          <form method=\"POST\" action=\"?acao=exe&exe=editar\">
          <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"465\">
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" height=\"10\"></td>
              <td width=\"311\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>iD:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><b>$id</b></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" height=\"10\"></td>
              <td width=\"311\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Título:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" name=\"titulo\" size=\"38\" value=\"$titulo\" class=\"inputadmin\" maxlength=\"255\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Data:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" name=\"data\" size=\"15\" value=\"$data\" class=\"inputadmin\" maxlength=\"10\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Autor:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><input type=\"text\" name=\"autor\" size=\"48\" value=\"$autor\" class=\"inputadmin\" maxlength=\"255\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"middle\"><b>Artigo:</b></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\"><textarea class=\"textarea02\" rows=\"5\" name=\"artigo\" cols=\"48\">$artigo</textarea></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"top\"></td>
              <td width=\"10\" align=\"center\" valign=\"top\" height=\"10\">|</td>
              <td width=\"311\" valign=\"top\" align=\"right\"></td>
            </tr>
            <tr>
              <td width=\"145\" align=\"right\" valign=\"top\"><input type=\"hidden\" value=\"$id\" name=\"id\"></td>
              <td width=\"9\" align=\"center\" valign=\"top\" height=\"10\"></td>
              <td width=\"311\" valign=\"top\" align=\"right\"><input type=\"submit\" value=\"&gt;&gt;\" name=\"enviar\">
                <input type=\"reset\" value=\"Redefinir\" name=\"resetar\">&nbsp; </td>
            </tr>
          </table>
          </form>
        </div>
        <br>";
    }
    else { echo "<b><center>ID inexistente.</center></b><br><br>"; }
  break;

  case excluir:
    echo "<b>+ Excluir Artigo</b><BR><BR>";

    //Comandos SQL
    $selecionar = mysql_query("SELECT * FROM se_artigos WHERE id='$_GET[id]'") or die("Erro ao selecionar o id");

    if(mysql_num_rows($selecionar)>0)
    {
      $dados = mysql_fetch_array($selecionar);
       $titulo = $dados["titulo"];

      mysql_query("DELETE FROM se_artigos WHERE id='$_GET[id]'") or die("Erro ao remover a artigo");
      echo "<center>O artigo <b>$titulo</b> foi removido com sucesso!</center>";
    }
    else { echo "<b><center>ID inexistente.</center></b><br><br>"; }
  break;

  case exe:
    switch ($_GET[exe])
    {
      case adicionar:
        echo "<b>+ Adicionar Artigo</b><br><br>";

        //Comandos SQL

         $data      = $_POST['data'];
         $titulo    = $_POST['titulo'];
         $autor     = $_POST['autor'];
         $artigo    = $_POST['artigo'];
         
         $dayNot   = substr($_POST[data], 0, 2);
        $monthNot = substr($_POST[data], 3, 2);
        $yearNot  = substr($_POST[data], 6, 4);

        $datacron = $yearNot."-".$monthNot."-".$dayNot;
         
         
         $artigo = str_replace(chr(13),"<br>",$artigo);

        $cadastra    = mysql_query("INSERT into se_artigos (id,titulo,data,artigo,autor,datacron) VALUES ('','$titulo','$data','$artigo','$autor','$datacron')") or die("Erro ao cadastra a Artigo");
        echo "<center><b>Artigo adicionada com sucesso!</b></center>";
      break;

      case editar:
        echo "<b>+ Editar Artigo</b><br><br>";

        //Comandos SQL

         $id        = $_POST['id'];
         $data      = $_POST['data'];
         $titulo    = $_POST['titulo'];
         $autor     = $_POST['autor'];
         $artigo    = $_POST['artigo'];
         
         $dayNot   = substr($_POST[data], 0, 2);
        $monthNot = substr($_POST[data], 3, 2);
        $yearNot  = substr($_POST[data], 6, 4);

        $datacron = $yearNot."-".$monthNot."-".$dayNot;

         $artigo = str_replace(chr(13),"<br>",$artigo);

        $atualizar = mysql_query("UPDATE se_artigos SET data='$data',titulo='$titulo',autor='$autor',artigo='$artigo',datacron='$datacron' WHERE id='$id'") or die("Erro ao atualizar a artigo");
        echo "<center><b>A artigo foi atualizada com sucesso!</b></center>";
      break;
    }
  break;
}

?>

      </td>
    </tr>
  </table>
</div>

</body>

</html>
