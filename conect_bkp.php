<?
$host = "localhost";
$database = "atacadao";
$login_bd = "filial85";
$senha_bd = "senhafilial";
$dsn = "mysql:host=localhost;database=atacadao;charset=utf8";
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$pdo = new PDO($dsn, $login_bd, $senha_bd, $opcoes);
//$db = mysql_connect ($host, $login_bd, $senha_bd);
//$db = mysql_select_db($database) or die ("Erro ao selecionar a base de dados");
//$correcao = mysql_query("SET CHARACTER SET UTF8");
?>