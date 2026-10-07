<?php
$team = [
    [
        "name" => "John Doe",
        "role" => "CEO &amp; Founder",
        "description" => "Phasellus eget enim eu lectus faucibus vestibulum.",
        "image" => "assets/team2_y6jI.jpg",
    ],
    [
        "name" => "Jane Doe",
        "role" => "Architect",
        "description" => "Phasellus eget enim eu lectus faucibus vestibulum.",
        "image" => "assets/team1_y6jI.jpg",
    ],
    [
        "name" => "Mike Ross",
        "role" => "Architect",
        "description" => "Phasellus eget enim eu lectus faucibus vestibulum.",
        "image" => "assets/team3_y6jI.jpg",
    ],
    [
        "name" => "Dan Star",
        "role" => "Architect",
        "description" => "Phasellus eget enim eu lectus faucibus vestibulum.",
        "image" => "assets/team4_y6jI.jpg",
    ],
];

?>

<section id="about" class="w3-container w3-padding-32">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h2>
    <div class="w3-grid w3-grayscale" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
        <?php foreach ($team as $key => $value): ?>
            <div>
                <img src="<?php echo $value["image"] ?>" class="w3-image" alt="<?php echo $value["name"] ?>" style="width:100%">
                <h3><?php echo $value["name"] ?></h3>
                <p class="w3-opacity"><?php echo $value["role"] ?></p>
                <p><?php echo $value["description"] ?></p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>