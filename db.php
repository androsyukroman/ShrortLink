<!DOCTYPE html>
	<head>
		<meta charset = "UTF-8">
		<title>Аккаунт администратора</title>
		<style>
			.button
            {
                float: right;
                margin: 25px;
                padding: 10px;
                font-size: 20px;
			} 
			.main
			{
				padding: 25px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
			}
			.blockLink
			{
				padding: 25px;				
				width: 50%;
				float: left;
				font-size: 20px;
			}
			.blockShortLink
			{
				padding: 25px;	
				width: 15%;
				float: left;
				font-size: 20px;
			}
			.blockDelete
			{
				padding: 25px;
				float: left;
				font-size: 20px;
			}
			.title
			{
				font-size: 30px;
			}
		</style>
	</head>
	<body>

	<form action = "MAIN.php">
		<button class = "button">Выйти</button>
	</form>
<?php

	$connect = mysqli_connect('localhost', 'root', '', 'links');
	if (isset($_GET['del']))
			{
				$id = $_GET['del'];
				$un = mysqli_query($connect, "SELECT NameLink FROM `links` WHERE ID=$id") or die(mysqli_error($connect));
				$un1 = mysqli_fetch_assoc($un);
				unlink($un1['NameLink']);
				mysqli_query($connect, "DELETE FROM `links` WHERE ID=$id") or die(mysqli_error($connect));	
			}
			$res = mysqli_query($connect, "SELECT * FROM `links`") or die(mysqli_error($connect));
			?>
		
			<div class="blockLink"><div class="title"><?php echo 'Ссылка'; ?></div></div>
			<div class="blockShortLink"><div class="title"><?php echo 'Короткая ссылка'; ?></div></div>
			
		<?php
				
			while(($rec = mysqli_fetch_assoc($res)))
			{
				?>
				<div class="blockLink"><?php echo $rec['Link']; ?></div>
				<div class="blockShortLink"><?php echo $rec['ShortLink']; ?></div>
				<div class="blockDelete"><a href="?del=<?= $rec['ID'] ?>">Удалить запись</a></div>
				
				<?php
			}
			mysqli_close($connect);
		?>
	</body>
</html>
