	<!DOCTYPE html>
	<html>
	<head>
		<title>RS7 Traders</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Montserrat:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Montserrat:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;1,300&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
	</head>
	<style type="text/css">
		*{margin: 0;
			padding: 0;
		}
			#wrapper{
				position: relative;
				margin: 0px;
				padding: 0px;
			}
			#logo-nav{
				position: absolute;
				background-color: #ffffff;
				width: 1510px;
				height: 140px;
				
			}
			#logo-nav #logo{
				width: 230px;
				height: 140px;
				position: absolute;
			}

			#logo-nav #logo img{
				width: 230px;
				height: 140px;
			}

			#logo-nav #nav-bar{
				position: absolute; 
				left: 235px;
				width: 1283px;
				height: 140px;
			}

			#logo-nav #nav-bar ul{
				display: block;
				list-style: none;
				margin-left: 420px;

			}	

			#logo-nav #nav-bar ul li{
				float: left;
				letter-spacing: 2px;
				margin-left: 50px;
				line-height: 100px;
			}

			#logo-nav #nav-bar li a{
				font-family: 'Roboto', sans-serif;
				text-decoration: none;
				cursor: pointer;
				margin-left: 15px;
				line-height: 140px;
				font-size: 22px;

			}

			#logo-nav #nav-bar li a:hover{
				color: #ff1a1a;
				border-bottom: 2px solid red;
			}
			
			#banner-area{
				width: 1510px;
				height: 770px;
				border: 1px solid black;
				position: absolute;
				top: 140px;
				background-size: 100%;
				background-attachment: fixed;
				animation-name: change-img;
				animation-duration: 6s;
				animation-timing-function: linear;
				animation-iteration-count: infinite;
				animation-direction: alternate;
				animation-delay: 0s;
				
			}
			@keyframes change-img{
				0%{background-image: url('https://image.shutterstock.com/image-vector/market-trade-binary-option-trading-600w-583229809.jpg'); background-size: cover; background-origin: border-box;}
				40%{background-image: url('https://image.shutterstock.com/image-vector/market-trade-binary-option-trading-600w-1108312100.jpg'); background-size: cover; background-origin: border-box;}
				60%{background-origin: border-box; background-size: cover; background-image: url('https://image.shutterstock.com/image-illustration/binary-option-background-put-call-600w-491700283.jpg');}
				100%{background-origin: border-box; background-attachment: fixed; background-image: url('https://image.shutterstock.com/image-photo/young-businesswoman-sitting-table-taking-600w-683449738.jpg');}	
			}

			#banner-area h1{
				text-transform: uppercase;
				color: #ffffff;
				text-align: center;
				margin-top: 250px;
				font-size: 48px;
				font-family: 'Roboto', sans-serif;
			}
			#banner-area p{
				text-align: center;
				color: #ffffff;
				font-size: 28px;
				margin-top: 50px;
			}
			#banner-area button{
				height: 50px;
				width: 150px;
				padding: 10px;
				margin-left: 710px;
				margin-top: 70px;
				background-color: #ffffff;
				outline: none;
				letter-spacing: 1px;
				border: none;
				cursor: pointer;
				font-size: 16px;
				background-color: #ff0000;
				color: #ffffff;
			}
			#banner-area button:hover{
				background-color: #ffffff;
				color: #000000;
				font-size: 16px;
				

			}

			#wrapper #gallery{
				position: absolute;
				width: 1510px;
				height: 1200px;
				background-color:#005580;
				margin-top: 910px;
			}

			#gallery h1{
				color: #ffffff;
				margin-top: 170px;
				text-align: center;
				font-family: 'Roboto', sans-serif;


			}
			#gallery p{
				text-align: center;
				color: #ffffff;
				font-size: 22px;
				font-family: 'Roboto', sans-serif;
				margin-top: 50px;
			}
			#gallery .img-1 , #gallery .img-2{
				float: left;
				outline: 10px solid #fff;
				width: 400px;
				height: 320px;
				margin-left: 300px;
				margin-top: 100px;
			}

			#gallery .img-1 img{
				width: 400px;
				height: 320px;
			}
			#gallery .img-2{
				margin-top: 300px;
				margin-left: 150px;
			}

			#gallery .img-2 img{
				width: 400px;
				height: 320px;
			}

			#gallery .img-1 h3{
				text-transform: uppercase;
				color: #ffffff;
				font-family: 'Baloo Tamma 2', cursive;
				margin-top: 30px;
				font-size: 26px;
				letter-spacing: 1px;
				word-spacing: 2px;
				margin-left: 30px;
			}
			#gallery .img-1 p{
				color: #ffffff;
				font-family: 'Baloo Tamma 2', cursive;
				margin-top: 20px;
				letter-spacing: 1px;
				word-spacing: 2px;
				font-size: 22px;
				text-align: center;
			}
			#gallery .img-2 h3{
				text-transform: uppercase;
				color: #ffffff;
				font-family: 'Baloo Tamma 2', cursive;
				margin-top: 30px;
				font-size: 26px;
				letter-spacing: 1px;
				word-spacing: 2px;
				margin-left: 30px;
			}
			#gallery .img-2 p{
				color: #ffffff;
				font-family: 'Baloo Tamma 2', cursive;
				margin-top: 20px;
				letter-spacing: 1px;
				word-spacing: 2px;
				font-size: 22px;
				text-align: center;
			}

		#wrapper #about-section{
			width: 1510px;
			height: 800px;
			position: absolute;
			margin-top: 2110px;
			background-color: #ffffff;
		}
		#about-section #biography{
			width: 1300px;
			height: 620px;
			border: 2px solid black;
			position: absolute;
			margin-top: 120px;
			margin-left: 100px;
			background-color: #f2f2f2;

	;
		}

		#about-section #biography img{
			width: 600px;
			height: 100%;
			opacity: 0.7;
			float: left;
		}

		#about-section #biography h1{
			text-align: center;
			margin-top: 100px;
			font-family: 'Roboto', sans-serif;
			color:  #000d33;
		}
		#about-section #biography h4{
			
			margin-top: 10px;
			margin-left: 760px;
			font-family: 'Roboto', sans-serif;
			font-size: 22px;
			color:  #000d33;
		}
		#about-section #biography p{
			
			margin-top: 10px;
			text-align: justify;
			letter-spacing: 1px;
			word-spacing: 2px;
			margin-left: 650px;
			margin-right: 20px;
			font-family: 'Roboto', sans-serif;
			line-height: 40px;
			font-size: 22px;
			color:  #000d33;
		}
		#wrapper #user-panel{
			width: 1510px;
			height: 500px;
			position: absolute;
			margin-top: 2912px;
		}
		#user-panel h1{
			text-transform: uppercase;
			font-family: 'Roboto', sans-serif;
			letter-spacing: 1px;
			text-align: center;
			margin-left: 150px;
			margin-top: 70px;
			
			animation-name: form-heading;
			animation-direction: alternate;
			animation-duration: 1s;	
			animation-iteration-count: infinite;
		}
		@keyframes form-heading{
			0%{color: #0000cc; text-shadow: 2px 2px 5px red;}
			100%{ color: #0000cc text-shadow: 2px 2px 5px #f00;}
		}
		
		#user-panel .name{
			position: absolute;
			width: 350px;
			height: 35px;
			margin-top: 30px;
			font-family: 'Roboto', sans-serif;
			padding-left: 10px;
			font-size: 14px;
			margin-left: 460px;
			
		}
		#user-panel .mail{
			position: absolute;
			width: 350px;
			height: 35px;
			padding-left: 10px;
			margin-top: 30px;
			font-family: 'Roboto', sans-serif;
			margin-left: 835px;
			font-size: 14px;
		}
		#user-panel .subject{
			position: absolute;
			width: 725px;
			height: 35px;
			padding-left: 10px;
			margin-top: 80px;
			font-family: 'Roboto', sans-serif;
			margin-left: 460px;
			font-size: 14px;
		}

		#user-panel .msg{
			position: absolute;
			width: 723px;
			height: 110px;
			padding: 10px;
			margin-top: 130px;
			padding-top: 0px;
			line-height: -10px;
			margin-left: 460px;
		}
		#user-panel .btn{
			position: absolute;
			width:740px;
			padding: 10px;
			margin-top: 280px;
			margin-left: 460px;
			background-color: #000000;
			cursor: pointer;
			border: none;
			color: #ffffff;
			font-size: 18px;
		}
		#user-panel button.signin{
			position: absolute;
			top: 80px;
			left: 460px;
			width: 130px;
			border: none;
			font-size: 22px;
			padding: 5px 0px;
			

		}
		#user-panel .signin:hover{
			outline: none;
			cursor: pointer;
			outline: 2px solid #0000b3;
		}
		#user-panel .signin a{
			margin-bottom: 2px solid #0000b3;
			text-decoration: none;
			font-family: 'Roboto', sans-serif;
			color: black;
			letter-spacing: 1px;

		}
		#user-panel .register{
			position: absolute;
			top: 80px;
			left: 1070px;
			width: 200px;
			height: 40px;
			letter-spacing: 1px;
			border: none;
			font-size: 22px;
			padding: 5px 5px;
		}
		#user-panel .register a{
			color: black;
			text-decoration: none;
			font-size: 22px;
			font-family: 'Roboto', sans-serif;

		}
		#user-panel .register:hover{
			outline: 2px solid #0000b3;
		}

		#wrapper #risk-control{
			position: absolute;
			width: 1510px;
			height: 900px;
			margin-top: 3416px;
		}
		#risk-control #risk{
			width: 1090px;
			position: absolute;
			margin-left: 200px;
			margin-top: 120px;
			height: 540px;
			border: 2px solid black;
			background-color: #005580;
		}
		#risk-control #risk img{
			width: 540px;
			height: 100%;
			float: left;
		}
		#risk-control #risk h1{
			position: absolute;
			margin-left: 640px;
			text-align: center;
			font-family: 'Baloo Tamma 2', cursive;
			margin-top: 30px;
			color: #ffffff;
		}
		#risk-control #risk h4{
			position: absolute;
			text-align: center;
			font-family: 'Baloo Tamma 2', cursive;
			margin-top: 110px;
			margin-left: 640px;
			color: #ffffff;
		}
		#risk-control #risk p{
			position: absolute;
			text-align: justify;
			margin-right: 20px;
			font-family: 'Baloo Tamma 2', cursive;
			margin-top: 160px;
			letter-spacing: 2px;
			word-spacing: 1px;
			margin-left: 640px;
			color: #ffffff;

		}
		#wrapper #contacts{
			width: 1510px;
			height: 306px;
			border: 1px solid black;
			position: absolute;
			margin-top: 4080px;
			background-color: #000000;
			outline: 10px solid #ffffff;

		}
		#contacts h2{
			text-align: center;
			font-family: 'Baloo Tamma 2', cursive;
			margin-top: 50px;
			color: #ffffff;
			font-size: 34px;
			
		}
		#contacts #font-awsome{
			float: left;
			margin-top: 50px;
			margin-left: 550px;
		}
		#contacts #font-awsome .link1{
			color: #0000ff;
			font-size: 28px;
			margin-left: 50px;
			cursor: pointer;
		}
		#contacts #font-awsome .link1:hover{
			border-bottom: 1px solid white;
			font-size: 30px;
			color: white;
		}
		#contacts #font-awsome .link2{
			color: #0099ff;
			font-size: 28px;
			margin-left: 50px;
			cursor: pointer;
		}
		#contacts #font-awsome .link2:hover{
			color: #ffffff;
			border-bottom: 1px solid white;
			font-size: 30px;
		}
		#contacts #font-awsome .link3{
			color: #e60000;
			font-size: 28px;
			margin-left: 50px;
			cursor: pointer;
		}
		#contacts #font-awsome .link3:hover{
			color: #ffffff;
			border-bottom: 1px solid white;
			font-size: 30px;
		}
		#contacts #font-awsome .link4{
			color: #e60000;
			font-size: 28px;
			margin-left: 50px;
			cursor: pointer;
		}
		#contacts #font-awsome .link4:hover{
			color: #ffffff;
			border-bottom: 1px solid white;
			font-size: 30px;
		}
		#contacts #font-awsome .link5{
			color: #ffffff;
			font-size: 28px;
			margin-left: 50px;
			cursor: pointer;
		}
		#contacts #font-awsome .link5:hover{
			color: #ffffff;
			border-bottom: 1px solid white;
			font-size: 30px;
		}
		
	</style>
	<body>
	<div id="wrapper">

		<div id="logo-nav">	
			<div id="logo">
				<img src="logo.jpeg" alt="logo">
			</div>

			<div id="nav-bar">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Bio</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Risk Disclosure</a></li>				
				</ul>
			</div>
		</div>
		<!-- Navigation ends here-->

		<div id="banner-area">
			<h1>RS 7 TRADERS</h1>
			<p>The Binary Experts</p>
			<button>Learn More</button>
		</div>	

		<!-- Banner ends here-->

		<div id="gallery">
			<h1>WHAT I OFFER</h1>
			<p>Invest in Your Future</p>
			<div class="img-1">
				<img src="https://lh3.googleusercontent.com/proxy/tO-fsIIYuTcUPNBxq7K1rWqSyS0dOr_nd_NPivZATo2z6OdKOMzcm6UsSizZmUxSIsX3mmaJQ-8rdZKFFjrsET2VkgdtuLfMn3TJ320plNt5nceLt0qKVsnEHCH3aSYSsFF1IznTcc1uBEhSA2BWFxt5W_TN0wGQxzLcppTYJcY" alt="graphs">
				<h3>stock market analysis</h3>
				<p>Maximize Your Financial Plan</p>

			</div>

			<div class="img-2">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTzSbNFN8S7Vc-nYERtAEwWwviz-OoaPEcmMA&usqp=CAU" alt="investment advising">
				<h3>investment advising</h3>
				<p>Trade Confidently</p>
			</div>		
		</div>
		<!-- Gallery ends here-->

		<div id="about-section">
			<div id="biography">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRBvUWfttnFms1bOwNHRq-VhZsEyQFRfZpDYg&usqp=CAU">
				<h1>ABOUT RS 7 TRADERS</h1>
				<h4>The Ultimate Trading Experience</h4>
				<p>As a seasoned Binary Trader, I’ve advised clients on their investment and stock trading decisions and financial options. Both my certifications and years of experience have helped me understand that every client has unique goals, allowing me to advise and adjust their strategies accordingly. I’m proud of the financial security and trading success I’ve helped so many clients establish. Let me help you achieve financial success as well.</p>
			</div>
		</div>
		<!--About section ends here-->

		<div id="user-panel">
			
				<h1>Get in Touch</h1>
					<form method="POST" action="<?php $_SERVER['SELF_PHP']; ?>">
						<input type="text" name="fname" placeholder="Name *" class="name">
						<input type="email" name="email" placeholder="Email *" class="mail">
						<input type="text" name="subject" placeholder="Subject *" class="subject">
						<input type="textarea" name="message" placeholder="Message *" class="msg">
						<input type="submit" name="send" value="Send" class="btn">
					</form>	
					<button class="signin"><a href="traders_login.php">Login</a></button>	<!-- styling 352-->
					<button class="register"><a href="register.php">Register Yourself</a></button>
		</div>
		<!-- Form ends here-->

		<div id="risk-control">
			<div id="risk">
				<img src="https://www.dfinsolutions.com/sites/default/files/styles/card_1x/public/images/2018-10/esg-hero.jpg?itok=v77xh33f" alt="risk overcome">
				<h1>RISK DISCLOSURE</h1>
				<h4>For Your Information</h4>
				<p>Services include products that are traded on margin and carry a risk of losses. The products may not be suitable for all investors. Please ensure that you fully understand the risks involved.</p>
			</div>
		</div>
		<!-- Risk control ends here-->

		<div id="contacts">
			<h2>Contact Us</h2>
			<div id="font-awsome">
				<span class="link1"><i class="fa fa-facebook" aria-hidden="true"></i></span>
				<span class="link2"><i class="fa fa-twitter" aria-hidden="true"></i></span>
				<span class="link3"><i class="fa fa-instagram" aria-hidden="true"></i></span>
				<span class="link4"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
				<span class="link5"><i class="fa fa-search" aria-hidden="true"></i></span>
			</div>		
		</div>
		
	</div>


	</body>
	</html>