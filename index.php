<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Made for Mayanadhi Love">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Kabali Love - Mayanadhi Tweets</title>
    <meta name="mobile-web-app-capable" content="yes">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="css/styles.css">



    <style>
    body {
    font-family: "Lato", sans-serif;
    font-weight: 300;
}

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(../images/Preloader_11.gif) center no-repeat #fff;
}
.loading-info{text-align:center;margin-bottom: 50%;}
    </style>

    <style type="text/css" src="css/layout.css"></style>
  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="se-pre-con"></div>
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary"><br><br><br><br><br><br>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row" style="padding-left: 18%;">
         <img src="../images/Kabali-Rajinikanth.jpg"  />
        </div>

        <div class="mdl-layout__header-row">        
        </div>


        
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark" style="margin-top: 27px !important;">
          <a href="#overview" class="mdl-layout__tab is-active" style="margin-left: 40%;font-size: 28px;font-weight: 700;"><i class="mdl-color-text--blue-white-400 material-icons" role="presentation">flag&nbsp;&nbsp;&nbsp;</i>#Mayanadhi <span style="text-transform: lowercase;font-size: 12px;">tweets</span></a>

        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
         
              <div class="wrapper">
    <ul id="results"></ul>
    <div class="loading-info"><img src="ajax-loader.gif" /></div>
</div>
<br>
<embed src='http://www.mirchimp3songs.in/media/songs/MAYA NADHI_MirchiMp3Songs.mp3' autostart='false' loop='false' width='3' height='0'
controller='true' bgcolor='#FFFFFF'></embed>
                      
          </section>
        </div>
      </main>
    </div>
   <!--  <script src="js/material.min.js"></script> -->
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">

    $(window).load(function() {
    $(".se-pre-con").fadeOut("slow");;
  });
var track_page = 1; 
var loading  = false; 

load_contents(track_page); 

$(window).scroll(function() { 
	if($(window).scrollTop() + $(window).height() >= $(document).height()) { 
		track_page++;
		//alert(track_page);
		load_contents(track_page); 
	}
});		

function load_contents(track_page){
    if(loading == false){
		loading = true;  
		$('.loading-info').show();  
		$.post( 'fetch_pages.php', {'page': track_page}, function(data){
			loading = false; 
			if(data.trim().length == 0){
				
				$('.loading-info').html("No more records!");
				return;
			}
			$('.loading-info').hide(); 
			$("#results").append(data); 
		
		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
	}
}
    </script>
  </body>
</html>

