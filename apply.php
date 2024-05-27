<!DOCTYPE html>
<!--
filename: apply.html
author: Leonardo
created: 1/04/2024
last modified: 10/04/24
description: apply page using form.
Thursday 10:30 Workshop
Tutor: Kaibin Wang
-->
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Job Application Page"/>
	<meta name="keywords" 	 content="HTML, Form, CSS"/>
	<meta name="author" 	 content="Leo"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job application page</title>
	<link href= "styles/style.css" rel="stylesheet"/>
	 
	
</head>
<?php include 'header.inc';?>
<body>
<!--The main part of the form. the form is divided into sections which then contain the inputs.
    each input also has a title and a placeholder to help the user input the data, but this also guides them
    to know what is a valid input as most of the form has restricted inputs	-->
	<h1 id="apply_title">Job application page</h1>
	<form method="post" action="processEOI.php" novalidate>
	<fieldset>
		<legend class="section_title">Applicant Name</legend> <!--first section-->
		<p><label for="reference_number"> Job reference number </label><br>
			<input type="text" name="reference_number" id="reference_number" maxlength="5" size="10" pattern=".{5}" title="Exactly 5 characters" placeholder="5 characters" required="required"/>
		</p>
		<p><label for="firstName"> Given name: </label><br>
			<input type="text" name="first_name" id="first_name" maxlength="20" size="20" pattern="^[a-zA-Z]+$" title="Enter given name" placeholder="Enter given name" required="required"/><br>
		    <label for="familyName">Family name: </label><br>
			<input type="text" name="family_name" id="family_name" maxlength="20" size="20" pattern="^[a-zA-Z]+$" title="Enter family name" placeholder="Enter family name" required="required"/>
		</p>
	</fieldset>
	<fieldset>
		<legend class="section_title">Applicant Details</legend> <!--second section-->
		<p><label for="date_of_birth"> Date of birth </label>
			<input type="text" name="date_of_birth" id="date_of_birth" size="8" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" title="Date of birth in a dd/mm/yyyy format" required="required"/>
		</p>
		<fieldset>
		<legend id="section_gender">Gender</legend> <!--radio input-->
		<p>
			<label for="male">Male</label>
			<input type="radio" id="male" name="gender" value="male" required="required"/>
			<label for="female">Female</label>
			<input type="radio" id="female" name="gender" value="female"/>
			<label for="other">Other</label>
			<input type="radio" id="other" name="gender" value="other"/>
		</p>
		</fieldset>
	</fieldset>
	<fieldset>
		<legend class="section_title">Address</legend> <!--third section-->
		<p><label for="address"> Street Address </label>
			<input type="text" name="address" id="address" maxlength="40" size="18" title="Enter the address of where you live" placeholder="00 StreetName Road" required="required"/>
		</p>
		<p><label for="suburb"> Suburb/town </label>
			<input type="text" name="suburb" id="suburb" maxlength="40" size="18" title="Enter the suburb or town of where you live" placeholder="Suburb/Town" required="required"/>
		</p>
		<p><label for="state">State</label>
			<select name="state" id="state" required="required">
				<option value="vic">VIC</option>
				<option value="nsw">NSW</option>
				<option value="qld">QLD</option>
				<option value="nt">NT</option>
				<option value="wa">WA</option>
				<option value="sa">SA</option>
				<option value="tas">TAS</option>
				<option value="act">ACT</option>
			</select>
		</p>
		<p><label for="postcode"> Postcode </label>
			<input type="text" name="postcode" id="postcode" maxlength="4" size="10" pattern="[0-9]{4}" title="Exactly 4 numbers" placeholder="0000" required="required"/>
		</p>
	</fieldset>
	<fieldset>
		<legend class="section_title">Contact</legend> <!--fourth section-->
		<p><label for="email"> Email address </label>
			<input type="emil" name="email" id="email" size="30" pattern="^.+@.+\..{2,3}$" title="Email address (name@domain.com)" placeholder="name@domain.com" required="required"/>
		</p>
		<p><label for="phone"> Phone number </label>
			<input type="text" name="phone" id="phone" maxlength="14" size="12" pattern="^[0-9]{8,12}+$"title="8 to 12 digits/spaces" placeholder="8-12 digits/spaces" required="required"/>
		</p>
	</fieldset>
	<fieldset>
		<legend class="section_title">Skills</legend> <!--fifth section, checkbox input-->
		<p>
			<label for="skill_java">Java</label>
			<input type="checkbox" name="skill_java" id="skill_java"/>
			<label for="skill_css">CSS</label>
			<input type="checkbox" name="skill_css" id="skill_css"/>
			<label for="skill_html">HTML</label>
			<input type="checkbox" name="skill_html" id="skill_html"/>
			<label for="skill_ruby">Ruby</label>
			<input type="checkbox" name="skill_ruby" id="skill_ruby"/><br>
			<label for="skill_teamwork">Team work</label>
			<input type="checkbox" name="skill_teamwork" id="skill_teamwork"/>
			<label for="skill_communication">Communication</label>
			<input type="checkbox" name="skill_communication" id="skill_communication"/>
			<label for="skill_other_skills">Other skills</label>
			<input type="checkbox" name="skill_other_skills" id="skill_other_skills" checked="true"/>
			
		</p>
		<p><label for="other_skill"> Other Skills </label><br>
			<textarea id="other_skill" name="other_skill" rows="8" cols="40" placeholder="Write your other skills here..."></textarea>
		</p>
	</fieldset>
	
	<input type="submit" value="Apply"/>
	<input type="reset" value="Reset Form"/>
</form>
</body>
<?php include 'footer.inc';?>


</html>