<!-- edit -->
<h1>Edit</h1>
<table class="tableFormat">
  <tr>
    <th>Semester</th>
    <th class="percent">GPA</th>
  </tr>
  <tr>
  	<td id=editGPA><a href= #/editGPA>Starting GPA:</a></td>
  	<td class="percent">%</td>
  </tr>
  <tr ng-repeat="x in semesters">
  	<td id=viewSemester ><a href= #/viewSemester>{{x.semester + ' ' + x.year + ':'}}</a></td>
  	<td class="percent">{{x.grade}}</td>
  </tr>
  <tr>
  	<td>Cumulative GPA</td>
  	<td class="percent">%</td>
  </tr>
</table>
<table>
<h3>{{message}}</h3>
