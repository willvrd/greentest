<?php

namespace Modules\Greentest\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterGreentestSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {   

        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('greentest::businesses.title.businesses'), function (Item $item) {
                $item->icon('fa fa-file');
                $item->weight(10);
                $item->route('admin.greentest.business.index');
                $item->authorize(
                    $this->auth->hasAccess('greentest.businesses.index')
                );
            });
        });

        return $menu;
    }
}
