<!DOCTYPE html>
<html>

<?php 
function has_account(string $yo , string $fileName, int $numberOfLines){
$srteem=fopen($fileName,"a+");
for($i=0;$i<$numberOfLines;$i++){ 
$line=fgets($srteem);
if(explode(" ",$line)[1]==$yo){return $line;}
}return FALSE;}

function updateAccount(string $filename,string $playername, string $newAccount) {
    $w=file($filename,FILE_IGNORE_NEW_LINES);
    $neww=[];
 foreach ($w as $p) {
    if(explode(" ",$p)[1]==$playername){array_push($neww,$newAccount);}
    else{array_push($neww,$p);}
    file_put_contents($filename,implode("\n",$neww) . "\n");
 }
}


function evl(string $n){return (eval("return ". $n ." ;"));}//removes the qoates from a string

function n(string $o){//returns the first integer in a string * * * * * * * * * * * * * * * *
$exp=explode(" ",$o);
foreach ($exp as $_ => $__) {
if(filter_var($__,FILTER_VALIDATE_INT)){return eval("return ". $__ ." ;");}}
return false;}


function getline(string $fileName,int $lineNumber){//gets a line from a text file
  $stream=fopen($fileName,"a+");
  for ($i=0;$i<$lineNumber-1;$i++){
   fgets($stream);
  }
  $result= fgets($stream);
  fclose($stream);
  return $result;}

function isLitter($c){for($nn=0;$nn<63;$nn++){
if($c=="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_1234567890"[$nn])
{return TRUE;}}return FALSE; }
function validName($s){
for($kh=0;$kh<10;$kh++){if($s[0]=="0123456789"[$kh]){return FALSE;}}
for($n=0;$n<strlen($s);$n++){
if(!(isLitter($s[$n]))){return FALSE;}
}return TRUE;}

?>




<?php
sleep(1);
$msg="";
$score=count($_POST)?($_POST["score"]):0;
$playername=count($_POST)?("\"".$_POST["playername"]."\""):"\"\"";
  





if($_POST["playername"]!=""&&validName($_POST["playername"])){

 if(!($account=has_account($_POST["playername"],"temp.php",explode(" ",file_get_contents("no.php"))[2]+1)))
 {
 file_put_contents("temp.php",file_get_contents("temp.php") ."# " . $_POST["playername"] . " ".$_POST["score"]  ."\n");
 file_put_contents("no.php","<?php echo\"<html>\";/* ".n(file_get_contents("no.php"))+1  ." */?><body style=\"background-color:black;color:brown;\"><h1> Huh?");
 $GLOBALS["msg"]="Account created !";
 }
 else
 {
  if($_POST["task"]=="save")
  {
   // should modify the account on the dataBase
   $GLOBALS["msg"]="Progress Saved";
   updateAccount("temp.php",$_POST["playername"],"# " . $_POST["playername"] ." ". $_POST["score"]);
  }
  else
  {
   // get the data from the DataBase and give it to the user
   $GLOBALS["msg"]="<h3 style=\"color: #99ff00;\">Progress Loaded</h3>";
   $GLOBALS["playername"]="\"".explode(" ",$account)[1]."\"";
   $GLOBALS["score"]=explode(" ",$account)[2];
  }
 }
}
elseif(count($_POST)){$GLOBALS["msg"]= "<p style=\"color: red; font-size: larger;\">Player Name Not Valid</p>"; }
else{$GLOBALS["msg"]= "<p style=\"color: red; font-size: larger;\">Not logged in</p>";}
?>



<head><title>CLICK</title>
<style id="css">
</style>
</head>
<body style="background-color: rgb(48, 48, 48); color: ivory; ">
<button id="fo" style="width: 10%;border-style: groove;background-color: chartreuse;cursor: pointer;"> <?php echo (count($_POST)>=3)?"account":"log in" ?></button>
<center>
<br>    



<button id="b" value="BUTTON" style="display: block;width: 9%;">BUTTON </button>
<h1 id="s" style="color: beige;"><?php echo $score; ?></h1>

</center>
<?php echo $GLOBALS["msg"];?>
<pre>
<?php 


// print_r($_POST);

?></pre>
<center>
  <div id="place" >


  </div>
</center>

</body>
</html>




<script>
  var place_for_form =document.getElementById("place");
  var ___ =document.getElementById("fo");
var css=document.getElementById("css");
css.innerHTML="#b{height:"+Math.floor( window.innerHeight*(17/100))+  "px ;}";

var playername=<?php echo $playername; ?>;
var clicks=<?php echo $score; ?> ;

var b=document.getElementById("b");
var s=document.getElementById("s");
b.onclick=function(){clicks++;s.innerHTML=clicks;}

___.onclick=function(){
 place_for_form.innerHTML="<input type=\"textbox\" name=\"playername\"placeholder=\"Playername\" value=\""+playername+"\"><br><input type=\"hidden\" name = \"score\"  value=\""+clicks+"\" readonly id =\"scorebar\"> <br><button name=\"task\" value=\"save\" type=\"submit\">save</button><button name=\"task\" value=\"load\" type=\"submit\">load</button>";
 place_for_form.innerHTML="<form  method=\"post\" action=\""+<?php echo "\""."."."\"";?>+"\">"+place_for_form.innerHTML+"</form>";
}
document.addEventListener("keydown",event=>{if(event.key=="F12"){
event.preventDefault();
}})

document.addEventListener("keydown",event=>{if(event.ctrlKey&&event.shiftKey&&(event.key=="K")){
event.preventDefault();
}});

document.addEventListener('contextmenu', event=>{
event.preventDefault()
});

document.addEventListener("keydown",event=>{if(event.ctrlKey&&event.shiftKey&&(event.key=="I")){
event.preventDefault();
}})
</script>