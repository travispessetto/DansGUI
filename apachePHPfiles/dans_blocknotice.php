<title>RESTRICTED SITE</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script src="https://raw.github.com/carlo/jquery-base64/master/jquery.base64.min.js" type="text/javascript"></script>
</head><body>
<h1 style="background-color: #000;"><span style="color: red;"><span style="font-weight: bold;">RESTRICTED SITE</h1>
<small><small><small><small>The Webpage you have attempted to view is restricted because of the following reason:<br>
&nbsp;<?php echo base64_decode($_GET["res"]); ?><br><br>
CATAGORIES: <?php echo base64_decode($_GET["cats"]); ?>
</small></small></small></small></span></span></big></big></big></big>
<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center">
      <td colspan="2" rowspan="1" style="vertical-align: top;">What Would You Like To Do?<br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><a href="http://localhost/unblock.php?ref=-URL-" id="unblock">OVERIDE (Password Required)</a><br>
      </td>
      <td style="vertical-align: top;"><a href="http://google.com">Get me OUT OF HERE (go to google.com)</a><br>
      </td>
    </tr>
  </tbody>
</table>
DANSGUI<br>
<div style="border: 1px solid #000; width: 300px; min-height: 75px; position: fixed; left: 50%; margin-left: -150px; top: 50%; margin-top: -37px; display: none;" id="password">
  <form action="http://localhost/unblock.php?ref=<?php echo $_GET["ref"]; ?>" method="post">
    Password:<br />
    <input type="password" name="pass" />
    <input type="submit" value="Unblock" />
  </form>
</div>
<span style="color: red;"><span style="font-weight: bold;"></span>
<script type="text/javascript">
$('a#unblock').click(function(e){
e.preventDefault();
$('div#password').fadeIn();});
$('form').submit(function(e)
{
  e.preventDefault();
  $.post("http://localhost/unblock.php" ,{"pass":$('input[name="pass"]').val(),"ref":"<?php echo $_GET["ref"]; ?>"},function(data){
  $("div#password").append("<br />Notice: "+data.msg);
  //setTimeout(function(){window.location = "<?php echo $_GET["ref"]; ?>";}, 20000);
  },"json").fail(function(jqXHR, textStatus, errorThrown){alert("Error: "+errorThrown)});
});
</script>
</body>
</html>
