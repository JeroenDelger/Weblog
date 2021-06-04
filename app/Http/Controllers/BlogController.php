<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weblogblog;
use App\Models\Categories;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use App\Jobs\SendNewsletterMail;

// todo: deze class verwijderen want wordt niet gebruikt?
class WebhookController extends CashierController
{
    /**
     * Handle invoice payment succeeded.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleInvoicePaymentSucceeded($payload)
    {
        // Handle the incoming event...
    }
}

class BlogController extends Controller
{
    // todo: route-model binding toepassen
    public function blogview($id)
    {
        return view('blog', [
            'blog' => Weblogblog::where('id', $id)->firstOrFail()

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weblogblog = Weblogblog::latest()->get();
        $categories = Categories::all();
        return view('overview', [
            'weblogblog' => $weblogblog,
            'categories' => $categories
        ]);
    }

    public function getblogpostbycategories(Request $request)
    {
        $CatIDs = $request->categorie_ids;

        $checkedCat = Weblogblog::whereHas('categoriesid', function (Builder $query) use ($CatIDs) {
            $query->whereIn('categorie_id', $CatIDs);
        })->latest()->get();
        return view('UserRoleCheckerOverview', ['weblogblog' => $checkedCat]);
    }

    public function writerinterface()
    {
        $weblogblog = Weblogblog::latest()->get();
        return view('writerinterface', [
            'weblogblog' => $weblogblog,
        ]);
    }

    public function indexnewblog()
    {
        $categories = Categories::all();
        return view('newblog', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // todo: zet validation rules in aparte request validator: https://laravel.com/docs/8.x/validation#form-request-validation
        $validated = request()->validate([
            'title' => 'required',
            'blog'  => 'required',
            'comment' => 'nullable',
            'premium' => 'boolean',
            'categories' => 'required',
            'photoname'  => 'nullable',
            'image' => 'mimes:jpeg,png|max:1014',
            'writer_id' => 'required',
            'foto_comment' => 'nullable',
        ]);
        if (isset($validated['photoname'])) {
            $extension = $request->image->extension();
            $request->image->storeAs('/WeblogFotos', $validated['photoname'] . "." . $extension);
            Storage::url($validated['photoname'] . "." . $extension);
            $validated['photoname'] = ('/' . $validated['photoname'] . "." . $extension);
        }
        Weblogblog::create($validated)->categoriesid()->sync($request->categories);
        return redirect('/overview');
    }

    public function postcomment(Request $request)
    {
        Comment::create(request()->validate(
            [
                'commentbody' => 'required',
                'user_id'  => 'required',
                'blog_id' => 'required',
            ]
        ));
        return redirect('/overview');
    }

    public function deleteblog()
    {
        $delete_id = request()->validate([
            'blog_del_id' => 'required',
        ]);
        Comment::where('blog_id', '=', $delete_id)->delete();
        Weblogblog::where('id', '=', $delete_id)->delete();
        return redirect('/overview');
    }

    public function editblog()
    {
        $edit_id = request()->validate([
            'blog_edit_id' => 'required',
        ]);
        $editblog = Weblogblog::where('id', '=', $edit_id)->first();
        $categories = Categories::all();
        return view('edit', [
            'blog' => $editblog,
            'categories' => $categories
        ]);
    }

    public function UpdateBlog(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required',
            'blog'  => 'required',
            'comment' => 'nullable',
            'premium' => 'boolean',
            'categories' => 'required',
            'photoname'  => 'nullable',
            'image' => 'mimes:jpeg,png|max:1014',
            'id' => 'required',
        ]);
        if (isset($validated['photoname'])) {
            $extension = $request->image->extension();
            $request->image->storeAs('/WeblogFotos', $validated['photoname'] . "." . $extension);
            Storage::url($validated['photoname'] . "." . $extension);
            $validated['photoname'] = ('/' . $validated['photoname'] . "." . $extension);
        }
        $updateblog = Weblogblog::where('id', '=', $validated['id'])->first();
        $updateblog->update($validated);
        $updateblog->categoriesid()->sync($request->categories);
        return redirect('/overview');
    }

    public function SendNewsletter(Request $request)
    {
        $details = ['email' => 'Jeroen_delger@hotmail.com'];
        SendNewsletterMail::dispatchNow($details);
    }
}
