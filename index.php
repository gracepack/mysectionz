<?php include __DIR__ . '/functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Zoom Meeting</title>
    <link rel="icon" href="files/favicon.ico">
    <style type="text/css">
      body{ font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif; background: #4E5869; margin: 0; padding: 0; color: #000;} ul, ol, dl{ padding: 0; margin: 0;} h1, h2, h3, h4, h5, h6, p{ margin-top: 0; padding-right: 15px; padding-left: 15px;} a img{ border: none;} a:link{ color: #414958; text-decoration: underline;} a:visited{ color: #4E5869; text-decoration: underline;} a:hover, a:active, a:focus{ text-decoration: none;} .container{ width: 80%; max-width: 1260px; min-width: 780px; background: #FFF; margin: 0 auto;} .header{ background: #6F7D94;} .content{ padding: 10px 0;} .content ul, .content ol{ padding: 0 15px 15px 40px;} .footer{ padding: 10px 0; background: #6F7D94;} .fltrt{ float: right; margin-left: 8px;} .fltlft{ float: left; margin-right: 8px;} .clearfloat{ clear: both; height: 0; font-size: 1px; line-height: 0px;}
      .k2-copy-button svg{ margin-right: 10px; vertical-align: top;} .k2-copy-button{ height: 45px; width: 155px; color: #fff; background: #265df2; outline: none; border: none; border-radius: 8px; font-size: 17px; font-weight: 400; margin: 8px 0; cursor: pointer; transition: all 0.4s ease;} .k2-copy-button:hover{ background: #2ECC71;} @media (max-width: 480px){ #k2button{ width: 100%;}}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <div class="content">
        <h1 style=" text-align:center">Book Your Zoom Meeting Here</h1>
        <div style=" margin-left:400px; margin-right:100px">
          <form method="POST" action="">
            <label for="html">Company Name:</label>
            <br>
            <input type="name" name="id" style="width:300px; height:30px" required="required" />
            <br />
            <br />
            <br />
            <label for="html">Email:</label>
            <br>
            <input type="email" name="email" style="width:300px; height:30px" required="required" />
            <br />
            <br />
            <input type="submit" value="Book Meeting" style="font-size:16px; font-weight:bold; height:30px; color:#FFF; background-color:#000" />
            <br />
          </form>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <?php  if(isset($_POST['id'], $_POST['email'])) {?>
          <?php if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ ?>
            <p id="myInput"><?php echo generate_shared_link($_POST??[]);?></p>
            <button class="k2-copy-button" id="k2button" style="margin-left:10px">
              <svg aria-hidden="true" height="1em" preserveaspectratio="xMidYMid meet" role="img" viewbox="0 0 24 24" width="1em" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                <g fill="none">
                  <path d="M13 6.75V2H8.75A2.25 2.25 0 0 0 6.5 4.25v13a2.25 2.25 0 0 0 2.25 2.25h9A2.25 2.25 0 0 0 20 17.25V9h-4.75A2.25 2.25 0 0 1 13 6.75z" fill="currentColor">
                    <path d="M14.5 6.75V2.5l5 5h-4.25a.75.75 0 0 1-.75-.75z" fill="currentColor">
                      <path d="M5.503 4.627A2.251 2.251 0 0 0 4 6.75v10.504a4.75 4.75 0 0 0 4.75 4.75h6.494c.98 0 1.813-.626 2.122-1.5H8.75a3.25 3.25 0 0 1-3.25-3.25l.003-12.627z" fill="currentColor"></path>
                    </path>
                  </path>
                </g>
              </svg>Copy </button>
              <script> function copyFunction(){ const copyText=document.getElementById("myInput").textContent; const textArea=document.createElement('textarea'); textArea.textContent=copyText; document.body.append(textArea); textArea.select(); document.execCommand("copy"); k2button.innerText="Text copied"; textArea.remove();} document.getElementById('k2button').addEventListener('click', copyFunction);  </script>
          <?php }else{ ?>
            <div style="background-color:darkred;color:#fff;padding:1rem;">Error, please make sure that your email address is valid</div>
          <?php } ?>
        <?php } ?>
        <p>&nbsp;</p>
      </div>
      <div class="footer">
      </div>
    </div>
  </body>
</html>