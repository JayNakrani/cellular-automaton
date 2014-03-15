<?php
// database entries for analisys purposes.
if(!isset($_GET['test']))
{
	include_once('../ext/lib/DataAccess.php');
	$dbObject=new db_class();
	$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
	$userAgent=mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);
	$referer=mysql_real_escape_string($_SERVER['HTTP_REFERER']);
	
	date_default_timezone_set('Asia/Calcutta');
	$timeStamp=date('Y-m-d H:i:s');
	if(isset($_GET['max']))
	{
		$m=$_GET['max'];
	}
	else
	{
		$m="";
	}
	$query="INSERT INTO `ca_log` (`srNo`, `ip`, `userAgent`, `referer`, `timeStamp`,`max`) VALUES ('', '".$ip."', '".$userAgent."', '".$referer."','".$timeStamp."','".$m."');";
	$result=$dbObject->insertQuery($query);
	if(!$result)
	{
		die("Some db error!!");
	}
}


//for cellular automaton page

define("BOARD_SIZE","800");
$alert=false;

if(isset($_GET['max']))
{
	if($_GET['max']>150 || $_GET['max']<50)
	{
		$_GET['max']=100;
		$alert=true;
	}
	$max=$_GET['max'];
	define("MAX_ROW",$max);
	define("MAX_COL",$max);
}
else
{
	$max=100;
	define("MAX_ROW","100");
	define("MAX_COL","100");
}
$imgDimension=(BOARD_SIZE/$max);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cellular Automata (<?php echo MAX_ROW."X".MAX_COL; ?>)</title>
<link rel="shortcut icon" href="../ext/images/favicon.png" >
<link type="text/css" rel="stylesheet" href="style.css" />
<style type="text/css">
.emptyImg
{
	width:<?php echo $imgDimension."px"; ?>;
	height:<?php echo $imgDimension."px"; ?>;
}
</style>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32880711-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript">
//definig constants for JavaScript
	<?php 
		echo "MAX_ROW=".MAX_ROW.";";
		echo "MAX_COL=".MAX_COL.";";
	?>
	window.onload=function(){
		if(typeof(MAX_ROW)=="undefined" || typeof(MAX_COL)=="undefined" )
		{
			alert("JavaScrpt variables are not set..!! Sorry, but you have to refresh the page!!");
		}
		id=1+'_'+(MAX_COL/2).toFixed(0);
		initCell=document.getElementById(id);
		initCell.setAttribute("value","1");
		initCell.setAttribute("class","black");
		//alert('initilization Successful!!');
		
		<?php if($alert)	{ 	echo "alert(\"You can not give out of this range[50,150]!! Automatically resized to 100 X 100.\");"; }	?>
	}
</script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="mainWrap">
    <a href="https://github.com/dhananjay92/cellular-automaton">
        <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub">
    </a>
    <div id="cntrlWrap">
            <div id="formWrap">
                <form name="form" id="form" onsubmit="return false;" style="padding-bottom:7px;">
                <label for="userNum">Number:</label>
                <input name="userNum" type="text" id="userNum" />
                <div id="btnWrap">
                    <input type="submit" style="min-width: 70px; min-height: 40px;" value="Go!!" onclick="generateCA(document.getElementById('userNum').value)"/>
                	<button onclick="clearAll()" style="margin-left: 18px;">Refresh!!</button>
                    <br /><br />
					<div style="text-align: center;">
                    	<a href="guide.php" target="_blank">Help !!</a>
                    </div>
                </div>
                </form>
            </div>
            <div id="displayWrap">
                <div id="textDisplay"> 
                    <fieldset>
                        <legend>Rules in Binary</legend>
                        <table style="text-align:center; background-color:#FFF;" border="1" align="center">
                            <tr>
                                <th>111</th>
                                <th>110</th>
                                <th>101</th>
                                <th>100</th>
                                <th>011</th>
                                <th>010</th>
                                <th>001</th>
                                <th>000</th>
                            </tr>
                            <tr>
                                <td id="num_1">-</td>
                                <td id="num_2">-</td>
                                <td id="num_3">-</td>
                                <td id="num_4">-</td>
                                <td id="num_5">-</td>
                                <td id="num_6">-</td>
                                <td id="num_7">-</td>
                                <td id="num_8">-</td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="symbolicDisplay">
                <fieldset>
                        <legend>Symbolic Rules</legend>
                        <table border="1" style="background-color:#FFF;">
                            <tr>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_1" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_2" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img  id="represent_3" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_4" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_5" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_6" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" style=" text-align: center; ">
                                        <tr>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class="black"><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img id="represent_7" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table border="1" class="represent">
                                        <tr>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                            <td class=""><img src="imgs/empty.png" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class=""><img  id="represent_8" style="margin:auto;" src="imgs/empty.png" /></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                </fieldset>
                </div>
            </div>
            <div id="makeItLarger">
            	<form action="index.php" method="get">
                	<label for="max">Adjust grid to </label>
                	<input type="text" name="max" id="max"/>
                    <input type="submit" value="Submit!!"/>
                </form>
            </div>
    </div>
    <div id="tableWrap">
          <table id="mainTable" cellpadding="0" cellspacing="0" border="1">
              <?php
              for($r=1;$r<=MAX_ROW;$r++)
              {
                  echo "<tr row=".$r.">";
                  for($c=1;$c<=MAX_COL;$c++)
                  {
                      echo "<td row=\"".$r."\" col=\"".$c."\" id=\"".$r."_".$c."\" class=\"\" style=\"height:".$imgDimension."px; width:".$imgDimension."px;\" value=\"0\"><img src=\"imgs/empty.png\" class=\"emptyImg\" title=\"row:".$r." column:".$c."\"></td>";
                  }
                  echo "</tr>";
              }
              ?>
          </table>
          <table style="display:none;">
              <tr>
                  <td id="0_0" row="0" col="0" value="0"></td>
              </tr>
          </table>
    </div>
    <div style="float: right; margin-top: 200px;" id="log">
    
    
    
    </div>
    <!--<img src="imgs/CA_rule30s.png" style="display:none;"/>-->
</div>
</body>
</html>
