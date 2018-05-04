<!-- edit -->
<h1>Edit</h1>
<table class="tableFormat" id="gpaTable">
  <tr>
    <th>Semester</th>
    <th>Class</th>
    <th class="percent">GPA</th>
  </tr>
  <tr>
  	<td id=editGPA><a href= #/editGPA>Starting GPA:</a></td>
    <td></td>
  	<td class="percent">%</td>
  </tr>
  <tr ng-repeat="x in semesters">
  	<td id=viewSemester ><button ng-click="set(x.name, x.semester, x.year, x.credits, x.grade, '/editClass')">Edit</button>
        {{x.semester + ' ' + x.year + ':'}}</td> 
    <td>{{x.name + ' - ' + x.credits + ' credits'}}</td>
  	<td class="percent">{{x.grade}}</td>
  </tr>
  <tr>
  	<td>Cumulative GPA</td>
    <td></td>
  	<td class="percent">%</td>
  </tr>
</table>
<table>
<h3>{{message}}</h3>
