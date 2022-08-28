
<link rel="stylesheet" href="./css/rating.css">

<span style="right:7px; position:fixed; top:70px ; text-align:center;filter:none;">
<h2 >Rating: <?php echo round(getFeedbackVisitAvg(),2); ?></h2>

<div class="rating" >
<span class="rating__result"></span>
    
    <?php   $rating = floor(getFeedbackVisitAvg());
            $reste = 5 - $rating;

            while($rating > 0){ ?>

                <i class=" fas fa-star" style="font-size: 1.3em; color: #dabd18b2;" ></i>
                <?php $rating--;
            }
            while($reste > 0){ ?>

                <i class=" far fa-star" style="font-size: 1.3em; color: #dabd18b2;" ></i>
                <?php $reste--;
            }
    ?>

</div>
</span>