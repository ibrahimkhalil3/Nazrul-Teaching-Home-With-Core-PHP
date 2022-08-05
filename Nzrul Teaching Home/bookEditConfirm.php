<?php session_start(); ?>
<?php 
if(!isset($_SESSION["user"])){ 
    header('Location: index.php');
    exit();
}  
?>
<?php
include 'connection.php';
//$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["submit"]))
{
	include 'connection1.php';
	try 
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$id = $_SESSION["id"];
			$bookTitle = $_SESSION["bookTitle"];	
			$bookAuthor = $_SESSION["bookAuthor"];	
			$isbnNo = $_SESSION["isbnNo"];	
			$bookPrice = $_SESSION["bookPrice"];	
			$Mirpur1 = $_SESSION["Mirpur1"];	
			$Mirpur2 = $_SESSION["Mirpur2"];	
			$Mirpur10 = $_SESSION["Mirpur10"];	
			$Barishal = $_SESSION["Barishal"];	
			$lastUpdateDate = $_SESSION["lastUpdateDate"];	 
			
			$stmt = $conn->query("UPDATE `bookstocktable` SET `bookTitle`='$bookTitle', `bookAuthor`='$bookAuthor', `isbnNo`='$isbnNo', `bookPrice`='$bookPrice', `Mirpur1`='$Mirpur1'
			, `Mirpur2`='$Mirpur2', `Mirpur10`='$Mirpur10', `Barishal`='$Barishal', `lastUpdateDate`='$lastUpdateDate' where id= '$id'");
			header('Location: bookUpdate.php');
				
		}
	catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	$conn = null;
    
}
else
{?>
<!DOCTYPE html>
<html>
    <head>
		<script>
            function goBack() {
                window.history.back();
            }
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <link href="css/index.css" rel="stylesheet">   
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font-awesome.css">
        <title>editBookFormConfirm.jsp | N@zrul</title>
    </head>
    <body style="background-color: #f1f1f1">
	<?php include 'header.php'; ?>
        <div class="main_body"> 
            <div style="margin-top: 100px;">
            </div>

            <?php     
                    $bookTitle=$_POST["bookTitle"]; 
                    $bookAuthor=$_POST["bookAuthor"]; 
                    $isbnNo=$_POST["isbnNo"]; 
					$bookPrice=$_POST["bookPrice"]; 
					$Mirpur1=$_POST["Mirpur1"]; 
					$Mirpur2=$_POST["Mirpur2"]; 
					$Mirpur10=$_POST["Mirpur10"]; 
					$Barishal=$_POST["Barishal"]; 
					$lastUpdateDate=$_POST["lastUpdateDate"]; 

					$_SESSION["bookTitle"] = $bookTitle;	
					$_SESSION["bookAuthor"] = $bookAuthor;	
					$_SESSION["isbnNo"] = $isbnNo;	
					$_SESSION["bookPrice"] = $bookPrice;	
					$_SESSION["Mirpur1"] = $Mirpur1;	
					$_SESSION["Mirpur2"] = $Mirpur2;	
					$_SESSION["Mirpur10"] = $Mirpur10;	
					$_SESSION["Barishal"] = $Barishal;	
					$_SESSION["lastUpdateDate"] = $lastUpdateDate;	
				 
            ?>         
            <!-- Java Code End Here-->
            <div class="adminform">
                <form action="#" method="POST">
                    <div style="font-size: 35px; text-align: center; font-weight: bolder; padding-bottom: 50px;">
                        <u>Edit Book Information</u>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            Book Title&nbsp;:
                        </div> 
                        <div style="display: inline-table; width: 45%;">  
							<?php echo $bookTitle; ?>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            Book Author&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $bookAuthor; ?>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            ISBN No&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $isbnNo; ?>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            Book Price&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $bookPrice; ?>
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            Mirpur-1&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $Mirpur1; ?> 
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            Mirpur-2&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $Mirpur2; ?> 
                        </div>
                    </div>
					<div>
                        <div class="inputtextitle">
                            Mirpur-10&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $Mirpur10; ?> 
                        </div>
                    </div>
					<div>
                        <div class="inputtextitle">
                            Barishal&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $Barishal; ?> 
                        </div>
                    </div>
                    <div>
                        <div class="inputtextitle">
                            lastUpdateDate&nbsp;:
                        </div>
                        <div style="display: inline-table; width: 45%;">
                            <?php echo $lastUpdateDate; ?> 
                        </div>
                    </div>                  

                    <input type="submit" name="submit" value="Update" style="margin-left: 389px; margin-bottom: 15px;margin-top: 10px;" class="input_box"/>
                </form>
            </div>

            <!-- Footer Start Here -------------------------------------------------------------------- --> 
            <hr style="border: 1px solid violet;">
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
            <!-- Footer End Here ------------------------------------------ --> 
        </div><!-- Main Div End Here -------------------------------------- --> 

    </body>
</html>
<?php
}
?>