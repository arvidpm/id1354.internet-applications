<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="recipes-list">
    <div class="container">
        <h2>Welcome to Tasty Recipes</h2>
        <p>Below are the recipes available at the moment, or if you'd like to check them out in the calendar! </p>
        <p>Note that some of the links are not accessible at the moment, but pancakes and meatballs should be.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="<?php echo base_url('recipes/view/meatballs') ?>"><img
                            src="<?php echo base_url('resources/images/Turkey-meatballs.jpg') ?>" alt="Meatballs page"></a>
                    <div class="other-recipes"><h4>Turkey Meatballs</h4></div>
                </div>
                <div class="thumbnail">
                    <a href="<?php echo base_url('recipes/view/pancakes') ?>"><img
                            src="<?php echo base_url('resources/images/AppleOatPancakes_DT.jpg') ?>"
                            alt="Pancakes page"></a>
                    <div class="other-recipes"><h4>Honey-Oatmeal Pancakes</h4></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href=""><img src="<?php echo base_url('resources/images/icecream.jpg') ?>"
                                    alt="Colorful Icecream"></a>
                    <div class="other-recipes"><h4>Colorful Icecream</h4></div>
                </div>
                <div class="thumbnail">
                    <a href=""><img src="<?php echo base_url('resources/images/ultimate_BLT_sandwich.jpg') ?>"
                                    alt="Gorgeous BLT Sandwich"></a>
                    <div class="other-recipes"><h4>Ultimate BLT Sandwich</h4></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo base_url('resources/images/aschberg.jpg') ?>"
                         alt="The Chef Himself, Aschberg.">
                </div>
            </div>
        </div>
    </div>
</div>