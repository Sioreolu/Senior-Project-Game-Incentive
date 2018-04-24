<!DOCTYPE html>
<?php
session_start();
$_SESSION['logged']="0";
?>
<html lang="en" >	
	<head>
		<meta charset="UTF-8">
		<title>2048 game</title>
		<link rel="stylesheet" href="css/style.css">
    <!--JS Scripts-->
    <script src="js/hammerjs.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
    <script src="js/gen_validatorv4.js" type="text/javascript"></script>
	</head>
	<body>	
		<div class="container">
		  <?php 
			  if($_SESSION['logged']=="1")
				{ 
				  echo $_SESSION["username"];
				  echo '<a href="logout.php"><span>Logout</span></a>';
				}
			  else
				{
					echo'
					<button class = "SignUpbutton" id="BtnSignup" onclick="document.getElementById(frmSignUp).style.display="block"; disableinput()" style="width:auto;">Sign up</button>
					<button class = "LogInbutton" id="BtnLogIn" onclick="document.getElementById(frmLogIn).style.display="block"; disableinput()" style="width:auto;">Log In</button>
					';
				};
		  ?>
					
			<div> <!-- Top Text -->
				<div class="heading">
					<h1 class="title">2048</h1>
					<div class="score-container">0</div>
				</div>
				<p class="game-intro">Join the numbers and get to the 
					<strong>2048 tile!</strong>
				</p>
				<button class="HighScorebutton" onclick="document.getElementById('frmHS').style.display='block'" style="width:auto;">High Score Board</button>
			</div>
			
			<!-- The Game -->
			<div class="game-container">
				<div class="game-message">
					<p></p>
					<div class="lower">
						<a class="retry-button">Try again</a>
					</div>
				</div>
				<div class="grid-container">
					<div class="grid-row">
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
					</div>
					<div class="grid-row">
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
					</div>
					<div class="grid-row">
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
					</div>
					<div class="grid-row">
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
						<div class="grid-cell"></div>
					</div>
				</div>
				<div class="tile-container"></div>
			</div>
			
			<!-- Bottom Text -->
			<div>
				<p class="game-explanation">
					<strong class="important">How to play:</strong> Use your 
					<strong>arrow keys</strong> to move the tiles. When two tiles with the same number touch, they 
					<strong>merge into one!</strong>
				</p>
			</div>
			
			<!--Sign Up Form-->
			<div id="frmSignUp" class="modal">
				<span onclick="document.getElementById('frmSignUp').style.display='none'; enableinput()" class="close" title="Close Modal">&times;</span>
				<form name ="frmSignUp" id="frmSignUp" class="modal-content" action="php/register.php" method="post">
					<div class="container">
						<h1>Sign Up</h1>
						<p>Please fill in this form to create an account.</p>
						<hr>
						<label for="fname"><b>First Name</b></label>
							<input type="text" placeholder="First Name:" name="fname" maxlength="30" required>
						<label for="lname"><b>Last Name</b></label>
							<input type="text" placeholder="Last Name:" name="lname" maxlength="30" required>
						<label for="email"><b>Email</b></label>
							<input type="email" placeholder="Enter Email" name="email" maxlength="255" required>
						<label for="usr"><b>Username</b></label>
							<input type="text" placeholder="Username:" name="usr" maxlength="30" required>
						<label for="psw"><b>Password</b></label>
							<input type="password" placeholder="Password:" name="psw" maxlength="50" required>
						<label for="psw-repeat"><b>Repeat Password</b></label>
							<input type="password" placeholder="Repeat Password:" name="psw-repeat" maxlength="50" required>
						<label>
							<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
						</label>
						<div class="clearfix">
							<button type="button" onclick="document.getElementById('frmSignUp').style.display='none'; enableinput()" class="cancelbtn">Cancel</button>
							
							<button type="submit" class="signupbtn" onclick="return BothFieldsIdenticalCaseSensitive()" value="Click Me">Sign Up</button>
						</div>
					</div>
                </form>
            </div>
			
			<!--Log In Form-->
			<div id="frmLogIn" class="modal">
				<span onclick="document.getElementById('frmLogIn').style.display='none'; enableinput()" class="close" title="Close Modal">&times;</span>
				<form name ="frmLogIn" id="frmLogIn" class="modal-content" action="php/login.php" method="post">
				    <div class="container">
				        <h1>Log in</h1>
						<hr>
                            <label for="usr">
                                <b>Username</b>
                            </label>
							     <input type="text" placeholder="Username:" name="usr" maxlength="30" required>
                        
                            <label for="psw">
                                <b>Password</b>
                            </label>
							     <input type="password" placeholder="Password:" name="psw" maxlength="50" required>
							<div class="clearfix">
							<button type="button" onclick="document.getElementById('frmSignUp').style.display='none'; enableinput()" class="cancelbtn">Cancel</button>
							
							<button type="submit" class="signupbtn" onclick="return BothFieldsIdenticalCaseSensitive()" value="Click Me">Sign Up</button>
							</div>
					</div>
				</form>
            </div>
			
			<!--High Score Container-->
			<div id="frmHS" class="modal">
				<span onclick="document.getElementById('frmHS').style.display='none'; enableinput()" class="close" title="Close Modal">&times;</span>
				<form name ="frmHS" id="frmHS" class="modal-content" action="" method="post">
				    <div class="container">
				        <h1>Log in</h1>
						<hr>
                            <label for="usr">
                                <b>Username</b>
                            </label>
							     <input type="text" placeholder="Username:" name="usr" maxlength="30" required>
                        
                            <label for="psw">
                                <b>Password</b>
                            </label>
							     <input type="password" placeholder="Password:" name="psw" maxlength="50" required>
							<div class="clearfix">
							<button type="button" onclick="document.getElementById('frmSignUp').style.display='none'; enableinput()" class="cancelbtn">Cancel</button>
							
							<button type="submit" class="signupbtn" onclick="return BothFieldsIdenticalCaseSensitive()" value="Click Me">Sign Up</button>
							</div>
					</div>
				</form>
            </div>
        </div>
	</body>
</html>
