<!-- editClass -->
<h1>Edit Class</h1>
<!--<form action="/action_page.php">-->
<p>Class Name: <input type="text" ng-model="Name"></p>
    <p>Semester: 
        <select ng-model="Semester">
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
        <option value="Summer">Summer</option>
        <option value="Interim">Interim</option>
        </select>
    </p>
    <p>Class Year: <input type="text" ng-model="cYear"></p>
    <p>Credits: <input type="text" ng-model="cCredits"></p>  
    <input type="submit" value="Submit" ng-click="postData(cName, Semester, cYear, cCredits)">
    <input type="button" value="Cancel" onclick="window.location.href='#/edit'"/>
    <input type="button" value="Delete" onclick="">
<!--</form>-->
<h3>{{message}}</h3>

