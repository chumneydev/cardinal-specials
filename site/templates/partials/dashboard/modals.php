<?php namespace ProcessWire; ?>


<!-- Modal structure -->
<div id="modal-<?=$phase->id;?>"> <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
<form action="#" method="post">
                <input type="text" name="name" id="name" placeholder="Todo Name" />
                <input type="text" name="title" id="title" placeholder="Todo Item" />
                    <button type="submit" data-id="<?=$phase->id;?>" value="submit" class="item__add_submit">Submit</button>
			    </form>





    <!-- Modal content -->
</div>

