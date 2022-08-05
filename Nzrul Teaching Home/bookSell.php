<?php session_start(); ?>
<?php 
if(!isset($_SESSION["user"])){ 
    header('Location: index.php');
    exit();
}  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <link href="css/index.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font-awesome.css">        
        <title>bookSell.jsp</title> 
        <script> 
            function showFields(string)
            {
                var xRequest;
                if (string === "")
                {
                    document.getElementById("Show_update").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest)
                {
                    xRequest = new XMLHttpRequest();
                } else
                {
                    xRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xRequest.onreadystatechange = function ()
                {
                    if ((xRequest.readyState === 4) && (xRequest.status === 200))
                    {
                        document.getElementById("txtHint").innerHTML
                                = xRequest.responseText;
                    }
                };
                xRequest.open("get", "bookQuantityTest.php?q=" + string, "true");
                xRequest.send();
            } 
        </script>
    </head>
    <body style="background-color: #f1f1f1">
		<?php include 'headerall.php'; ?>
        <div class="main_body"> 
            <div style="margin-top: 100px;">
                <!--Extra Margin add for menu bar-->
            </div>
            <!-- End of Header Section -->

            <!-- All Extra Code Start Here -->
            <div style="text-align: center; font-size: 18px; color: red; min-height: 10px;">
            </div>

            <!-- Start book sell code here-->
            <div class="adminform">
                <form action="bookSell2.php" method="POST">
                    <div style="font-size: 22px; text-align: center; font-weight: bolder; padding-bottom: 50px; padding-top: 20px;">
                        Book Selling
                    </div>
                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                            Batch&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 50%;">
                            <input type="text" name="batch" placeholder="Batch No." class="input_box" style="width: 98%;" />
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                            Student ID&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 50%;">
                            <input type="text" name="stdId" placeholder="Student ID" class="input_box" style="width: 98%;" />
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                            Student Name&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 50%;">
                            <input type="text" name="stdName" placeholder="Enter name" class="input_box" style="width: 98%;" required=""/>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                           Mobile&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 50%;">
                            <input type="text" name="mobile" placeholder="contact number" class="input_box" style="width: 98%;" required="" />
                        </div>
                    </div>

                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                            Book Name&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 51.5%;">
                            <select name="bookName" required="" onchange="showFields(this.value)" style="width:100%; font-size: 17px; height: 36px; padding: 5px; margin-left: 2px; margin-top: 5px;">
                                <option value="">select book</option>
                                <?php
								$branch = $_SESSION["sessionAdminBranch"];
								include 'connection1.php';
								try {
									$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										
										if ($branch != null) {
											if ($branch == "Mirpur-1") {
												$stmt = $conn->query("select  *from bookstocktable where Mirpur1 > 0"); } 
											else if ($branch == "Mirpur-2") {
												$stmt = $conn->query("select  *from bookstocktable where Mirpur2 > 0");  } 
											else if ($branch == "Mirpur-10") {
												$stmt = $conn->query("select  *from bookstocktable where Mirpur10 > 0");  } 
											else if ($branch == "Barishal") {
												$stmt = $conn->query("select  *from bookstocktable where Barishal > 0"); }
										} else { 
											header('Location: administrator.php'); }


									while ($row = $stmt->fetch())
									{
                                ?>
                                <option value="<?php echo $row["bookTitle"];?>">
                                    <?php echo $row["bookTitle"];?></option>
                                <?php  }
                                }
			catch(PDOException $e)
				{
				echo "Error: " . $e->getMessage();
				}
			$conn = null;
			?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle" style="width: 25%;">
                            Quantity&nbsp;:
                        </div>
                        <div style="display: inline-table; margin: 12px 150px 0px 0px; font-size: 17px; height: 30px; float: right;" id="txtHint">
                        </div>
                        <div style="display: inline-table; width: 20%;">
                            <input type="text" name="bookQuantity" placeholder="Number of books" class="input_box" style="width: 98%;" required=""/>
                        </div>
                        
                    </div>
                    <input type="submit" value="Next" style="margin-left: 500px; margin-bottom: 15px;margin-top: 10px;" class="input_box"/>
                </form>
            </div>
            <!-- End book sell code here-->

            <!-- Footer Start Here -------------------------------------------------------------------- --> 
            <hr>
            <div class="footer">
                <div class="icon">
                    <a href="#">N@zrul</a>
                </div>
                <div class="icon">
                    <a href="#">Branches</a>
                </div>
                <div class="icon">
                    <a href="#">Courses</a>
                </div>
                <div class="icon">
                    <a href="#">Policy</a>
                </div>
                <div class="icon">
                    <a href="#">Suggest</a>
                </div>
                <div class="icon">
                    <a href="#">Branches</a>
                </div>
                <div class="icon">
                    <a href="#">Career</a>
                </div>
                <div class="icon">
                    <a href="#">Contact US</a>
                </div>
            </div>
        </div>
    </body>
</html>
