<?php

namespace Grundmanis\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Content\Models\LaracmsContent;
use Grundmanis\Laracms\Modules\Content\Requests\ContentRequest;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $view = view()->exists('laracms.content.index') ? 'laracms.content.index' : 'laracms.content::index';

        $content = $this->content;

        if ($request->q) {
            $content = $content
                ->where('slug', 'LIKE', '%'. $request->q .'%')
                ->orWhereTranslationLike('value', '%'. $request->q .'%')
            ;
        }

        return view($view, [
            'contents' => $content->paginate(config('laracms.per_page'))
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

        return redirect()->route('laracms.content')->with('status', __('laracms::admin.content_created'));
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

        return back()->with('status', __('laracms::admin.content_updated'));
    }

    /**
     * @param LaracmsContent $content
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsContent $content)
    {
        $content->delete();

        return redirect()->route('laracms.content')->with('status', __('laracms::admin.content_deleted'));
    }
}