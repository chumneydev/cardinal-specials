     <?php if(count($page->form_select_fields)): ?>
            <p>There are form elements selected</p>
            <?php foreach ($page->form_select_fields as $field): ?>
                
                <label for="<?= $field->name; ?>"><?= $field->label; ?></label>
                <input name="<?= $field->name; ?>" id="<?= $field->name; ?>" type="text" placeholder="<?= $field->label; ?>">

        
    
            <?php endforeach; ?>





        <?php else: ?>    
            <p>There are no elements selected</p>
        <?php endif; ?>