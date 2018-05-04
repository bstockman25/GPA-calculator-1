<!-- editGPA -->
<h1>Edit GPA</h1>
	Credits Taken: <input type="text" ng-model="cTaken"><br>
	Grade Points Earned: <input type="text" ng-model="pointsEarned"><br>
	<input type="submit" value="Submit" ng-click="postData(cTaken, pointsEarned)">
	<input type="button" value="cancel" onclick="window.location.href='#/edit'"/>
<h3>{{message}}</h3>