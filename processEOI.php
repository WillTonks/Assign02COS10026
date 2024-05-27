<?PHP	
require_once("settings.php");
$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
$sql_table="eoi";
$status = "NEW";

$queryTest = "select reference_number FROM eoi"; //test table

if(mysqli_query($conn,$queryTest)) //test to see if table exists
{
	echo "<p class=\"ok\">Table exists</p>";
}
else //if not, create table
{
	$sqlTable = "CREATE TABLE eoi
	(
		reference_number INT NOT NULL PRIMARY KEY,
		status VARCHAR(40),
		first_name VARCHAR(40),
		family_name VARCHAR(40),
		date_of_birth VARCHAR(40),
		gender VARCHAR(40),
		address VARCHAR(40),
		suburb VARCHAR(40),
		state VARCHAR(40),
		postcode INT,
		email VARCHAR(40),
		phone VARCHAR(40), 
		skill_java VARCHAR(25), 
		skill_css VARCHAR(25),
		skill_html VARCHAR(25),
		skill_ruby VARCHAR(25),
		skill_teamwork VARCHAR(25),
		skill_communication VARCHAR(25),
		skill_other_skills VARCHAR(25),
		other_skill VARCHAR(255)
    )";
	
	if(mysqli_query($conn,$sqlTable))
	{
		echo "table created successfully";
	}
}

//trim and remove special characters from user data
$reference_number = trim($_POST["reference_number"]);
$first_name = trim($_POST["first_name"]);
$family_name = trim($_POST["family_name"]);
$date_of_birth = trim($_POST["date_of_birth"]);
$gender = trim($_POST["gender"]);
$address = trim($_POST["address"]);
$suburb = trim($_POST["suburb"]);
$state = trim($_POST["state"]);
$postcode = trim($_POST["postcode"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);//cant trim phone because 0411 111 111 -> spaces get removed and results in 111
$other_skill = trim($_POST["other_skill"]);

$reference_number = htmlspecialchars($_POST["reference_number"]);
$first_name = htmlspecialchars($_POST["first_name"]);
$family_name = htmlspecialchars($_POST["family_name"]);
$date_of_birth = htmlspecialchars($_POST["date_of_birth"]);
$gender = htmlspecialchars($_POST["gender"]);
$address = htmlspecialchars($_POST["address"]);
$suburb = htmlspecialchars($_POST["suburb"]);
$state = htmlspecialchars($_POST["state"]);
$postcode = htmlspecialchars($_POST["postcode"]);
$email = htmlspecialchars($_POST["email"]);
$phone = htmlspecialchars($_POST["phone"]);
$other_skill = htmlspecialchars($_POST["other_skill"]);

$skill_java = ($_POST["skill_java"]);
$skill_css = ($_POST["skill_css"]);
$skill_html = ($_POST["skill_html"]);
$skill_ruby = ($_POST["skill_ruby"]);
$skill_teamwork = ($_POST["skill_teamwork"]);
$skill_communication = ($_POST["skill_communication"]);
$skill_other_skills = ($_POST["skill_other_skills"]);

//check if form is filled out, if not don't submit to database
if(empty($reference_number))
{
	echo "<p>Reference number not entered</p>";
	exit();
}
if(empty($first_name))
{
	echo "<p>First name not entered</p>";
	exit();
}
if(empty($family_name))
{
	echo "<p>Family name not entered</p>";
	exit();
}
if(empty($date_of_birth))
{
	echo "<p>DoB not entered</p>";
	exit();
}
if(empty($gender))
{
	echo "<p>Gender not entered</p>";
	exit();
}
if(empty($address))
{
	echo "<p>Address not entered</p>";
	exit();
}
if(empty($suburb))
{
	echo "<p>Suburb not entered</p>";
	exit();
}
if(empty($postcode))
{
	echo "<p>Postcode not entered</p>";
	exit();
}
if(empty($email))
{
	echo "<p>Email not entered</p>";
	exit();
}
if(empty($phone))
{
	echo "<p>Phone number not entered</p>";
	exit();
}
//skills
if(empty($skill_java))
{
	$skill_java = "N/A";
}
if(empty($skill_css))
{
	$skill_css = "N/A";
}
if(empty($skill_html))
{
	$skill_html = "N/A";
}
if(empty($skill_ruby))
{
	$skill_ruby = "N/A";
}
if(empty($skill_teamwork))
{
	$skill_teamwork = "N/A";
}
if(empty($skill_communication))
{
	$skill_communication = "N/A";
}
if(empty($skill_other_skills))
{
	$skill_other_skills = "N/A";
}


//get retrieved data and insert it into the database (eoi)
$query = "insert into $sql_table (reference_number, status, first_name, family_name, date_of_birth, gender, address, suburb, state, postcode, email, phone, 
skill_java, skill_css, skill_html, skill_ruby, skill_teamwork, skill_communication, skill_other_skills, other_skill)
 values ('$reference_number', '$status', '$first_name', '$family_name', '$date_of_birth', '$gender', '$address', '$suburb', '$state', 
 '$postcode', '$email', '$phone', '$skill_java', '$skill_css', '$skill_html', '$skill_ruby', '$skill_teamwork', '$skill_communication', '$skill_other_skills', '$other_skill')";

$result = mysqli_query($conn, $query);
//error
@mysqli_error();

if(!$result)
{
	echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
}
else
{
	echo "<p class=\"ok\">The application form has successfully been submitted.</p>";
	echo "Here is your unqiue EOI number: ";
	
}
mysqli_close($conn);
?>