<?php
include("config.inc.php"); //include config file
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
    header('HTTP/1.1 500 Invalid page number!');
    exit();
}


$position = (($page_number-1) * $item_per_page);


$results = $mysqli->prepare("SELECT id, display_name, tweet,screen_name,profile_img_url,created_at FROM kabali_tweets ORDER BY id ASC LIMIT ?, ?");


$results->bind_param("dd", $position, $item_per_page); 
$results->execute(); 
$results->bind_result($id, $display_name, $tweet,$screen_name,$profile_img_url,$created_at
); 

while($results->fetch()){ //fetch values
    echo '<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">

            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">

              <img style="width:120px;border-radius:4px;border:2px solid transprant;" src="'.$profile_img_url.'"/>
            </header> 
             
        <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone"><br>
        <div style="margin-top: 15px;"> &nbsp;
          <img src="../images/twitter-icon.png" style="width:30px;"/> &nbsp;&nbsp;
          <a href="https://twitter.com/'.$screen_name.'" target="_blank" style="color: #4099FF;font-weight: bold;"> '.$display_name.'</a>
          <span style="float:right;font-size:12px;margin-right:40px;">'.$created_at.'</span>
        </div>
        <hr style="border: 0;height: 0;box-shadow: 0 0 14px 1px #ccc;">
              <div class="mdl-card__supporting-text">
            '.$tweet.'
              </div>
            </div>
              </section>'; 
}