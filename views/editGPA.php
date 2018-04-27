<!-- editGPA -->
<h1>Edit GPA</h1>
<form action="/action_page.php">
	Credits Taken: <input type="text" name="cTaken"><br>
	Grade Points Earned: <input type="text" name="pointsEarned"><br>
	<input type="submit" value="Submit" onclick=>
	<input type="button" value="cancel" onclick="window.location.href='#/edit'"/>
</form>
<h3>{{message}}</h3>