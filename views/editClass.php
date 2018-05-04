<!-- editClass -->
<h1>Edit Class</h1>
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
    <p> Current Grade: {{cGrade}}</p>
    <select ng-model="cGrade">
        <option value="" selected disabled hidden>Choose Grade</option>
        <option value="4.0">A+</option>
        <option value="4.0">A</option>
        <option value="3.7">A-</option>
        <option value="3.3">B+</option>
        <option value="3.0">B</option>
        <option value="2.7">B-</option>
        <option value="2.3">C+</option>
        <option value="2.0">C</option>
        <option value="1.7">C-</option>
        <option value="1.3">D+</option>
        <option value="1.0">D</option>
        <option value="0.7">D-</option>
        <option value="0.0">F</option>
      </select><br><br>
    <input type="submit" value="Save" ng-click="postData(Name, Semester, cYear, cCredits, cGrade)">
    <input type="button" value="Cancel" onclick="window.location.href='#/edit'"/>
    <input type="button" value="Delete" onclick="">
<h3>{{message}}</h3>

