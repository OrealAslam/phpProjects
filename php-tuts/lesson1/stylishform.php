<!DOCTYPE html>
<html>
<head>
	<title>Form Style</title>
	<link rel="stylesheet" type="text/css" href="stylishform.css">
</head>
<body>
	

	<div class="wrapper">
		<form method="POST" action="newform.php">
			<h2>Create a new Account</h2>
			<label class="f_name" id="firstname">First_name:</label><br><br>
			<input type="text" name="First_name" placeholder="enter name" id="f-n"><br><br>
			<label class="sur_name" id="surname">Sur_name:</label><br><br>
			<input type="text" name="Sur_name" placeholder="enter surname" id="s-n"><br><br>
			<label class="e-mail" id="email">E-mail address:</label><br><br>
			<input type="text" name="Email address" placeholder="****@**.com" id="e-add"><br><br>
			<label class="password" id="pass">Password:</label><br><br>
			<input type="password" name="Password" placeholder="enter password" id="psw"><br><br>
			<label class="re-type password" id="repas">Re-type password:</label><br><br>
			<input type="password" name="re-psw" placeholder="confirm password" id="cpsw"><br><br>
			<label class="ph_no" id="phno">Ph_no:</label><br><br>
			<input type="text" name="Ph_no" placeholder="0**31234567*" id="phone"><br><br>
			<label class="birthday" id="bdy">Birthday:</label><br>
			<select class="month">  
				<option>Jan</option>
				<option>Feb</option>
				<option>Mar</option>
				<option>Apr</option>
				<option>May</option>
				<option>Jun</option>
				<option>Jul</option>
				<option>Aug</option>
				<option>Sep</option>
				<option>Oct</option>
				<option>Nov</option>
				<option>Dec</option>
				</select> &nbsp
				<select class="days">  
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
				</select>&nbsp
				<select class="year">
					<option>1960</option>
					<option>1961</option>
					<option>1962</option>
					<option>1963</option>
					<option>1964</option>
					<option>1965</option>
					<option>1966</option>
					<option>1967</option>
					<option>1968</option>
					<option>1969</option>
					<option>1970</option>
					<option>1971</option>
					<option>1972</option>
					<option>1973</option>
					<option>1974</option>
					<option>1975</option>
					<option>1976</option>
					<option>1977</option>
					<option>1978</option>
					<option>1979</option>
					<option>1980</option>
					<option>1981</option>
					<option>1982</option>
					<option>1983</option>
					<option>1984</option>
					<option>1985</option>
					<option>1986</option>
					<option>1987</option>
					<option>1988</option>
					<option>1989</option>
					<option>1990</option>
					<option>1991</option>
					<option>1992</option>
					<option>1993</option>
					<option>1994</option>
					<option>1995</option>
					<option>1996</option>
					<option>1997</option>
					<option>1998</option>
					<option>1999</option>
					<option>2000</option>
					<option>2001</option>
					<option>2002</option>
					<option>2003</option>
					<option>2004</option>
					<option>2005</option>
					<option>2006</option>
					<option>2007</option>
					<option>2008</option>
					<option>2009</option>
					<option>2010</option>
					<option>2011</option>
					<option>2012</option>
					<option>2013</option>
					<option>2014</option>
					<option>2015</option>
					<option>2016</option>
					<option>2017</option>
					<option>2018</option>
					<option>2019</option>
					<option>2020</option>
				</select><br><br>
			<label class="gender" id="gndr">Gender/Status:</label><br><br>
			<div class="radiobutton">
				<input type="radio" name="Gender"class="male">Male<br>
			<input type="radio" name="Gender"class="female">Female<br>
			<input type="radio" name="Gender"class="Others">Others<br>
			<br><br>
			<input type="submit" name="submit">
			</div>
			
		   	<!--<label class="descrip">Description:</label><br><br>
			<textarea rows="14" cols="60"></textarea>-->

		</form>

	</div>


	<div class="box-1">
		<div id="profile">
				
	</div>
		<h2>Form-2</h2>
		<form>
			<label class="name" id="col-1">Name:</label>
			<input type="text" name="name" placeholder="enter a name" id="name">

			<label class="name" id="col-2">Father's-name:</label>
			<input type="text" name="fname" id="f-name" placeholder="enter surname"><br><br>

			<label class="name" id="col-3" >Email:</label>
			<input type="text" name="mail" id="email-2" placeholder="a**@**.com">


			<label class="name" id="col-4">Phone number:</label> <input type="text"
			name="phone" id="cell" placeholder="030**12156783"> <br><br>

			<label class="name" id="col-5">Password:</label>
			<input type="password" name="key" id="security" placeholder="Password">


			<label class="name" id="col-6">Confirm pass..:</label>
			<input type="password" name="name" id="security-1" placeholder="confirm password">


		</form>

	</div>

</body>
</html>