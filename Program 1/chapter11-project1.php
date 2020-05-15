<!-- 
    Name: John Runyard
    Class: IT 353-001
    Assignment 4
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RGB Color Iterator</title>
    <style>
        main {
            position: relative;
        }

        span {
            height: 40px;
            width: 40px;
            border: solid black 1px;
            margin: 1px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <main>
        <?php include("rainwbow-iterator.php")?>

        
        <?php 
        
        $red = 0;
        $select = 0;
        $selected = isset($_GET['select']);
        if ($selected){
            if ($_GET['select'] > 5 && $_GET['select'] <= 100) {
                $iterator = $_GET['select'];
            }
        }
        
        ?>

        <h1 style="text-align:center;"><?php echo "The iterator is " . $iterator . "!";?></h1>
        
              <!-- I couldn't seem to get the extra credit part to work so I figured I would see if something like this would count for anything-->
        <form style="position:relative; left: 30%; width: 40%; margin: 6px; border: 2px solid grey; text-align: center;" class="form" action="chapter11-project1.php">
            <div style="margin: 6px;">
                <label style="font-size:1.2em;" for="select">Pick your iterator here folks!: </label>
                <select id="select" name="select">
                    <!-- I put a lower limit on the iterator selector so that the window wouldn't crash from trying to generate a bagillion spans -->
                    <!-- bagillion = 255^3 = 16,581,375 -->
                    <?PHP 
                    for ($select=6; $select<=100; $select++) {
                        if ($iterator == $select){
                            # This option is needed to set the selected value to the value of iterator
                            echo "<option value=\"" . $select . "\" selected >" . $select . "</option>";
                        } else {
                            echo "<option value=\"" . $select . "\">" . $select . "</option>";
                        }
                    }               
                    ?>
                </select>
                <button type="submit">Submit</button>
            </div>
        </form>

        <?php   
            for($red; $red <= 255; $red+=$iterator) { 
                for($green=0; $green <= 255; $green+=$iterator) { 
                    for($blue=0; $blue <= 255; $blue+=$iterator){
                        echo "<span style=\"background-color: rgb(" . $red . "," . $green . "," . $blue . ## creates and formats rgb() to the correct values
                        ");\" title=\"#" . sprintf('%02x', $red) . sprintf('%02x', $green) . sprintf('%02x', $blue) ## creates and formats title to the correct values
                        . "\"></span>";
                    }
                }
            }
        ?>
    
    </main>
</body>

</html>