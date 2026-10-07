<?php
$links = [
    [
        "label" => "Projects",
        "href" => "#projects",
    ],
    [
        "label" => "About",
        "href" => "#about",
    ],
    [
        "label" => "Contact",
        "href" => "#contact",
    ],
    [
        "label" => "Dashboard",
        "href" => "admin/",
    ],
]
?>


<div class="w3-flex w3-top w3-white w3-wide w3-padding w3-card" style="max-width:1500px">
    <a href="#home" class="w3-button">
        <b>BR</b> Architects
    </a>
    <nav class="w3-flex w3-hide-small" style="margin-left:auto">
        <?php foreach ($links as $key => $value): ?>
            <a href="<?php echo $value['href'] ?>" class="w3-button"><?php echo $value['label'] ?></a>
        <?php endforeach; ?>
    </nav>
</div>