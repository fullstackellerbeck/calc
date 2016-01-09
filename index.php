<?php 	require_once( "lib/calc.php" );	?>
<!DOCTYPE html>
<html lang="en" ng-app>
	<head>

	</head>

	<body>
		<h1>Challenge Solution</h1>
		Enter an equation below, using only brackets, + or -<br />
		<form action="index.php" method="post">
			<input type="text" name="sub_equation" style="width: 400px;" value="<?php echo( $_POST[ "sub_equation" ] ); ?>" />
			<input type="submit" name="sub_button" value="Solve it!" />
		</form>
		<br />

<?php 	if( $_POST[ "sub_equation" ] ) {	?>
  			<b>The answer is:</b><br />
			<?php echo( $_POST[ "sub_equation" ] ); ?> = <b><?php echo( evaluate( $_POST[ "sub_equation" ] ) ); ?></b>
<?php	}	?>
  	</body>
</html>
