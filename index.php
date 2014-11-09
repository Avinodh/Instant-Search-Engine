<html>
	<head>
		<title> Instant Search</title>
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
			function getList(){
				var search_val = $("input[name='search']").val();
				$.post('search.php', {search: search_val}, function(data) {
					$("#results").html(data); 
				}); 
			}
		</script>
	</head>

	<body>
		<form action="index.php" method="post">
			<input type="text" name="search" placeholder="search" onkeydown="getList();">
		</form>
		
		<div id="results">
		</div>
	</body>
</html>