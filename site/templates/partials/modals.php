<!-- Modal: Add Client -->
<div id="add-client">
    <form action="" method="get" id="form1">
        <input type="text" name="clientname" placeholder="Client Name">
        <input type="text" name="clientcode" placeholder="Client Code">
        <select>
            <?php foreach($users as $u): ?>
                <option value="<?= $u->user_full_name; ?>"><?= $u->user_full_name; ?></option>
            <?php endforeach; ?>

        </select>

    </form>
</div>


<!-- Modal: Add Special -->
<div id="add-special">
    <form action="" method="get" id="form2">
        <input type="text" name="clientname" placeholder="Client Name">
        <input type="text" name="clientcode" placeholder="Client Code">
        <select>
            <?php foreach($users as $u): ?>
                <option value="<?= $u->user_full_name; ?>"><?= $u->user_full_name; ?></option>
            <?php endforeach; ?>

        </select>

    </form>
</div>

<!-- Modal: Add Modal -->
<div id="add-modal">
    <form action="" method="get" id="form3">
        <input type="text" name="clientname" placeholder="Client Name">
        <input type="text" name="clientcode" placeholder="Client Code">
        <select>
            <?php foreach($users as $u): ?>
                <option value="<?= $u->user_full_name; ?>"><?= $u->user_full_name; ?></option>
            <?php endforeach; ?>

        </select>

    </form>
</div>



