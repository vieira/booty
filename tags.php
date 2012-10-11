<?php //ADDs tags to the bottom of the post if they exist
        $listtag = get_the_tag_list('<strong>Related topics:</strong> ',' <i class="icon-search"></i> ',' <i class="icon-search"></i>');
        if($listtag){
                $mhtml="<div class='alert alert-info'>$listtag</div>";
                echo $mhtml;
        }
?>
