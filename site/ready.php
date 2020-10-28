<?php namespace ProcessWire;

/**
 * ProcessWire Bootstrap API Ready
 * ===============================
 * This ready.php file is called during ProcessWire bootstrap initialization process.
 * This occurs after the current page has been determined and the API is fully ready
 * to use, but before the current page has started rendering. This file receives a
 * copy of all ProcessWire API variables.
 *
 */



/**
 * 
 * Louis Stephens
 * 10/2/2020
 * Creates the various subpages of a client once created
 * 
 */



wire()->addHookAfter('Pages::added(template=clients)', function(HookEvent $event) {
    $page = $event->arguments(0);
    //bd($page);

    // Create Modal
    $p = new Page();
    $p->template = "groups";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "Modals";
    $p->name = "modals";
    $p->save();
    bd($p);

    // Create Specials
    $p = new Page();
    $p->template = "groups";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "Specials";
    $p->name = "specials";
    $p->save();

    // Create Slideshows
    $p = new Page();
    $p->template = "groups";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "Slideshows";
    $p->name = "slideshows";
    $p->save();

    // Create Form Submissions
    $p = new Page();
    $p->template = "groups";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "Submissions";
    $p->name = "submissions";
    $p->save();


});







// August 14th, 2019: keep this around
/*$wire->addHookAfter('Pages::added(template=modals)', function(HookEvent $event) {
    $page = $event->arguments(0);
    $p = new Page();
    $p->template = "modal-launch";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "Launch";
    $p->name = "launch";
    $p->save();
//bd($page);

    $p = new Page();
    $p->template = "modal-api";
    $p->parent = wire('pages')->get($page->id);
    $p->title = "API";
    $p->name = "api";
    $p->save();


}); */


// Create Script Page for $modals
/*$pages->addHookAfter('saved', function($event) {
    $page = $event->arguments[0];
    if($page->template->name == "modals") {
        $p = new Page();
        $u->template = "scripts";
        $u->parent = wire('pages')->get($page->id);
        $u->title = "Test";
        $u->name = "test";
    }
    else {}


});*/

/*wire()->addHookBefore('InputfieldPageTable::render', function ($event) {
    $pp = wire('pages')->get(wire('input')->get->id);
    $ptf = $event->object;

    //remove pages from pagetable field if they were externally trashed
    foreach ($pp->{$ptf->name} as $item) {
        if ($item->is(Page::statusTrash)) $pp->{$ptf->name}->remove($item);
    }

    //add pages to pagetable field if they were created externally
    foreach ($pp->children as $child) {
        if (!$ptf->has($child->id)) {
            $pp->{$ptf->name}->add($child);
            $pp->of(false);
            $pp->save($ptf->name);
        }
    }

    //reset orphans property so that we don't get a message asking to add new pages that are now already automatically added
    $ptf->setOrphans(new pageArray());
});*/
