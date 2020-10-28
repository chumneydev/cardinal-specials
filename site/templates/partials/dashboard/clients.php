<?php
    $parent = $pages->get("/clients/");
    $clients = $parent->children;
?>
        
<!-- loop through clients -->
<?php foreach ($clients as $client): ?>
<?php foreach ($client->children as $services): ?>
<?php foreach ($services->children as $service): ?>

<?php
    $parentCode = $service->parent->parent->title;
    $parentCodeLower = strtolower($service->parent->parent->name);
    $parentName = $service->parent->parent->client_name;
    $serviceName = strtolower($service->parent->name);
?>

<!-- client -->
<div class="wrap mix <?= $parentCodeLower; ?> <?= $serviceName; ?>">
    <div class="client">

        <div class="type <?= $serviceName; ?>">
            <i class="fal fa-cubes"></i>
        </div>

        <h2><?= $parentCode; ?></h2>
        <p><?= $parentName; ?></p>




    </div>
</div>
<!-- client -->









<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
<!-- loop through clients -->
        