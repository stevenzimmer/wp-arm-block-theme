
<?php

$uberflip_client_id = get_field("uberflip_client_id", "option");
$uberflip_client_secret = get_field("uberflip_client_secret", "option");
$uberflip_stream_id = isset($attributes["streamID"]) ? $attributes["streamID"] : "";

if ($uberflip_stream_id):
    // delete_transient( 'uberflip_stream-' . $uberflip_stream_id );

    if (
        false ===
        ($uberflip_stream = get_transient(
            "uberflip_stream-" . $uberflip_stream_id
        ))
    ):
        $authorization = get_uberflip_auth(
            $uberflip_client_id,
            $uberflip_client_secret
        );
        $stream = get_uberflip_stream($uberflip_stream_id, $authorization);
        $uberflip_stream = [];

        foreach ($stream->data as $i => $data):
            if ($i !== 0):
                $index = [
                    "thumbnail_url" => $data->thumbnail_url,
                    "url" => $data->url,
                    "title" => $data->title,
                    "duration" => $data->duration,
                    "type" => $data->type,
                ];

                array_push($uberflip_stream, $index);
            endif;
        endforeach;

        set_transient(
            "uberflip_stream-" . $uberflip_stream_id,
            $uberflip_stream,
            DAY_IN_SECONDS
        );
    endif; ?>

<div class="flex flex-wrap justify-center lg:justify-start -mx-6 mb-6">
    <?php foreach ( $uberflip_stream as $i => $item ) : ?>
    <div class="w-11/12 sm:w-9/12 md:w-6/12 lg:w-1/4 px-6 mb-6 lg:mb-0">
        <div class="shadow hover:shadow-lg group transition duration-200 h-full relative bg-white">
            <a href="<?php echo $item[
                "url"
            ]; ?>" class="absolute w-full h-full inset-0 z-50 "></a>
            <div class="relative h-0" style="padding-bottom: 56.25%">
            <?php
            if ($item["thumbnail_url"]): ?>
                <img 
                    class="absolute w-full h-full inset-0 object-cover lazy" 
                    data-src="<?php echo $item["thumbnail_url"]; ?>" 
                    alt="<?php echo $item["title"]; ?> thumbnail"
                />
            <?php else: ?>
                <div class="absolute w-full h-full inset-0 bg-grey-200">
                    <div class="flex items-center w-full justify-center h-full">
                        <div class="w-full text-center">
                            <p class="font-bold m-0">
                                <?php if ($item["type"] === "videos"):
                                    echo "Featured Webinar";
                                else:
                                    echo "Upcoming Webinar";
                                endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif;

            if (
                $item["duration"] &&
                $item["duration"] !== "00:00:00"
            ): ?>
                <div class="absolute bottom-0 right-0">
                    <div class="bg-black bg-opacity-50 p-1">
                        <p class="text-white m-0 text-sm"><?php echo $item[
                            "duration"
                        ]; ?></p>
                    </div>
                </div>
            <?php endif;
            ?>
            </div>
            
            <div class="p-3 border-b group-hover:bg-blue-50 transition-colors duration-200">
                <div class=" overflow-hidden h-24">
                    <p class="m-0 text-sm md:text-base text-grey-500 font-bold max-lines max-lines-4"><?php echo $item[
                        "title"
                    ]; ?></p>
                </div>
                
            </div>
            <div class="p-3">
                <p class=" m-0 font-bold text-blue-400 text-xs md:text-sm" ><?php if (
                    $item["type"] === "videos"
                ):
                    echo "Watch Webinar";
                else:
                    echo "Register Now";
                endif; ?> <span class="transform inline-block transition-transform group-hover:translate-x-1 text-xs">&#8594;</span></p>
            </div>
            
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php
    endif; 
?>
