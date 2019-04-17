function startTime() {
  var d = new Date(); 
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  
  document.getElementById('time').innerText =
  d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear()+" ,  "+
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  
  return i;
}