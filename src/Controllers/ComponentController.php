<?php

namespace Grundmanis\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Content\Models\LaracmsComp;
use Grundmanis\Laracms\Modules\Content\Requests\ComponentRequest;

class ComponentController extends Controller
{

    /**
     * @var LaracmsComp
     */
    protected $component;

    /**
     * ContentController constructor.
     * @param LaracmsComp $component
     */
    public function __construct(LaracmsComp $component)
    {
        $this->component = $component;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.content::component.index', [
            'components' => $this->component->paginate(10)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $components = $this->component
            ->select('name')
            ->groupBy('name')
            ->get();

        return view('laracms.content::component.form', compact('components'));
    }

    /**
     * @param ComponentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ComponentRequest $request)
    {

        dd($request->all());

        $this->component->create($request->all());
        return redirect()->route('laracms.content.component')->with('status', 'Content created!');
    }

    /**
     * @param LaracmsComp $component
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsComp $component)
    {
        return view('laracms.content::component.form', compact('content'));
    }

    /**
     * @param LaracmsComp $component
     * @param ComponentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsComp $component, ComponentRequest $request)
    {
        $component->update($request->all());
        return back()->with('status', 'Content updated!');
    }

    /**
     * @param LaracmsComp $component
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsComp $component)
    {
        $component->delete();
        return redirect()->route('laracms.content.component')->with('status', 'Content deleted! Make sure to remove it from blade');
    }
}