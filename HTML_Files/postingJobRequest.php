<!DOCTYPE html>
<html>

    <head>
        <title>Post Job Request</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS_Files/jobRequestStyle.css">
        <link rel="stylesheet" href="../CSS_Files/menustyle.css">
        <link rel="stylesheet" href="../CSS_Files/footer.css">
        <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <script type="text/javascript">
    window.onload=function(){//from ww  w . j  a  va2s. c  o  m
var today = new Date().toISOString().split('T')[0];

document.getElementsByName("form_day")[0].setAttribute('min', today);
    }

      </script> 
    </head>
    
    <body>
        
         <!--Upper Menue-->
    <?php include("parentheader.php"); ?>
    

        <div class="postingPage">
            <h2>Post Job Request</h2>
        
            <div class="container">

            <form action="../PHP_Files/jobRequest.php" method="POST">
            <p id="formInfo">

                <div id="kids_info">
                    <label class="nameLabel"> Kid/s Name: 
                        <input class="inputName" name="kidsname[]" type="text" placeholder="Enter Kid Name" required> 
                    </label>
                    
                    <label class="ageLabel"> Kid/s Age: 
                        <input class="inputAge" name="kidsage[]" type="number" min="0" max="17" placeholder="Enter Kid Age" required>
                    </label>
                </div>
                    
                        <div class="controls">
                          <a href="#" id="add_more_fields" size="50"><i class="fa fa-plus"></i></a>
                          <a href="#" id="remove_fields"><i class="fa fa-minus"></i></a>
                          <p>Select + to add child, - to remove child</p>
                        </div>
                
                <label class="serviceLabel"> Type Of Service: 
                    <input class="inptService" name="service" type="text" placeholder="Enter type of service you want" required> 
                </label>
                
                <label class="durationLabel"> Duration: <br>
                Date:<input class="inputDay" name="form_day" type="date" min=<?php echo date('Y-m-d', strtotime('+2 days') ); ?>required > </label>
                <label class="durationLabel"> From: <input class="inputFromTime" name="from_time" type="time" required > </label>
                <label class="durationLabel"> To: <input class="inpuToTime" name="to_time" type="time"  required> </label>
                <br><br>
                <label class="commentsLabel"> Add Comments: (optional)
                    <textarea class="commentsArea" name="comments" cols="72" rows="6" placeholder="  Add any comment if you want"></textarea>
                </label>
                <br>
                 
                <input type="submit" class="Bottons postBotton" onclick="return check()" value="Post" name="post_submit"/>
            </p>
            </form>
            </div> <!-- end container -->
        </div> <!-- end postingPage -->

        <script>

            function check(){
               return alert("Job Request Posted Successfully");
           }
           
           </script>
           
        <footer> <!-- footer -->
            <table class="tableF">
                <tr>
                    <th><a href="aboutUs.html"> About Us </a></th>
                    <th><a href="FAQ.html"> FAQs </a></th>
                    <th><a href="ContactUs.html"> Contact Us </a></th>
                </tr>
            </table>
            <div id="shareProfile">
                    <h4>Share the website</h4>
                
                    <a href="https://facebook.com" target="_blank">
                        <i class="fa-brands fa-facebook fa-2x"></i>
                    </a>
            
                    <a href="https://twitter.com" target="_blank">
                        <i class="fa-brands fa-twitter fa-2x"></i>
                    </a>
            
                    <a href="https://linkedin.com" target="_blank">
                        <i class="fa-brands fa-linkedin fa-2x"></i>
                    </a>
            
                    <a href="https://instagram.com" target="_blank">
                        <i class="fa-brands fa-instagram fa-2x"></i>
                    </a>
            
                    <a href="https://web.whatsapp.com" target="_blank">
                        <i class="fa-brands fa-whatsapp fa-2x"></i>
                    </a>
                </div><br> 
            <div class="footer">
            &copy; A Watchful Eye, 2022
            </div>
            </footer> <!-- end footer -->
    </body>
    <script src="addKids.js"></script>
</html>