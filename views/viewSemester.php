<!-- viewSemester -->
<h1>Semester *year from DB</h1>
<table class="tableFormat" id="semesterTable">
  <tr>
    <th>Class</th>
    <th>Grade</th>
    <th>Grade</th>
  </tr>
  <tr>
    <td id=viewSemester ><a href= #/editClass>Class Name from DB</a></td>
    <td>
      <select>
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
      </select>
    </td>
    <td>grade % from the DB</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><a id="GPAestimate" class="tRight">%</a></td>
  </tr>
</table>
<input type="button" value="Update DB" onclick=""/>
<input type="button" value="New Class" onclick="window.location.href='#/new'"/>
<input type="button" value="Back" onclick="window.location.href='#/edit'"/>
<h3>{{message}}</h3>
