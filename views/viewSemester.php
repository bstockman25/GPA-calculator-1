<!-- viewSemester -->
<h1>Semester *year from DB</h1>
<table>
  <tr>
    <th><a href= #/editClass>Class Name from DB</a></th>
    <th>
      <select>
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
    </th>
    <th>grade % from the DB</th>
  </tr>
</table>
<table>
  <tr>
    <th>GPA</a></th>
    <th>
      <textarea rows="1" cols="5" name="GPAestimate" id="GPAestimate"></textarea>
    </th>
  </tr>
</table>
<input type="button" value="Update DB" onclick=""/>
<input type="button" value="New Class" onclick="window.location.href='#/new'"/>
<input type="button" value="Back" onclick="window.location.href='#/edit'"/>
<h3>{{message}}</h3>
