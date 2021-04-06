<?php
require_once 'class/database.php';
$db = (new database())->connection();

if(isset($_GET['search']) && $_GET['search']){
$email_user = $_POST['email'];
if($_POST['domain']!=='0'){
	$domain_optional_condition = " AND DomainID = ".$_POST['domain'];
}else{
	$domain_optional_condition = "";
}

$sql = "
SELECT Mail.*, Domain.ID AS DomainID, Domain.Name AS DomainName
FROM `Mail` LEFT JOIN `Domain`
ON Domain.ID = Mail.DomainID
WHERE Mail.Address LIKE '%$email_user%'$domain_optional_condition
ORDER BY Mail.Timestamp ASC;";
$search_results = $db->fetch($sql) ?: false;
}

if(isset($_GET['delete_id'])){
$sql = "DELETE FROM `Mail` WHERE ID=".$_GET['delete_id'].";";
$db->command($sql);
header('Location: admin.php');
}



if(!isset($_GET['filter_by'])){
$sql = "
SELECT Mail.*, Domain.ID AS DomainID, Domain.Name AS DomainName
FROM `Mail` LEFT JOIN `Domain`
ON Domain.ID = Mail.DomainID
ORDER BY Mail.Timestamp ASC;";
}else{
$domain_id = $_GET['filter_by'];
$sql = "
SELECT Mail.*, Domain.ID AS DomainID, Domain.Name AS DomainName
FROM `Mail` LEFT JOIN `Domain`
ON Domain.ID = Mail.DomainID
WHERE DomainID = $domain_id
ORDER BY Mail.Timestamp ASC;";
}

?>
<h1>Admin section</h1>
<hr>
<p>Search:</p>
<form method='post' action='admin.php?search=true'>
  <input type='text' id='email' name='email'<?php if(isset($_POST['email'])){echo " value='".$_POST['email']."'";}?>>
<select id="domain" name="domain">
	<option value='0'>All Domains</option>
<?php
$result_provider = $db->fetch("SELECT * FROM `Domain`;");
if(isset($_POST['domain'])){$domain_id = $_POST['domain'];}else{$domain_id = 0;}
foreach($result_provider as $row){
	if($domain_id==$row['ID']){
		$selected=' selected';
	}else{
		$selected='';
	}
	echo "<option value='".$row['ID']."'$selected>".$row['Name']."</option>";
}
?>
</select>
  <input type='submit' value='Search'>
</form>
<?php if(isset($search_results) && $search_results){ ?>
<ul>
	<?php foreach($search_results as $row){
		echo "<li>".$row['Address']."@".$row['DomainName']."\n";
	} ?>
</ul>
<?php }elseif(isset($search_results) && !$search_results){ ?>
No search results.
<?php }else{ ?>
Please enter username to search for subscribers.
<?php } ?>
<hr>
<p>Filter by provider:</p>
<?php
$result_provider = $db->fetch("SELECT * FROM `Domain`;");
foreach($result_provider as $row){
	echo "<a href='admin.php?filter_by=".$row['ID']."'>".$row['Name']."</a>\n<br>";
}

?>
<hr>
<p>View all:</p>
<small>You can click table headers, it will sort.</small>
<br><br>

<?php
if($result = $db->fetch($sql)){
	echo "<table class='sortable'>";
	echo "<tr><td>Email</td><td>Date subscribed</td><td> </td></tr>";
	foreach($result as $row){
		$delete_link = "<a href='admin.php?delete_id=".$row['ID']."'>Delete</a>";
		echo "<tr class='item'><td>".$row['Address']."@".$row['DomainName']."</td><td>".gmdate("Y-m-d (H:i:s)", $row['Timestamp'])."</td><td>$delete_link</td></tr>";
	}
	echo "</table>";
}else{
	echo "Nothing to show.";
}
?>

<script src="lib/sorttable.js"></script>
