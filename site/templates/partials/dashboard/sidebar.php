<?php
    $projects = $pages->find("template=project");
?>

<div id="sidebar">
    <h2>Sidebar</h2>

    <h4>Projects <a href="#" class="add--project"><i class="fas fa-plus-square"></i></i></a></h4>
    <ul class="projects__list">

        <?php foreach($projects as $project): ?>
            <li><a href="<?=$project->url; ?>"><?=$project->title; ?></a></li>
        <?php endforeach; ?>




</div>
