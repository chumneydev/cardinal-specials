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


 wire()->addHook("PageArray::groupBy", function(HookEvent $event) {
	$out = array();

	$args = $event->arguments();

	if(count($args) == 0) throw new InvalidArgumentException("Missing arguments for function PageArray::groupBy, at least 1 required!");

	$last = count($args) - 1;

	$fnc = is_string($args[$last]) ? FALSE : array_pop($args);

	foreach($event->object as $pg) {
		if($fnc) {
			$props = call_user_func_array($fnc, array_merge(array($pg), $args));
		} else {
			$props = array_map(function($propname) use($pg) { return $pg->{$propname}; }, $args);
		}

		$cur = &$out;

		foreach($props as $prop) {
			if(!isset($cur[$prop])) $cur[$prop] = array();
			$cur = &$cur[$prop];
		}

		$cur[] = $pg;
	}


    $event->return = $out;



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

wire()->addHookBefore('InputfieldPageTable::render', function ($event) {
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
});
