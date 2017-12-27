<?php

namespace MinhNhut\CaffeinatedModulesGui\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Caffeinated\Modules\Modules;

class ModulesGuiController extends Controller
{
    protected $modules = null;
    protected $theme = "classic";

    public function __construct(Modules $modules)
    {
        $this->modules = $modules;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $modules = $this->modules->all();
        $results = [];

        foreach ($modules as $module) {
            $results[] = [
                '#'           => $module['order'],
                'name'        => $module['name'],
                'slug'        => $module['slug'],
                'description' => $module['description'],
                'status'      => $this->modules->isEnabled($module['slug']),
            ];
        }

        return view(
            "caffeintaed-modules-gui::modules.{$this->theme}.list",
            [
                'modules' => $results
            ]
        );
    }

    public function activate(Request $request, $slug)
    {
        
        if ($this->modules->isDisabled($slug)) {
            $this->modules->enable($slug);
            $module = $this->modules->where('slug', $slug);

            event($slug.'.module.enabled', [$module, null]);

            $request->session()->flash('minhnhut.caffeinated.updateStatus', 'Module is enabled');
        } else {
            $request->session()->flash('minhnhut.caffeinated.updateStatus', 'Module is already enabled.');
        }
        return redirect()->back();
    }

    public function deactivate(Request $request, $slug)
    {

        if (!$this->modules->isDisabled($slug)) {
            $this->modules->disable($slug);
            $module = $this->modules->where('slug', $slug);

            event($slug.'.module.disabled', [$module, null]);

            $request->session()->flash('minhnhut.caffeinated.updateStatus', 'Module is disabled');
        } else {
            $request->session()->flash('minhnhut.caffeinated.updateStatus', 'Module is already disabled.');
        }
        return redirect()->back();
    }

}
