<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="shortcut icon" href="../ext/images/favicon.png" >
<title> Guide Cellular Automaton!!</title>
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
<script type="text/javascript" src="../ext/files/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
                               $('#meImg').mouseover(function(){
                                                              $('#meImg').toggleClass('ulta').toggleClass('pulta');
                                                              });
                               });
    $(document).ready(function(){
                               $('#meImg').mouseout(function(){
                                                              $('#meImg').toggleClass('ulta').toggleClass('pulta');
                                                              });
                               });
</script>
<style type="text/css">
	h1,h2,h3,h4
	{
		padding-left:5px;
		font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;
		background: #c0c0c0;
		opacity: 0.8;
		width: 500px;
		border-radius:7px;
	}
	h4
	{
		width: 300px;
	}
	
	p
	{
		font-family:"Times New Roman", Times, serif;
		padding-left:13px;
	}	
	a
	{
		font-weight:200;
	}
	#meImgWrap
	{
		position: absolute;
		right: 30px;
		top: 30px;
	}
	#meImgWrap img 
	{
		-webkit-transition: all 0.5s;
		-o-transition: all 0.5s;
		-moz-transition: all 0.5s;
		box-shadow: 0px 0px 50px #888;
		padding:0px;
		border:none;
	}
	.ulta
	{
		-webkit-transform: rotate(135deg);
		-o-transform: rotate(135deg);
		-moz-transform: rotate(135deg);
		width:50px;
	}
	.pulta
	{
		-webkit-transform: rotate(-45deg);
		-o-transform: rotate(-45deg);
		-moz-transform: rotate(-45deg);
		width:100px;
	}
	</style>
</head>
<body>
<div style="background: #FAE7C3; padding: 15px; border-radius: 15px; width: 900px;">
<h1 style="text-align:center; margin:auto;"><a href="index.php">Simulation of CA</a></h1>
    <h3>What is it??</h3>
    <p>JavaScript simulation of Elementary Cellular Automaton. It generates the cellular-automata for given rule (here user gives it as number).<br />
For more info about cellular automaton and work of Stephen Walfram refer to the following links.</p>
	<p>Links:<br />
  <ul>
        	<li>
            	Elementary Cellular Automaton:
            	<ol>
                	<li>
                    	<a href="http://en.wikipedia.org/wiki/Elementary_cellular_automaton">
                        	Wiki:Elementary_cellular_automaton
                        </a>
                    </li>
                    <li>
                    	<a href="http://mathworld.wolfram.com/ElementaryCellularAutomaton.html">
                        	http://mathworld.wolfram.com/ElementaryCellularAutomaton.html
                        </a>
                    </li>
                </ol>
            </li>
            <li>
            	General Cellular Automaton:
            	<ol>
                	<li>
                    	<a href="http://en.wikipedia.org/wiki/Cellular_automaton">
                        	Wiki:Cellular Automaton
                        </a>
                    </li>
                </ol>
            </li>  
            <li>
            	A New Kind of Science:
            	<ol>
                	<li>
                    	<a href="http://www.wolframscience.com/">
                        	wolframscience.com
                        </a>
                    </li>
                </ol>
            </li>  
  </ul>
	</p>
<h3>How to use it??</h3>
<p>
    <ul>
    	<li>
        	Just give in any rule number in the input box and press 'Go !!' button.
            <br />It will show you...
              <ul>
                  <li>
                      Binary Rules.
                  </li> 
                  <li>
                      Symbolic Rules.
                  </li> 
                  <li> 
                      Graph
                  </li> 
              </ul>
      	</li>
        <li>
        	You can even adjust graph. By deafult it is of 100X100. But you can adjust it between 50X50 to 150X150.<br />
			Just enter the number of cell you want in each row/column in the input box given in the top-right corner.
        </li>
        See image <a href="imgs/img1.png" target="_blank">here</a>.
    </ul>
    NOTE : Make sure that  the graph must be empty before you give in any rule number, if not press given 'Refresh' button. (Page won't load again, it just clears all the fields.)
</p>
<h2>About the 'dev'</h2>
<p>See the '<b style="color:red;">dev</b>' is hanging somewhere in the top-right corner of this page.!! Don't touch him.....<img src="imgs/smiley.png" /></p>
<h3>Contact</h3>
<p>
	For furthur information feel free to ask anything at
    <strong>
    	<a href="mailto:info@playingdj.x10.mx?Subject=About%20the%20Cellular%20Automaton">info@playingdj.x10.mx</a>
    </strong><br />
	And don't forget to report bugs as well!!..<img src="imgs/smiley1.png" /></p>
</div>
<div id="meImgWrap">
    	<img title="yo, haha, howdy...!!" id="meImg" class="ulta" src="../ext/images/me_200.jpg" />
</div>
</body>
</html>