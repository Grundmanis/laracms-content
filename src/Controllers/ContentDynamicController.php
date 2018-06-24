<?php

namespace Grundmanis\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Content\Models\LaracmsContentDynamic;
use Grundmanis\Laracms\Modules\Content\Requests\ContentRequest;
use Illuminate\Http\Request;

class ContentDynamicController extends Controller
{

    /**
     * @var LaracmsContentDynamic
     */
    protected $contentDynamic;

    /**
     * ContentDynamicController constructor.
     * @param LaracmsContentDynamic $contentDynamic
     */
    public function __construct(LaracmsContentDynamic $contentDynamic)
    {
        $this->contentDynamic = $contentDynamic;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.content::dynamic.index', [
            'contentDynamics' => $this->contentDynamic->paginate(10)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('laracms.content::dynamic.form');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

        return $request->all();
        $data = [];
        $fields = $request->fields;
        foreach ($request->values as $index => $chunk) {
            foreach ($chunk as $key => $value) {
                $data[$index][$key] = [
                    'name' => $fields[$key]['name'],
                    'type' => $fields[$key]['type'],
                    'content' => $value
                ];
            }
        }

        return $data;

        return $request->all();
        return redirect()->route('laracms.content.dynamic')->with('status', 'Content created!');
    }

    /**
     * @param LaracmsContentDynamic $contentDynamic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsContentDynamic $contentDynamic)
    {
        return view('laracms.content::dynamic.form', compact('contentDynamic'));
    }

    /**
     * @param LaracmsContentDynamic $contentDynamic
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsContentDynamic $contentDynamic, ContentRequest $request)
    {
        $contentDynamic->update($request->all());
        return back()->with('status', 'Content updated!');
    }

    /**
     * @param LaracmsContentDynamic $contentDynamic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsContentDynamic $contentDynamic)
    {
        $contentDynamic->delete();
        return redirect()->route('laracms.content.dynamic')->with('status',
            'Content deleted! Make sure to remove it from blade');
    }
}