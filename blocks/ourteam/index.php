<?php 
    $groups = array(
        "leadership" => array(
            array(
                "name" => "Jim Douglas",
                "title" => "CEO",
                "img" => "jim-douglas-removebg.png"
            ),
            array(
                "name" => "Ben Mappen",
                "title" => "Customer Success",
                "img" => "ben-mappen-removebg.png"
            ),
            array(
                "name" => "Adam Frank",
                "title" => "Product & Marketing",
                "img" => "adam-frank-removebg.png"

            ),
            array(
                "name" => "Elaine Guan",
                "title" => "Finance",
                "img" => "elaine-guan-removebg.png",

            ),
      
            array(
                "name" => "Andrew Backes",
                "title" => "Engineering",
                "img" => "andrew-backes-removebg.png"

            ),
            array(
                "name" => "Jane Funk",
                "title" => "People",
                "img" => "jane-funk-removebg.png"
            
            ),
        ),
        "board" => array(
           
            array(
                "name" => "Phil Boyer",
                "title" => "Board Member",
                "img" => "phil-boyer-removebg.png",
            ),
            array(
                "name" => "Lonne Jaffe",
                "title" => "Board Member",
                "img" => "jaffe-lonne-removebg.png",
             
            ),
            array(
                "name" => "Rashmi Gopinath",
                "img" => "rashmi_gopinath-removebg.png",
                "title" => "Board Member",
           
            ),
          
            array(
                "name" => "DROdio",
                "title" => "Chairman of the Board <br />& Founding CEO of Armory",
                "img" => "drodio-removebg.png"
            ),
            array(
                "name" => "Ben Mappen",
                "title" => "Cofounder",
                "img" => "ben-mappen-removebg.png",
            ),
            array(
                "name" => "Jim Douglas",
                "title" => "CEO",
                "img" => "jim-douglas-removebg.png",
            ),
           
        )
    );
?>
<div class="">
    <div class="container">
        <div class="flex justify-center mb-12">
            <div class="w-11/12">
                <div class="flex items-center justify-center">
                    <?php 
                        foreach ($groups as $i => $group) :
                    ?>
                    <div id="tab-item-<?php echo $i; ?>" data-tab="<?php echo $i ?>" class="<?php echo $i === "leadership" ? "active" : "" ?> tab-item w-full font-semibold h-12 px-1 sm:px-2 md:px-6 ease-out border-b transition-all border-blue-primary cursor-pointer text-center text-blue-primary hover:opacity-100 duration-200 text-xs sm:text-sm md:text-base lg:text-lg md:whitespace-nowrap capitalize">                            
                        <?php echo $i; ?>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
        <div>
            <?php 
                foreach ($groups as $i => $group) :
            ?>

            <div id="tab-panel-<?php echo $i ?>"  class="group-wrapper tab-panel <?php echo $i === "leadership" ? "active" : "hidden" ?>">
              
                <div class="flex flex-wrap justify-center">
                    <?php 
                        foreach ($group as $j => $item) :
                    ?>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-6 py-6">
                        <div class="relative h-40 mb-2 " >
                            <img  class="mx-auto object-cover h-full block" src="<?php echo get_theme_file_uri( 'assets/images/leadership/' . $item["img"]) ?>" alt="<?php echo $item["name"]; ?> headshot">
                        </div>
                        <div class="">
                            <div class=" py-2 text-center">
                                <p class="m-0 text-xl  text-blue-primary"><?php echo $item["name"]; ?></p>
                            </div>
                            <div>
                                <hr class="w-20 mx-auto border-blue-primary m-0">
                            </div>
                            <div class=" text-center py-2">
                                <p class="m-0 text-md text-blue-primary"><?php echo $item["title"]; ?></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                        endforeach;
                    ?>
                </div>                   
            </div>
            <?php 
                endforeach;
            ?>  
        </div>
    </div>
</div>