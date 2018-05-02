<!-- New -->
<h1>Add Class</h1>
<!--<form onsubmit="window.location.href='./views/edit.php';" novalidate> -->
    <p>Class Name: <input type="text" ng-model="cName"></p>
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
    <input type="button" value="Submit" ng-click="postData(cName, Semester, cYear, cCredits)">
    <input type="button" value="Cancel" onclick="window.location.href='#/edit'"/>
<!--</form>-->
<h3>{{message}}</h3>
<h3>{{statusval}}</h3>