import YouTubePlayer from "youtube-player";

const customYoutubeEmbed = Array.prototype.slice.call(
    document.querySelectorAll(".custom-youtube-embed")
);

// global variable for the player
let ytPlayers = [];

customYoutubeEmbed.forEach((yt, i) => {
    const trigger = yt.querySelector(".custom-youtube-embed-trigger");
    const ytIframe = yt.querySelector(".custom-youtube-embed-iframe");

    ytPlayers.push(YouTubePlayer(ytIframe));

    yt.addEventListener("click", (e) => {
        trigger.classList.add("hidden");

        ytPlayers[i].playVideo();
    });
});
