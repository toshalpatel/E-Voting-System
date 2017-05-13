<!doctype html>
<html>
    <head>
      <meta name="description" content="Voter Registration" />
      <meta name="keywords" content="qrcode,qr code,scanner,javascript" />
      <meta name="language" content="English" />
      <meta name="Revisit-After" content="1 Days"/>
      <meta name="robots" content="index, follow"/>
      <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <title>Voter's Registration</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../css/registerstyle.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="llqrcode.js"></script>
        <script type="text/javascript" src="webqr.js"></script>
    </head>
    
    <body>
	<div class="container-fluid" id="wrap">
	  <nav class="navbar navbar-default">
	    <div class="container">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
	        <a class="navbar-brand" href="http://localhost/evosys/index.html">EVoSys</a></div>
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="defaultNavbar1">
<ul class="nav navbar-nav navbar-right">
          <li><a href="http://localhost/evosys/about.html">About</a></li>
	          <li><a href="http://localhost/evosys/register.html">Register</a></li>
	          <li><a href="http://localhost/evosys/login.php">Login</a></li>
	          <li><a href="http://localhost/evosys/profile.php">Candidate Profiles</a></li>
	          <li><a href="http://localhost/evosys/statistics.php">Statistics</a></li>
	        </ul>
          </div>
	      <!-- /.navbar-collapse -->
        </div>
	    <!-- /.container-fluid -->
      </nav>
        
        <div id="main">
            <div id="header">
                <p id="mp1">To register, click on the camera to upload the QR code image of your Aadhaar card.</p>
            </div>
            <div id="mainbody">
             	<table class="tsel" border="0" width="100%">
                    <tr>
                    <td valign="top" align="center" width="50%">
                    <table class="tsel" border="0">
                    <tr>
                        <td align="center"><img class="selector" id="qrimg" alt="Camera" src="cam.png" height="40" width="40" onclick="setimg()"/></td>
                    </tr>
                    <tr><td colspan="2" align="center">
                        <div id="outdiv"></div>
                    </td></tr>
                    </table>
                    </td>
                    </tr>
                </table>
            </div>
			<br><br>
            <form name="input" action="http://localhost/evosys/QR Upload/info.php" method="post">
                <input type="hidden" value="" name="uid" id="uid" required>
                <input type="hidden" value="" name="pincode" id="pincode" required>
                <input type="hidden" value="" name="name" id="name" required>
                <input type="hidden" value="" name="addr" id="addr" required>
                <input type="hidden" value="" name="gen" id="gen" required>
                <input type="hidden" value="" name="dist" id="dist" required>
                <input type="hidden" value="" name="state" id="state" required>
                <input type="hidden" value="" name="dob" id="dob" required>
                <input type="hidden" value="" name="yob" id="yob" required>
                    
                <br>
                <label for="password"><b>Enter Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Submit" >
            </form>
        </div>
        <canvas id="qr-canvas" width="600" height="600"></canvas>
        <script type="text/javascript">
			
			function read(a)
			{
				qr="<br>";
				if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
					qr+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
				qr+="<b>"+htmlEntities(a)+"</b>";
				decodeQR();
			}
			
			function load()
			{
				if(isCanvasSupported() && window.File && window.FileReader)
				{
					initCanvas(800, 600);
					qrcode.callback = read;
					document.getElementById("mainbody").style.display="inline";
				}
			}

			function extractText(str)
			{
				var ret = "";
				if(/"/.test( str ))
				{
					ret = str.match( /"(.*?)"/ )[1];
			  	} 
				else
				{
					ret = str;
			  	}
				return ret;
			}
			
			var juid, jpincode, jname, jaddr, jgen, jdist, jstate, jdob, jyob;
			function decodeQR()
			{
				var s, final, y;
				var qrstring = qr;
				var res = new Array;
				res = qrstring.split("=");
				
				for(var i=0;i<res.length;i++)
				{
					s = extractText(res[i].toString(res[i]));
					if(s.match('name'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jname = final[1];
					}
					else if(s.match('pc'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jpincode = final[1];
					}
					else if(s.match('uid'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						juid = final[1];
					}
					else if(s.match('gender'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jgen = final[1];
					}
					else if(s.match('yob'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jyob = final[1];
					}
					else if(s.match('dob'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jdob = final[1];
					}
					else if(s.match('dist'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jdist = final[1];
					}
					else if(s.match('state'))
					{
						y = extractText(res[i+1].toString(res[i+1]))
						final = y.split("&quot;");
						jstate = final[1];
					}
				}

				document.getElementById('uid').value = juid;
				document.getElementById('pincode').value = jpincode;
				document.getElementById('name').value = jname;
				document.getElementById('addr').value = jaddr;
				document.getElementById('gen').value = jgen;
				document.getElementById('dist').value = jdist;
				document.getElementById('state').value = jstate;
				document.getElementById('dob').value = jdob;
				document.getElementById('yob').value = jyob;
			}
			
        </script>
        
        <div id="decode">
			<script type="text/javascript">
            	load();
            </script>
            </div>
            </div>
    </body>
</html>