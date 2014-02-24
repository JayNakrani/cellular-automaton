/**
 * Author's Note:
 * Author  : dj (dhananjaynakrani@gmail.com, admin@playingdj.x10.mx)
 * version : v1.0
 * Date    : 30-06-2012
 *
 * What does it do ??
 * :=>
 * 	It is the simulation of cellular-automata described by Stephen Walfram. It takes an input and generates cellular-automata for that rule. That is displayed on the chart.
 * 	For more information about cellular automata please refer to following links.
 *
 * Tehcnologies used...
 * 	:=>
 * 		(x)html+JavaScript+php
 */



function generateCA(num)
{
	//convert number into binary
	num=parseInt(num);
	if(num>255 || num <0 || isNaN(num))
	{
		alert('Wrong number..!! Give number in the range of 0-255');
		return(false);
	}
	binNum=dec2bin(num);
	displayNum(binNum);
	var r=1;			//row index
	var c=1;			//column index
	for(r=2;r<=MAX_ROW;r++)
	{
		id=null;
		for(c=1;c<=MAX_COL;c++)
		{
			//find current cell 
			id=r+'_'+c;
			//str='<br>currentId='+id;
			currentCell=document.getElementById(id);
			id=(r-1)+'_'+c;
			//str=str+'&nbsp;&nbsp;&nbsp;&nbsp;prevTopId='+id;
			prevTopCell=document.getElementById(id);
			//previous Left Cell
			if((c-1)>0)
			{
				id=id=(r-1)+'_'+(c-1);
				prevLeftCell=document.getElementById(id);
			}
			else
			{
				id='0_0';
				prevLeftCell=document.getElementById(id);
			}
			//str=str+'&nbsp;&nbsp;&nbsp;&nbsp;prevLeftId='+id;
			//previous Right Cell
			if((c+1)<=MAX_COL)
			{
				id=id=(r-1)+'_'+(c+1);
				prevRightCell=document.getElementById(id);
			}
			else
			{
				id='0_0';
				prevRightCell=document.getElementById(id);
			}
			//str=str+'&nbsp;&nbsp;&nbsp;&nbsp;prevRightId='+id;
			tmpStr=prevLeftCell.attributes.value.value.toString()+prevTopCell.attributes.value.value.toString()+prevRightCell.attributes.value.value.toString();
			//str=str+'&nbsp;&nbsp;'+tmpStr;
			index=giveBinIndex(tmpStr);
			if(parseInt(binNum[index])==1)
			{
				currentCell.setAttribute("class","black");
				currentCell.setAttribute("value","1");
			}
			//str=str+'&nbsp;&nbsp;'+binNum[index];
			//document.getElementById('log').innerHTML=document.getElementById('log').innerHTML+str;
			//str=null;
		}
	}
}

function dec2bin(num)
{
	// returns 8-bit binary of (num)base10
	tmpNum=num.toString(2);
	len=tmpNum.length;
	for(var i=0;i<(8-parseInt(len));i++)
	{
		tmpNum='0'+tmpNum;
	}
	return(tmpNum);
}
function displayNum(binNum)
{
	// displays pattern for each combination in num space
	for(i=1;i<=8;i++)
	{
		id='num_'+i;
		cell=document.getElementById(id);
		cell.innerHTML=binNum[i-1];
		if(parseInt(binNum[i-1])==1)
		{
			id='represent_'+i;
			cell=document.getElementById(id);
			cell.setAttribute("class","black");
		}
	}
}

function giveBinIndex(str)
{
	switch(str)
	{
		case '111':
			return(0);
			break;
		case '110':
			return(1);
			break;
		case '101':
			return(2);
			break;
		case '100':
			return(3);
			break;
		case '011':
			return(4);
			break;
		case '010':
			return(5);
			break;
		case '001':
			return(6);
			break;
		case '000':
			return(7);
			break;
		default:
			alert("Ooch something went wrong..!!");
			break;
	}
}

function clearAll()
{
	//alert("i'm called..!!");
	document.getElementById('form').reset();
	for(i=1;i<=8;i++)
	{
		id='num_'+i;
		document.getElementById(id).innerHTML='-';
		id='represent_'+i;
		document.getElementById(id).setAttribute("class","");
	}
	//clear board
	for(r=2;r<=MAX_ROW;r++)
	{
		for(c=1;c<=MAX_COL;c++)
		{
			id=r+'_'+c;
			document.getElementById(id).setAttribute("value","0");
			document.getElementById(id).setAttribute("class","");
		}
	}
	id=1+'_'+(MAX_COL/2).toFixed(0);
	initCell=document.getElementById(id);
	initCell.setAttribute("value","1");
	initCell.setAttribute("class","black");
}