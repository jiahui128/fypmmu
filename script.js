var songsToAdd = [
	{
      "name": "Where You Are",
      "artist": "Various Artists",
      "album": "Moana Original Soundtrack (Disney)",
      "url": "songs/whereyouare.mp3",
      "cover_art_url": "images/moana.jpg"
    },
    {
      "name": "Everything is Alright",
      "artist": "Laura Shigihara",
      "album": "To the Moon",
      "url": "songs/every.mp3",
      "cover_art_url": "images/every.jpg"
    },
    {
      "name": "Something There",
      "artist": "Emma Watson, Dans Steven",
      "album": "Beauty and the Beast Original Soundtrack (Disney)",
      "url": "songs/something.mp3",
      "cover_art_url": "images/beautyandthebeast.jpg"
    },
  {
    "name": "Negaraku",
    "artist": "Pierre-Jean de Béranger",
    "album": "Malaysia's National Anthem",
    "url": "songs/Negaraku.mp3",
    "cover_art_url": "images/negaraku.jpg"
  },
  {
    "name": "One Thousand Years Later",
    "artist": "Wayne Lin Jun Jie",
    "album": "Code 89757",
    "url": "songs/onethousandyears.mp3",
    "cover_art_url": "images/jjlim.jpg"
  },
  {
    "name": "As A Light Smoke",
    "artist": "IRiS (Tomo)",
    "album": "Unknown",
    "url": "songs/onmyoji.mp3",
    "cover_art_url": "images/yohime.jpg"
  },
  {
    "name": "Amazing Grace",
    "artist": "John Newton",
    "album": "On a Blue Ridge Sunday",
    "url": "songs/amazinggrace.mp3",
    "cover_art_url": "images/amazinggrace.jpg"
  },
  {
    "name": "Let's Go To the Forest",
    "artist": "Kero Kero Bonito",
    "album": "Intro Bonito",
    "url": "https://i.koya.io/Kero%20Kero%20Bonito%20-%20Let's%20Go%20To%20The%20Forest.mp3",
    "cover_art_url": "images/kero.jpg"
  }
];

Amplitude.init({
  "songs": [
    {
      "name": "Kimi Ni Todoke", // SONG NAME
      "artist": "Tanizawa Tomofumi", //ARTIST NAME
      "album": "Kimi Ni Todoke Original Soundtrack", //ALBUM NAME
      "url": "songs/Kimi_Ni_Todoke.mp3", // PATH NAME AND SONG URL
      "cover_art_url": "images/sawako.jpg"
    }
  ]
});


/*
  Shows the playlist
*/
document.getElementsByClassName('show-playlist')[0].addEventListener('click', function(){
  document.getElementById('white-player-playlist-container').classList.remove('slide-out-top');
  document.getElementById('white-player-playlist-container').classList.add('slide-in-top');
  document.getElementById('white-player-playlist-container').style.display = "block";
});

/*
  Hides the playlist
*/
document.getElementsByClassName('close-playlist')[0].addEventListener('click', function(){
  document.getElementById('white-player-playlist-container').classList.remove('slide-in-top');
  document.getElementById('white-player-playlist-container').classList.add('slide-out-top');
  document.getElementById('white-player-playlist-container').style.display = "none";
});

/*
  Gets all of the add to playlist buttons so we can
  add some event listeners to actually add to playlist.
*/
var addToPlaylistButtons = document.getElementsByClassName('add-to-playlist-button');

for( var i = 0; i < addToPlaylistButtons.length; i++ ){
  /*
    Add an event listener to the add to playlist button.
  */
  addToPlaylistButtons[i].addEventListener('click', function(){
    var songToAddIndex = this.getAttribute('song-to-add');

    /*
      Adds the song to Amplitude, appends the song to the display,
      then rebinds all of the AmplitudeJS elements.
    */
    var newIndex = Amplitude.addSong( songsToAdd[ songToAddIndex ] );
    appendToSongDisplay( songsToAdd[ songToAddIndex ], newIndex );
    Amplitude.bindNewElements();

    /*
      Removes the container that contained the add to playlist button.
    */
    var songToAddRemove = document.querySelector('.song-to-add[song-to-add="'+songToAddIndex+'"]');
    songToAddRemove.parentNode.removeChild( songToAddRemove );
  });
}

/*
  Appends the song to the display.
*/
function appendToSongDisplay( song, index ){
  /*
    Grabs the playlist element we will be appending to.
  */
  var playlistElement = document.querySelector('.white-player-playlist');

  /*
    Creates the playlist song element
  */
  var playlistSong = document.createElement('div');
  playlistSong.setAttribute('class', 'white-player-playlist-song amplitude-song-container amplitude-play-pause');
  playlistSong.setAttribute('data-amplitude-song-index', index);

  /*
    Creates the playlist song image element
  */
  var playlistSongImg = document.createElement('img');
  playlistSongImg.setAttribute('src', song.cover_art_url);

  /*
    Creates the playlist song meta element
  */
  var playlistSongMeta = document.createElement('div');
  playlistSongMeta.setAttribute('class', 'playlist-song-meta');

  /*
    Creates the playlist song name element
  */
  var playlistSongName = document.createElement('span');
  playlistSongName.setAttribute('class', 'playlist-song-name');
  playlistSongName.innerHTML = song.name;

  /*
    Creates the playlist song artist album element
  */
  var playlistSongArtistAlbum = document.createElement('span');
  playlistSongArtistAlbum.setAttribute('class', 'playlist-song-artist');
  playlistSongArtistAlbum.innerHTML = song.artist+' &bull; '+song.album;

  /*
    Appends the name and artist album to the playlist song meta.
  */
  playlistSongMeta.appendChild( playlistSongName );
  playlistSongMeta.appendChild( playlistSongArtistAlbum );

  /*
    Appends the song image and meta to the song element
  */
  playlistSong.appendChild( playlistSongImg );
  playlistSong.appendChild( playlistSongMeta );

  /*
    Appends the song element to the playlist
  */
  playlistElement.appendChild( playlistSong );
}