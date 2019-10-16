<html>
<head>

<style type="text/css">
<!--
.Style4 {font-size: 12px}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="code.php">
  <table width="420" border="0">
    <tr>
      <td>Titre</td>
      <td><label>
        <input name="titre" type="text" id="titre" />
      </label></td>
    </tr>
    <tr>
      <td>Contenu</td>
      <td><label>
        <input name="contenu" type="text" id="contenu" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="modidier" type="submit" id="modidier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>


<?php //database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'miniblog');
define('DB_USER', 'root');
define('DB_PASS', '');

$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function get_all_posts()
{
    global $db;
    $sth = $db->query("SELECT * FROM posts");
    return $sth->fetchAll();
}
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr>
<td width="150">Titre</td>
<td width="200">Contenu</td>
</tr>
<?php
$var=0;
while ($row = $result->fetch_row())
{

if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=1;
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr><undefined></undefined>
<?php
$var=0;
 }
 }
?>
</table>
</body>
</html>

<?php
$titre=$_POST['titre'];
$contenu=$_POST['contenu'];
$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         if (isset($_POST['ajouter']))
         {
           if($titre=='')
          {
         echo '<body onLoad="alert("Titre obligatoire")">';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';

          }
          elseif ($contenu=='')
          {
          echo '<body onLoad="alert("Contenu obligatoire")">';
                               echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }

         elseif ($titre!='' || $contenu!='')
         {
          $rqt="insert posts values('$titre','$contenu')";

          mysql_query($rqt);

            echo '<body onLoad="alert("Ajout effectuée")">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          mysql_close();
          }
        }
       if (isset($_POST['modifier']))
       {

           $rqt="update posts set titre='$titre',contenu='$contenu'";
        mysql_query($rqt);
          echo '<body onLoad="alert("Modification effectuée")">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        mysql_close();
         }

       elseif(isset($_POST['supprimer']))
         {

         $rqt="delete  FROM posts  where titre ='$rech'";

        mysql_query($rqt);
         echo '<body onLoad="alert("Suppression effectuée")">';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        mysql_close();
         }


?>
<?php$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
function get_all_posts()
{
    global $db;
    $sth = $db->query("SELECT * FROM posts");
    return $sth->fetchAll();
}

?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >

<td width="150">Titre</td>
<td width="200">Contenu</td>
</tr>
<?php
$var=0;
while($row=mysql_fetch_array($res))
{

if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=1;
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=0;
 }
 }
?>
</table>
