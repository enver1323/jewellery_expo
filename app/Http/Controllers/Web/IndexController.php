<?php


namespace App\Http\Controllers\Web;


use App\Domain\Comment\Entities\Comment;
use App\Domain\Core\Config\EditableConfig;
use App\Domain\Slide\Entities\Slide;
use App\Http\Requests\Comment\CommentCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class IndexController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Slide $slides
 * @property Comment $comments
 */
class IndexController extends WebController
{
    private $slides;
    private $comments;

    public function __construct(Slide $slides, Comment $comments)
    {
        $this->slides = $slides;
        $this->comments = $comments;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return $this->render('frontend.index.index', [
            'expoDate' => EditableConfig::find('expoDate'),
            'contacts' => EditableConfig::find('contacts'),
            'slides' => $this->slides->orderBy('order')->get()
        ]);
    }

    /**
     * @param CommentCreateRequest $request
     * @return RedirectResponse
     */
    public function createComment(CommentCreateRequest $request): RedirectResponse
    {
        $this->comments->create($request->validated());
        return redirect()->back();
    }
}
