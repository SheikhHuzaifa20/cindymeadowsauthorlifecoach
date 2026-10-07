<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schedule;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Illuminate\Support\Facades\Mail;
use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Newsletter;
use App\Models\Inquiry;
use App\Mail\ContactFormMail;
use App\Mail\NewsletterMail;
use Image;

class HomeController extends Controller
{
    use HelperTrait;

    public function __construct()
    {
        //$this->middleware('auth');

        try {
            $logo = imagetable::select('img_path')->where('table_name', '=', 'logo')->first();
            $favicon = imagetable::select('img_path')->where('table_name', '=', 'favicon')->first();
            View()->share('logo', $logo);
            View()->share('favicon', $favicon);
        } catch (\Exception $e) {
            View()->share('logo', null);
            View()->share('favicon', null);
        }
    }

    /**
     * Homepage
     */
    public function index()
    {
        $page = DB::table('pages')->where('id', 1)->first();
        $blogs = Blog::where('status', 1)->orderBy('sort_order')->get();
        $banner = DB::table('banners')->where('id', 1)->first();
        $testimonial = DB::table('testimonial')->where('status', 1)->get();
        $page = DB::table('pages')->where('id', 1)->first();
        $section = DB::table('sections')->where('page_id', 1)->get();

        return view('welcome', compact('page', 'blogs', 'banner', 'testimonial', 'page', 'section'));
    }

    public function aboutAuthor()
    {
        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('sections')->where('page_id', 2)->get();
        $banner = DB::table('banners')->where('id', 1)->first();

        return view('about-author', compact('page', 'section' , 'banner'));
    }

    public function aboutBook()
    {
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('sections')->where('page_id', 5)->get();
        $amazon = DB::table('m_flag')->where('id', 4)->first();
        $banner = DB::table('banners')->where('id', 1)->first();

        return view('about-book', compact('page', 'section' , 'amazon' , 'banner'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->orderBy('sort_order')->get();
        $page = DB::table('pages')->where('id', 3)->first();
        $banner = DB::table('banners')->where('id', 1)->first();

        return view('blogs', compact('blogs' , 'page' , 'banner'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('status', 1)
            ->get()
            ->first(function ($b) use ($slug) {
                return \Illuminate\Support\Str::slug($b->title) === $slug;
            });

        if (!$blog) {
            abort(404);
        }

        $blog->load('sections', 'comments');
        $banner = DB::table('banners')->where('id', 1)->first();

        return view('blog-detail', compact('blog' , 'banner'));
    }

    public function contact()
    {
        $banner = DB::table('banners')->where('id', 1)->first();
        $phone = DB::table('m_flag')->where('id', 1)->first();
        $email = DB::table('m_flag')->where('id', 5)->first();
        $page = DB::table('pages')->where('id', 4)->first();

        return view('contact-us' , compact('banner' , 'phone' , 'email' , 'page'));
    }

    /**
     * Submit contact form → save to DB + email admin
     */
    public function careerSubmit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'notes' => 'required|string|max:10000',
        ]);

        // Save to inquiries DB
        Inquiry::create([
            'fname'     => $data['name'] ?? '',
            'email'     => $data['email'] ?? '',
            'phone'     => $data['phone'] ?? '',
            'notes'     => $data['notes'] ?? '',
            'form_name' => 'contact',
        ]);

        $adminEmail = config('mail.admin_address');
        if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
            \Log::error('Contact email delivery skipped: MAIL_TO_ADMIN is missing or invalid.');
            $recipients = [[$data['email'], new \App\Mail\ContactConfirmationMail($data)]];
        } else {
            $recipients = [
                [$adminEmail, new ContactFormMail($data)],
                [$data['email'], new \App\Mail\ContactConfirmationMail($data)],
            ];
        }

        $mailErrors = [];
        foreach ($recipients as [$recipient, $mail]) {
            try {
                Mail::to($recipient)->send($mail);
            } catch (\Throwable $exception) {
                $mailErrors[] = $recipient;
                \Log::error('Contact email delivery failed.', [
                    'recipient' => $recipient,
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Your message was submitted successfully. Thank you for contacting us!',
            'saved' => true,
            'email_sent' => empty($mailErrors),
            'status' => true,
        ]);
    }

    /**
     * Submit newsletter → save to DB + email admin
     */
    public function newsletterSubmit(Request $request)
    {
        $validated = $request->validate([
            'newsletter_email' => 'required|email|max:255',
        ]);
        $email = $validated['newsletter_email'];

        $exists = Newsletter::where('newsletter_email', $email)->count();

        if ($exists === 0) {
            Newsletter::create(['newsletter_email' => $email]);

            $adminEmail = config('mail.admin_address');
            if (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                \Log::error('Newsletter email delivery skipped: MAIL_TO_ADMIN is missing or invalid.');
                $recipients = [[$email, new \App\Mail\NewsletterConfirmationMail($email)]];
            } else {
                $recipients = [
                    [$adminEmail, new NewsletterMail($email)],
                    [$email, new \App\Mail\NewsletterConfirmationMail($email)],
                ];
            }

            $mailErrors = [];
            foreach ($recipients as [$recipient, $mail]) {
                try {
                    Mail::to($recipient)->send($mail);
                } catch (\Throwable $exception) {
                    $mailErrors[] = $recipient;
                    \Log::error('Newsletter email delivery failed.', [
                        'recipient' => $recipient,
                        'error' => $exception->getMessage(),
                    ]);
                }
            }

            return response()->json([
                'message' => 'You have subscribed to our newsletter successfully. Thank you!',
                'saved' => true,
                'email_sent' => empty($mailErrors),
                'status' => true,
            ]);
        } else {
            return response()->json([
                'message' => 'This email is already subscribed to our newsletter.',
                'status'  => false,
            ]);
        }
    }

    /**
     * Submit blog comment (frontend)
     */
    public function blogCommentSubmit(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blog,id',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'comment' => 'required|string',
        ]);

        BlogComment::create([
            'blog_id' => $request->blog_id,
            'name'    => $request->name,
            'email'   => $request->email,
            'website' => $request->website,
            'comment' => $request->comment,
            'status'  => 'pending',
        ]);

        return response()->json([
            'message' => 'Your comment has been submitted and is pending review. Thank you!',
            'status'  => true,
        ]);
    }

    public function updateContent(Request $request)
    {
        $id          = $request->input('id');
        $keyword     = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');

        if ($keyword == 'page') {
            $update = DB::table('pages')->where('id', $id)->update(['content' => $htmlContent]);
            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        } elseif ($keyword == 'section') {
            $update = DB::table('section')->where('id', $id)->update(['value' => $htmlContent]);
            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        }
    }
}
