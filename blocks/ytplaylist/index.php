<?php 
// Youtube feed
// global $yt_feed;
// print_r( $attributes);
$arrContextOptions=array(
    "ssl"=>array(
      "verify_peer"=>false,
      "verify_peer_name"=>false,
    ),
  );
if( $attributes['playlistID'] ) :
    // delete_transient( 'yt_feed-' . get_sub_field('channel_id') );
    if( false === ( $yt_feed = get_transient('yt_feed-' . $attributes['playlistID'] ) ) ) :
    
        $feed = curl_get_contents("https://www.youtube.com/feeds/videos.xml?playlist_id=" . $attributes['playlistID'] );
        $xml = new SimpleXmlElement($feed);
    
        $yt_feed = array();
    
        for ( $i = 0; $i < count( $xml->entry ); $i++ ) :
    
            $index = array(
                'title' => get_object_vars( $xml->entry[$i]->title )[0],
                'id' => str_replace("yt:video:","", get_object_vars( $xml->entry[$i]->id )[0] )
            );
        
            array_push( $yt_feed, $index );
    
        endfor;
    
        set_transient('yt_feed-' . $attributes['playlistID'], $yt_feed, DAY_IN_SECONDS );
    
  endif;
?>

<div class="flex flex-wrap justify-center lg:justify-start flex-wrap -mx-2 yt-player-wrapper">
    <div class="w-full lg:w-4/12 px-3 h-48 lg:h-96 mb-6">
        <div class="h-full overflow-hidden overflow-y-scroll border-b-4 border-t-4 border-grey-200 bg-white shadow-lg">
            
        <?php 
            foreach ( $yt_feed as $i => $item ) :
        ?>
            <div
                data-yt-vid="<?php echo $item['id'] ?>"
                class="-mx-2 flex items-center bg-white shadow hover:shadow-lg yt-feed-box cursor-pointer group rounded p-3 hover:bg-blue-50 transition duration-200 border-b border-grey-200 <?php if( $i === 0 ) : echo 'active'; endif; ?>">
                <div class="w-full px-2">
                    <p class=" m-0 text-xs md:text-sm font-bold"><?php echo $item['title']; ?></p>
                </div>
                <div class="w-10 text-center px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 play-btn">
                    <?php 
                        echo file_get_contents( get_theme_file_uri() . '/assets/src/icons/play-button.svg', false, stream_context_create( $arrContextOptions ) );
                    ?>
                </div>
                
            </div>
        
        <?php 
            endforeach;
        ?>
        </div>
    </div>

    <div class="w-full lg:w-8/12 px-3">
        <div class="relative h-0 mb-4 shadow-lg bg-black rounded overflow-hidden" style="padding-bottom: 56.25%;">
            <iframe 
                class="absolute w-full h-full inset-0 object-cover lazy transition-opacity duration-200 yt-feed-player"
                
                data-src="https://www.youtube-nocookie.com/embed/<?php echo $yt_feed[0]['id']; ?>?enablejsapi=1"
                data-yt-vid-id="<?php echo $yt_feed[0]['id']; ?>"
                frameborder="0"></iframe>
        </div>
    </div>
</div>


<?php 
endif;
?>