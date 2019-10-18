<?php
 namespace ProcessWire;
 ?>

<div class="container">
    <div class="header">
        <ul id="admin-actions">
            <li><i class="far fa-columns"></i>Your Dashboard</li>
            <li><i class="far fa-browser"></i>Add New Client</li>
            <li><i class="far fa-clone"></i>Add New Special</li>


        </ul>
            
    </div>
    
    <?php
$myPages = $pages->find('template=basic-page');
// extract required fields into plain array
$data = $myPages->explode(['title', 'summary', 'body']);
echo wireEncodeJSON($data);
?>

    <div class="sidebar">
       <h3>Client List</h3> 
    <?php $current = $pages->find("template=clients, client_rep=$user"); ?>

    <?php foreach($current as $list): ?>
    <ul class="client-list">
        <li><?=$list->title; ?></li>
        <ul>

        <?php foreach($list->children as $child): ?>
            <li><a href="<?=$child->url; ?>"><i class="far fa-edit"></i></a><?=$child->title; ?></li>

        <?php endforeach; ?>
    </ul>
    </ul>
    
        <?php endforeach; ?>
            






    </div> <!-- End Sidebar -->
    
    <div class="content">
        <div id="specials-expired"></div>
        <div id="specials-pause"></div>
        <div id="specials-running"></div>


    </div>
</div> <!-- End Container -->





<!--
<div class="content-overview">
    <div class="content-overview--item">
        <h1 id="totalTodos">0</h1>
    </div>
    
    <div class="content-overview--item">
        <div id="chart">g</div>
    </div>
    <div class="content-overview--item"><i class="fal fa-chart-line"></i></div>
</div>

<div id="code">
    <h3>Specials</h3>
    <ul id="titles"></ul>
</div>

-->


