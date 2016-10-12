<div class="recipes-list">
    <div class="container">
        <?php foreach ($xml->recipe as $recipe) {
            echo "<h2>$recipe->title</h2>";
        } ?>
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href=""><img src="../../../resources/images/AppleOatPancakes_DT.jpg" alt="Pancakes page"></a>
                </div>
                <h4>Ingredients</h4>
                <ul>
                    <?php foreach ($recipe->ingredient->children() as $child) {
                        echo "<li> $child </li>";
                    } ?>
                </ul>
                <ul>
                    <?php foreach ($recipe->nutrition->children() as $child) {
                        echo "<li> $child </li>";
                    } ?>
                </ul>
            </div>
            <div class="col-md-5">
                <h4>Directions</h4>
                <?php foreach ($recipe->recipetext->children() as $child) {
                    echo "<p>$child </p>";
                } ?>
            </div>
            <div class="col-md-4">
                <div class="detailBox">
                    <div class="titleBox">
                        <label>Recipe comments</label>
                    </div>
