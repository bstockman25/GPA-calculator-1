<<<<<<< HEAD


// Its a crappy website - but the code looks like a good starting place
// http://www.csgnetwork.com/directautoyear.html 

var time = new Date();
var year = time.getYear();
if (year < 1900) {
year = year + 1900;
}
var date = year - 101; /*change the '101' to the number of years in the past you want to show */
var future = year + 100; /*change the '100' to the number of years in the future you want to show */ 
document.writeln ("<FORM><SELECT><OPTION value=\"\">Year");
do {
date++;
document.write ("<OPTION value=\"" +date+"\">" +date+ "");
}
while (date < future)
document.write ("</SELECT></FORM>");
=======


// Its a crappy website - but the code looks like a good starting place
// http://www.csgnetwork.com/directautoyear.html 

var time = new Date();
var year = time.getYear();
if (year < 1900) {
year = year + 1900;
}
var date = year - 101; /*change the '101' to the number of years in the past you want to show */
var future = year + 100; /*change the '100' to the number of years in the future you want to show */ 
document.writeln ("<FORM><SELECT><OPTION value=\"\">Year");
do {
date++;
document.write ("<OPTION value=\"" +date+"\">" +date+ "");
}
while (date < future)
document.write ("</SELECT></FORM>");
>>>>>>> 3144717b04e50c43ba2f6fd30cf958486f9eba1b
