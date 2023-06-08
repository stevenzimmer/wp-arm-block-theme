<?php 
require get_theme_file_path( "/partials/navigation/inc/learn.php" );

?>
<div class="flex justify-center flex-wrap">
    <div class="w-11/12 lg:w-3/5">
        <div class="flex justify-start flex-wrap h-full">
        
            <div class="w-full lg:w-1/4 xl:w-1/3 py-3 lg:py-0">
           
            <?php 
                foreach( $developers as $i => $developer ) :
            ?>
                <?php 
                    echo dropdownCol($developer);
                ?>
            <?php 
                endforeach;
            ?>
         
            
            </div>
            <div class="w-full lg:w-1/2 xl:w-1/3 py-3 lg:py-0">
       
            <?php 
                foreach( $intros as $i => $intro ) :
            ?>
                <?php 
                    echo dropdownCol($intro);
                ?>
            <?php 
                endforeach;
            ?>
       

            </div>
            <div class="w-full lg:w-1/4 xl:w-1/3">
          
             <?php 
                foreach( $resources as $i => $resource ) :
            ?>
                <?php 
                    echo dropdownCol($resource);
                ?>
            <?php 
                endforeach;
            ?>
        
          
            </div>
       
        </div>
    </div>
    <div class="w-full lg:w-2/5">
        <div class="h-full lg:block bg-grey-100 w-full lg:px-3 py-3 lg:py-0">
        <?php 
            foreach( $usecases as $i => $usecase ) :
        ?>
            <div class="flex justify-center  py-3 lg:py-6 ">
                <div class="w-full px-3">
                    <div class="border-b border-blue-light py-1 pr-2 inline-block">
                    
                        <a href="<?php echo $usecase["url"]; ?>" class="text-blue-light font-semibold whitespace-nowrap m-0 no-underline hover:no-underline"><?php echo $usecase['header']; ?></a>
                    
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap pb-6">
            <?php 

                foreach ($usecase['items'] as $i => $item) :
            ?>
                <div class="w-full lg:w-1/2 px-3 mb-3 ">
                    <a class="text-blue-light block font-semibold no-underline" href="<?php echo $item["link"]; ?>"><?php echo $item["title"]; ?></a>
                          
                </div>

            <?php
                endforeach;
            ?>
             </div>
            <?php
            
            endforeach;
        ?>
        </div>
    </div>
</div>
