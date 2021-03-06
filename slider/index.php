<?php 
    $backgroundImage = "img/sea.jpg";
    if (isset($_GET['keyword'])) {
        //echo "You searched for: " . $_GET['keyword'];
        include 'api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $imageURLs = getImageURLs($keyword);
        //print_r($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Image Carousel </title>
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"-->

        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
        <style>
            @import url('css/styles.css');
            body {
                background-image: url('<?=$backgroundImage ?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>

    </head>
    <body>
        <br/><br/>
        <?php
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            } else {
                //Diaplay Carousel here
                /*
                for ($i = 0; $i < 5; $i++) {
                    do {
                        $randomIndex = rand(0, count($imageURLs));
                    } 
                    while (!isset($imageURLs[$randomIndex]));
                    echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200' >";
                    unset($imageURLs[$randomIndex]);

                }
            }
            */
        ?>
        <!-- HTML form goes here -->
        <div id="carousel-example-generic" class="carousel slide" data-ride = "carousel">
            <ol class = "carousel-indicators">
                <?php 
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target = '#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            <div class="carousel-inner" role = "listbox">
                <?php
                for ($i = 0; $i < 7; $i++) {
                    do {
                        $randomIndex = rand(0, count($imageURLs));
                    } 
                    while (!isset($imageURLs[$randomIndex]));
                    
                    echo '<div class="carousel-item ';
                    echo ($i == 0) ? "active" : "";
                    echo '">';
                    echo '<img src="' . $imageURLs[$randomIndex] . '">';
                    echo '</div>';
                    unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            <!--
            <a class = "left carousel-control" href = "#carousel-example-generic" role="button" data-slide = "prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class = "right carousel-control" href = "#carousel-example-generic" role="button" data-slide = "next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">next</span>
            </a>
            -->
            
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            } //end else
        ?>
        <br>
        <form>
            
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="layout_h" />
                <label for="layout_h"> Horizontal </label><br />
                 <input type="radio" name="layout" value="vertical" id="layout_v"   />
                 <label for="layout_v"> Vertical </label><br />
            </div>
            <br />
            <select name="category" style="color:black; font-size:1.5em">
                 <option value=""> - Select One - </option>
                 <option value="ocean"  > Sea </option>
                 <option > Mountains </option>
                 <option > Forest </option>
                 <option > Sky </option>
            </select><br /><br />    

<!--
            <input type = "radio" id = "lhorizonal" name="layout" value = "horizontal">
            <label for = "Horizontal"></label><label for = "lhorizonal">Horizontal</label>
            <input type="radio" id="lvertical" name = "layout" value="vertical">
            <label for = "Vertical"></label><label for = "lvertical">Vertical</label>
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
                <option>Snow</option>
            </select>
-->            
            <input type="submit" value="Search"/>
        </form>
        <br/><br/>
        <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->        
        <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script-->
        <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script-->
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>