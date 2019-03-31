$(document).ready(function (e) {
$('#publish').on('click',function () {
var productId=$('#productId').val();
var userId=$('#userId').val();
var message=$('#message').val();
var msg=$('#msg');
var inputrate=$('#rate').text();
$.ajax({
url:'details.php',
dataType:'text',
method:'POST',
data:{
productId:productId,
userId:userId,
inputrate:inputrate,
message:message
},success:function (response) {
var result=$.parseJSON(response);
var string='';
if(result.length==0){
string += "<h3>No Comments To display</h3>";
}else {
$.each(result, function (key, value) {
string += "<li class='list-group-item'>"+ value['message'] + "</li>";
});
}
$('#comments').html(string);
}
});
});
$('#publish').on('click',function () {
var average=$('#average');
var productId=$('#productId').val();
$.ajax({
url:'averagerate.php',
dataType:'text',
method:'POST',
data:{
productId:productId,
},success:function (response) {
average.html(response);
}
});
});
var average=$('#average');
var productId=$('#productId').val();
average.load("averagerate.php?productId="+productId,function (response) {
average.html(response);
});
var com=$('#comments');
var productId=$('#productId').val();
com.load("comment.php?details="+productId,function (response) {
var result=$.parseJSON(response);
var string='';
if(result.length==0){
string += "<h3>No Comments To display</h3>";
}else {
$.each(result, function (key, value) {
string += "<li class='list-group-item'>"+ value['message'] + "</li>";
});
}
$('#comments').html(string);
});
});

