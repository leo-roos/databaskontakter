<?php
$projects = [
    [
        "name" => "Summer House",
        "image" => "assets/house5_y6jI.jpg",
    ],
    [
        "name" => "Brick House",
        "image" => "assets/house2_y6jI.jpg",
    ],
    [
        "name" => "Renovated",
        "image" => "assets/house3_y6jI.jpg",
    ],
    [
        "name" => "Barn House",
        "image" => "assets/house4_y6jI.jpg",
    ],
];

?>

<section id="projects" class="w3-container w3-padding-32">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h2>

    <div class="w3-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
        <?php foreach ($projects as $key => $value): ?>
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding"><?php echo $value["name"] ?></div>
                <img src="<?php echo $value["image"] ?>" class="w3-image" style="width:100%" alt="<?php echo $value["name"] ?>">
            </div>
        <?php endforeach; ?>
    </div>
</section>