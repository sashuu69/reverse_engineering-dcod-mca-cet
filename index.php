<?php 

$param = parse_ini_file('param.ini'); 
$connection = mysqli_connect('localhost',$param['entry1'],$param['entry2'],$param['entry4']);
if($connection === false) {
	return mysqli_connect_error(); 
}

$sql = "SELECT * FROM `customers` ORDER BY RAND() LIMIT 1";
$row = mysqli_fetch_assoc(mysqli_query($connection, $sql));
$name = $row["firstName"] . " " . $row["lastName"];
$address = $row["street"];
$id = $row["id"];

function encryptIt3($q) {
	$cryptKey  = '3D133EC84736F4A7ED7CE919D5468';
	$cryptKey  = encryptIt($cryptKey);
    $qEncoded  = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function encryptIt( $q ) {
    $cryptKey  = '1BA8B1925B3325BAB7E38ED4A1134';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = '1BA8B1925B3325BAB7E38ED4A1134';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function getPartA($connection, $id) {
$sql = "SELECT * FROM `fd` WHERE customerID = $id";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
	$count = 0;
    while($row = mysqli_fetch_assoc($result)) {
    	++$count;
        	echo "
								<article class=\"style". $count ."\">
									<span class=\"image\">
										<img src=\"images/pic0". $count .".jpg\" alt=\"\" />
									</span>
									<a href=\"\">
										<h2>₹ ". $row["amount"] ."</h2>
										<div class=\"content\">
											<p>Remarks: ". $row["remarks"] ." <br>Date: ". $row["date"] ."</p>
										</div>
									</a>
								</article>
	"; 
    }
} else {
    echo "0 results";
}
}

function getPartB($connection, $id) {
$sql = "SELECT * FROM `loan` WHERE customerID = $id";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
	$count = 0;
    while($row = mysqli_fetch_assoc($result)) {
    	++$count;
        	echo "
								<article class=\"style". $count ."\">
									<span class=\"image\">
										<img src=\"images/pic0". $count .".jpg\" alt=\"\" />
									</span>
									<a href=\"\">
										<h2>₹ ". decryptIt($row["amount"]) ."</h2>
										<div class=\"content\">
											<p>Remarks: ". decryptIt($row["remarks"]) ." <br>Date: ". $row["date"] ."</p>
										</div>
									</a>
								</article>
	"; 
    }
} else {
    echo "0 results";
}
}

function getPartC($connection, $id) {
$sql = "SELECT * FROM `ppf` WHERE xCvEEr437 = \"". encryptIt3($id) . "\"";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
	$count = 0;
    while($row = mysqli_fetch_assoc($result)) {
    	++$count;
        	echo "
								<article class=\"style". $count ."\">
									<span class=\"image\">
										<img src=\"images/pic0". $count .".jpg\" alt=\"\" />
									</span>
									<a href=\"\">
										<h2>₹ ". $row["bHgRUIzO"] ."</h2>
										<div class=\"content\">
											<p>Remarks: ". $row["zNjgrTTgD"] ." <br>Date: ". $row["zRfgurEEw"] ."</p>
										</div>
									</a>
								</article>
	"; 
    }
} else {
    echo "0 results";
}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Reverse Engineering v3 | DCOD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Reverse Engineering v3.0</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Instructions</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>INSTRUCTIONS</h2>
						<p>This is the Reverse Engineering v3.0 in DCOD 3.0 and the last version was a hit, and still uncracked. As versions increase, new methods of security are used. Don't worry, This is not tough as you think.</p>
						<p>Once you are set! Click the close button in the page.</p>
					</nav>


				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>Hey competent!</h1>
								<p>Imagine you <strong>hacked</strong> the bank website and got the <strong>PHP codes</strong> &amp; <strong>database</strong>. Below boxes having <strong>9 transactions</strong> and its <strong>remarks</strong> of a person named <br><strong><?php echo $name; ?></strong>, residing at <strong><?php echo $address; ?></strong> and are from somewhere in the code/database. Your task is to <strong><a href="#menu">follow the instructions</a></strong> given to you. </p>
							</header><hr>
								<h2>PART A</h2>
								<p style="margin-bottom: -50px; margin-top: -20px;">The below 3 tiles consist of transactions without encryption</p>
							<section class="tiles">
								<?php getPartA($connection, $id); ?>
							</section>
							<h2 style="padding-top:  50px;">PART B</h2>
								<p style="margin-bottom: -50px; margin-top: -20px;">The below 3 tiles consist of transactions with encryption and decryption</p>
							<section class="tiles">
								<?php getPartB($connection, $id); ?>
								</section>
									<h2 style="padding-top:  50px;">PART C</h2>
										<p style="margin-bottom: -50px; margin-top: -20px;">The below 3 tiles consist of transactions with encryption only</p>
									<section class="tiles">
										 <?php getPartC($connection, $id); ?>
									</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>CREDITS</h2>
								<h5>CREATED BY: SASHWAT K</h3>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="https://github.com/Sashuu6" target="_blank" class="icon style2 fa-git"><span class="label">GitHub</span></a></li>
									<li><a href="https://in.linkedin.com/in/sashwat-k-25b30a11b" target="_blank" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; 2018 <a href="#">DCOD 3.0</a>. All rights reserved</li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
<?php 
mysqli_close($connection);
?>