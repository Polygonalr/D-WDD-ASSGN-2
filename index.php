<?php
	include "db.php"
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>help</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="loadingScreen d-flex text-center">
    	<div class="align-self-center" style="margin:auto">
			Loading...
    	</div>
    </div>
	<div class="wrapper">
		<div class="lightbox" style="opacity:0">
			<div class="lightbox-content">
				<a href="#"><div class="cross"></div></a>
				<div class="container-fluid">
					<div class="row d-flex">
						<div class="col">
							<img class="lightbox-thumbnail" src="#"/>
						</div>
					</div>
					<div class="row d-flex">
						<div class="col text-center align-self-center" style="">
							<h2></h2>
							<h4></h4>
							<p class="text-muted"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<div class="jumbotron text-center" style="margin:0px">
    		<h1 class="text-white">Music Gallery</h1>
    	</div>

    	<nav class="navbar navbar-light navbar-expand-lg bg-faded">
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  	<ul class="navbar-nav mx-auto">
		  		<li class="nav-item" id="displayAllBtn">
		  			<a class="nav-link active" href="#">All</a>
		  		</li>
				<?php
					$query="SELECT * FROM genres ORDER BY genre_id";
					$results = mysqli_query($conn,$query);
					while($result = mysqli_fetch_assoc($results)) {
				?>
		  		<li class="nav-item">
		  			<a class="nav-link genreBtn" id="g<?php echo $result['genre_id']; ?>" href="#"><?php echo $result["description"]; ?></a>
		  		</li>
				<?php } ?>
		  	</ul>
		  </div>
	  	</nav>
	  	<div style="width:100%;height:30px;background-color:#252525">
	  		<p class="text-center" style="color:#EDEDED">Right click on the songs to add it to the playlist!</p>
	  	</div>
	  	<div class="container-fluid h-75" style="padding-top:25px">
	  		<div class="row h-100">
	  			<div class="col-9">
	  				<?php
	  					$query="SELECT * FROM songs ORDER BY title ASC";
	  					$results = mysqli_query($conn,$query);
  					?>
	  				<div class="container-fluid">
	  					<div class="row">
	  						<?php
	  							while($result = mysqli_fetch_assoc($results)) {
							?>
								<div class="col g<?php echo $result["genre_id"] ?> songCol">
									<div class="songColWrapper" style="margin-right:auto;margin-left:auto;width:230px;height:230px">
										<img class="songThumbnail"  src="music_thumbnails/<?php echo $result["thumbnail"]; ?>"/>
										<div id="<?php echo $result["song_id"] ?>" class="songDescription d-flex">
											<div style="width:250px" class="justify-content-center align-self-center">
												<h3 class="text-center songTitle"><?php echo $result["title"]; ?></h3>
												<h5 hidden class="text-center songArtist"><?php echo $result["artist_name"]; ?></h5>
												<p hidden class="text-center text-muted">$<?php echo $result["price"]; ?></p>
												<p class="songUrl" hidden><?php echo $result ["song_url"]; ?></p>
												<p class="thumbnailUrl" hidden>music_thumbnails/<?php echo $result["thumbnail"]; ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php
								}
			  				?>
			  			</div>
			  		</div>
	  			</div>
	  			<div class="col-3 playlistSidebar">
	  				<div class="playlistBar">
		  				<audio controls id="musicPlayer">
		  					<source id="playerSource" src="" type="audio/mpeg">
		  						Your browser does not support the audio element!
		  				</audio>
						<div class="text-center playlist">
							<div class="currentSong text-center">
								<h3>Playlist</h3>
								<table id="playlistTable">
									<tbody>
										<tr></tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="container-fluid playerBtn-container" style="padding:0px;padding-top:15px">
							<div class="row">
								<div class="col">
									<div class="btn btn-primary btn-block font-weight-bold" onclick="shufflePlaylist()">Shuffle</div>
								</div>
								<div class="col">
									<div class="btn btn-danger btn-block font-weight-bold" onclick="clearPlaylist()">Clear all</div>
								</div>
								<div class="col">
									<div class="btn btn-success btn-block font-weight-bold" onclick="savePlaylist(true)">Save list</div>
								</div>
							</div>
						</div>
		  			</div>
		  			<div class="playerOverlay text-center">
		  				<h2>...nothing in playlist yet!</h2>
						<h5 class="text-muted">Right click on a song to play it!</h5>
		  			</div>
	  			</div>
	  		</div>
	  	</div>
    	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src='js/jquery-sortable-min.js'></script>
		<script>	
			playList=[];
			currentPlayingSong = -1; // pos number of the playlist
			currentSelectedSongInLightbox = -1; // song id

			//----------Beginning of inactivity check----------

			// If theres no activity for 5 seconds do something
			var activityTimeout = setTimeout(inActive, 10000);

			function resetActive(){
			    clearTimeout(activityTimeout);
			    activityTimeout = setTimeout(inActive, 10000);
			}

			// No activity do something.
			function inActive(){
			    $(".lightbox").trigger("click");
			}

			// Check for mousemove, could add other events here such as checking for key presses ect.
			$(document).bind('mousemove', function(){resetActive()});

			$(document).ready(function(){
				$(".lightbox").hide();
    			loadPlaylist();
			});

			//----------End of inactivity check----------

			function updatePlaylist(){
				$("#playlistTable tbody").html("");
				if(playList.length>0){
					if(currentPlayingSong==0){
						$("#playlistTable tbody").html('<tr data-internalid="0" class="currentlyPlaying"><td>'+$("#"+playList[0]).find(".songTitle").html()+'</td><td class="cross"></td></tr>');
					}
					else{
						$("#playlistTable tbody").html('<tr data-internalid="0"><td>'+$("#"+playList[0]).find(".songTitle").html()+'</td><td class="cross"></td></tr>');
					}
					skip1=false;
					currentNumber = 1;
					playList.forEach(function(songId){
						if(skip1==true){
							if(currentPlayingSong==currentNumber){
								$("#playlistTable tr:last").after('<tr data-internalid="'+currentNumber+'" class="currentlyPlaying"><td>'+$("#"+songId).find(".songTitle").html()+'</td><td class="cross"></td></tr>');
							}
							else{
								$("#playlistTable tr:last").after('<tr data-internalid="'+currentNumber+'"><td>'+$("#"+songId).find(".songTitle").html()+'</td><td class="cross"></td></tr>');
							}
							currentNumber++;
						}
						else skip1=true;
					});
				}
			}

			function loadSong(songId){
				$("#playerSource").attr("src","music_mp3/"+$("#"+songId+" .songUrl").html());
				$("#musicPlayer").get(0).load();
				$("#musicPlayer").get(0).play();
			}


			function addSongToPlaylist(songId){
				if(playList.length>=5){
					alert("Can't add more than 5 songs to the playlist!");
				}
				else{
					if($.inArray(songId, playList)!=-1){
						alert("Already added the song to the playlist!");
					}
					else{
						alert("New song added.");
						playList.push(songId);
						if(playList.length==1){ // If playlist was initially empty and a new song added, hide the overlay and load the song.
							$(".playerOverlay").css("opacity","0");
							setTimeout(function(){$(".playerOverlay").hide();},500);
							loadSong(playList[0]);
							currentPlayingSong = 0;
						}
						updatePlaylist();
					}
				}
			}

			function closeLightBox(){
				$(".lightbox").css("opacity","0");
				setTimeout(function(){$(".lightbox").hide();},350);
			}

			function clearPlaylist(){
				if(confirm("Are you sure about clearing your playlist?")){
					playList=[];
					savePlaylist(false);
					currentPlayingSong=-1;
					updatePlaylist;
					$("#playerSource").attr("src","");
					$("#musicPlayer").get(0).load();
					currentPlayingSong = -1;
					$(".playerOverlay").show();
					setTimeout(function(){$(".playerOverlay").css("opacity","1");},50);
				}
			}

			function shuffle(array) {
			  var currentIndex = array.length, temporaryValue, randomIndex;

			  // While there remain elements to shuffle...
			  while (0 !== currentIndex) {

			    // Pick a remaining element...
			    randomIndex = Math.floor(Math.random() * currentIndex);
			    currentIndex -= 1;

			    // And swap it with the current element.
			    temporaryValue = array[currentIndex];
			    array[currentIndex] = array[randomIndex];
			    array[randomIndex] = temporaryValue;
			  }

			  return array;
			}

			function shufflePlaylist(){
				songIdOfCurrentlyPlayingSong = playList[currentPlayingSong];
				playList=shuffle(playList);
				currentPlayingSong = playList.indexOf(songIdOfCurrentlyPlayingSong);
				updatePlaylist();
			}

			function savePlaylist(verbose){
				if(verbose) alert("Playlist saved!");
				localStorage.setItem("playList", JSON.stringify(playList));
			}

			function loadPlaylist(){
				playList = JSON.parse(localStorage.getItem("playList"));
				if(playList.length>0){
					$(".playerOverlay").css("opacity","0");
					setTimeout(function(){$(".playerOverlay").hide();},500);
					currentPlayingSong=0;
					loadSong(playList[0]);
					updatePlaylist();
				}
			}

			$(".nav-link").on("click",function(event){
				$(".nav-link").removeClass("active");
				$(this).addClass("active");
				console.log('help');
			});


			$(".songDescription").contextmenu(function(){
				addSongToPlaylist($(this).attr("id"));
				return false;
			});

			$(".lightbox-content").contextmenu(function(){
				addSongToPlaylist(currentSelectedSongInLightbox);
				return false;
			});

			$("#musicPlayer").get(0).addEventListener('ended',function(){ // when a song has finished playing.
		    	if(playList.length!=0){ // If there are more songs in the playlist, load and play it.
		    		currentPlayingSong++;
		    		if (currentPlayingSong>=playList.length) currentPlayingSong = 0;
		    		updatePlaylist();
		    		loadSong(playList[currentPlayingSong]);
		    	}
		    });

		    $("#playlistTable").on("click","tr",function(){ // when user clicks on a song to change manually
		    	currentPlayingSong = $(this).attr("data-internalid");
		    	loadSong(playList[currentPlayingSong]);
		    	updatePlaylist();
		    });

			$("#playlistTable").on("click",".cross",function(event){ // when user clicks on the cross at the playlist
				if($(this).parent().attr("data-internalid") == currentPlayingSong){ // if song to be deleted is currently playing
					if(playList.length==1){ // if the song is the only song in the playlist, just stop music, remove the song and show overlay
						$("#playerSource").attr("src","");
						$("#musicPlayer").get(0).load();
						currentPlayingSong = -1;
						$(".playerOverlay").show();
						setTimeout(function(){$(".playerOverlay").css("opacity","1");},50);
					}
					else{
						if (currentPlayingSong>=playList.length-1) currentPlayingSong = 0;
						loadSong(playList[currentPlayingSong+1]);
					}
				}
				playList.splice($(this).parent().attr("data-internalid"),1);
		    	$(this).parent().fadeToggle(150);
		    	setTimeout(function(){updatePlaylist();},150);
		    	event.stopPropagation();
		    });

		    $("#playlistTable").sortable({
		    	containerSelector: 'table',
		    	itemPath: '> tbody',
		    	itemSelector: 'tr',
		    	onDrop: function ($item, container, _super, event) {
				  $item.removeClass(container.group.options.draggedClass).removeAttr("style")
				  $("body").removeClass(container.group.options.bodyClass)
				  var playlistTable = $("#playlistTable").get(0);
				  var newPlaylist = []
				  for(var i = 0, row; row = playlistTable.rows[i]; i++){
				  	newPlaylist.push(playList[$(row).attr("data-internalid")]);
				  }
				  currentPlayingSong = newPlaylist.indexOf(playList[currentPlayingSong]);
				  console.log(newPlaylist);
				  playList = newPlaylist;
				  updatePlaylist();
				}
		    });

		   $(window).keypress(function(e) {
		       var key = e.which;
		       if(key==32){
			       if($("#musicPlayer").get(0).paused) $("#musicPlayer").get(0).play();
			       else $("#musicPlayer").get(0).pause();
			       e.preventDefault();
			   }
		   });

			$("#displayAllBtn").on("click",function(event){
				$('.songCol').show(0.05);
			});
			$(".genreBtn").on("click",function(event){
				genreToDisplay = $(this).attr("id");
				$('.songCol').hide(0.05);
				$('.'+genreToDisplay).show(0.05);
			});
			$(".songDescription").on("click",function(event){
				currentSelectedSongInLightbox = $(this).attr("id");
				$(".lightbox").show();
				$(".lightbox").css("opacity","1");
				$(".lightbox img").attr("src",$(this).find(".thumbnailUrl").html());
				$(".lightbox h2").html($(this).find(".songTitle").html());
				$(".lightbox h4").html($(this).find(".songArtist").html());
				$(".lightbox .text-muted").html($(this).find(".text-muted").html());
			});

			$(".lightbox").on("click",function(event){
				closeLightBox();
			});
			$(".lightbox .cross").on("click",function(event){
				closeLightBox();
			});
			$(".lightbox-content").on("click",function(event){
				event.stopPropagation();
			});

			$(".loadingScreen div").html("All done!");
			$(".loadingScreen").css("opacity","0");
			setTimeout(function(){$(".loadingScreen").remove();},500);
		</script>
		</div>
    </body>
</html>