<?php

namespace Grundmanis\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Content\Models\LaracmsContent;
use Grundmanis\Laracms\Modules\Content\Requests\ContentRequest;

class ContentController extends Controller
{
    /**
     * @var LaracmsContent
     */
    protected $content;

    /**
     * ContentController constructor.
     * @param LaracmsContent $content
     */
    public function __construct(LaracmsContent $content)
    {
        $this->content = $content;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $view = view()->exists('laracms.content.index') ? 'laracms.content.index' : 'laracms.content::index';

        return view($view, [
            'contents' => $this->content->paginate(10)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $view = view()->exists('laracms.content.form') ? 'laracms.content.form' : 'laracms.content::form';

        return view($view);
    }

    /**
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentRequest $request)
    {
        $this->content->create($request->all());

        return redirect()->route('laracms.content')->with('status', 'Content created!');
    }

    /**
     * @param LaracmsContent $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsContent $content)
    {
        $view = view()->exists('laracms.content.form') ? 'laracms.content.form' : 'laracms.content::form';

        return view($view, compact('content'));
    }

    /**
     * @param LaracmsContent $content
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsContent $content, ContentRequest $request)
    {
        $content->update($request->all());

        return back()->with('status', 'Content updated!');
    }

    /**
     * @param LaracmsContent $content
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsContent $content)
    {
        $content->delete();

        return redirect()->route('laracms.content')->with('status', 'Content deleted! Make sure to remove it from blade');
    }
}