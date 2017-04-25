<!Doctype html>
<html>
<head>
	<title>Web Service Json</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data" class = "form-horizontal" action="lab6.php">
		<table class="table table-bordered table-responsive">
		<tr>
			<td><label class="control-label">Productname.</label></td>
			<td><input class="form-control" type="text" name="product_name" placeholder="Enter Productname" value="" /></td> <!--?php echo $productname; ?>-->
			</tr>
			<tr>
			<td colspan="2"><button type="submit" name="btnsubmit" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; Submit
			</button>
			</td>
			</tr>
		</table>
	</form>
</body>
</html>