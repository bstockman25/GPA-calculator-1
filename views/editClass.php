<!-- editClass -->
<h1>Edit Class</h1>
<form action="/action_page.php">
<p>Class Name: <input type="text" name="cName"></p>
  <p>Semester: 
  <select name="Semester">
    <option value="Fall">Fall</option>
    <option value="Spring">Spring</option>
    <option value="Summer">Summer</option>
    <option value="Interim">Interim</option>
  </select></p>
  <p>Class Year: <input type="text" name="cYear"></p>
  <p>Credits: <input type="text" name="cCredits"></p>  
  <input type="submit" value="Submit" onclick=>
  <input type="button" value="Cancel" onclick="window.location.href='#/viewSemester'"/>
  <input type="button" value="Delete" onclick="">
</form>
<h3>{{message}}</h3>

