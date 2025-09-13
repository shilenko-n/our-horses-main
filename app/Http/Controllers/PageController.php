<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use App\Models\DiaryTopic;
use App\Models\Horse;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * Главная страница
     *
     * @return View
     */
    public function home(): View
    {
        $popularHorses = Horse::all()->take(4);
        $offers = Offer::all()->take(4);

        return view('pages.home', compact('popularHorses', 'offers'));
    }


    /**
     * Страница пользователя
     *
     * @return View
     */
    public function userProfile(): View
    {
        $user = auth()->user();
        return view('user.profile', [
            'user'      => $user,
            'isSelf'    => true,
        ]);
    }

    /**
     * Страница другого пользователя
     *
     * @param string $nickname
     * @return View|RedirectResponse
     */
    public function userProfileShow(string $nickname): View|RedirectResponse
    {
        $user = User::query()->where('nickname', $nickname)->first();

        if(!$user)
            throw new NotFoundHttpException();

        return view('user.profile', [
            'user'      => $user,
            'isSelf'    => auth()->check() && auth()->id() == $user->id,
        ]);
    }

    /**
     * Страница настроек пользователя
     *
     * @return View
     */
    public function userSettings(): View
    {
        return view('user.settings');
    }

    /**
     * Страница личные данные и безопасность
     *
     * @return View
     */
    public function userSettingsPersonal(): View
    {
        return view('user.settings.personal');
    }

    /**
     * Страница лошадей
     *
     * @param string|null $nickname
     * @return View
     */
    public function userMyHorses(?string $nickname = null): View
    {
        $user = auth()->user();

        if($nickname) {
            $user = User::query()->where('nickname', $nickname)->first();
        }

        if(!$user) abort(404);

        $horses = $user
            ->horses()
            ->published()
            ->get();

        $moderatingHorses = $user
            ->horses()
            ->moderating()
            ->get();

        $draftHorses = $user
            ->horses()
            ->draft()
            ->get();

        return view('user.horses.list', compact('user', 'horses', 'draftHorses', 'moderatingHorses'));
    }

    /**
     * Страница добавления лошади
     *
     * @return View
     */
    public function userAddHorse(): View
    {
        return view('user.horses.data');
    }

    // Подписки

    public function subscribers(?string $nickname = null): View
    {
        $user = Auth::user();

        if($nickname) {
            $user = User::query()
                ->where('nickname', $nickname)
                ->first();
        }

        if(!$user) abort(404);

        $users = $user->subscriptions()->paginate(1);

        return view('user.subscribers.user', [
            'user'  => $user,
            'users' => $users,
        ]);
    }

    /**
     * Страница подписок на других пользователей
     *
     * @param string|null $nickname
     * @return View
     */
    public function userSubscribers(?string $nickname = null): View
    {
        $user = Auth::user();

        if($nickname) {
            $user = User::query()
                ->where('nickname', $nickname)
                ->first();
        }

        if(!$user) abort(404);

        $userSubscriptions = $user->userSubscriptions()->paginate(1);

        return view('user.subscribers.users', [
            'user' => $user,
            'userSubscriptions' => $userSubscriptions,
        ]);
    }

    public function horsesSubscribers(?string $nickname = null): View
    {
        $user = Auth::user();

        if($nickname) {
            $user = User::query()
                ->where('nickname', $nickname)
                ->first();
        }

        if(!$user) abort(404);

        $horsesSubscriptions = $user->horseSubscriptions()->paginate(1);

        return view('user.subscribers.horses', [
            'user' => $user,
            'horsesSubscriptions' => $horsesSubscriptions,
        ]);
    }

    public function breedsSubscribers(?string $nickname = null): View
    {
        $user = Auth::user();

        if($nickname) {
            $user = User::query()
                ->where('nickname', $nickname)
                ->first();
        }

        if(!$user) abort(404);


        $horseBreedsSubscriptions = $user->horseBreedSubscriptions()->paginate(1);

        return view('user.subscribers.breeds', [
            'user' => $user,
            'horseBreedsSubscriptions' => $horseBreedsSubscriptions,
        ]);
    }

    // Авторизация

    /**
     * Страница авторизации
     *
     * @return View
     */
    public function authLogin(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Страница регистрации
     *
     * @return View
     */
    public function authRegistration(): View
    {
        return view('pages.auth.registration');
    }

    /**
     * Страница подтверждения почты (после регистрации)
     *
     * @return RedirectResponse|View|Factory
     */
    public function authRegistrationComplete(): RedirectResponse|View|Factory
    {
        if(auth()->check() && auth()->user()->hasVerifiedEmail())
            return redirect()->route('pages.user.profile');

        if(!session('email'))
            return redirect()->route('pages.home');

        return view('pages.auth.registration-complete');
    }


    /**
     * Страница сброса пароля
     *
     * @return View
     */
    public function resetPassword(): View
    {
        return view('pages.auth.reset-password');
    }

    /**
     * @return View
     */
    public function resetPasswordSend(): View
    {
        return view('pages.auth.reset-password-send');
    }

    public function resetPasswordShow(string $token): View
    {
        return view('pages.auth.reset-password-new', [
            'token' => $token,
        ]);
    }

    /**
     * Лошади
     */

    /**
     * Страница лошади
     *
     * @param Horse $horse
     * @return RedirectResponse|View
     */
    public function horseView(Horse $horse): RedirectResponse|View
    {
        if(
            $horse->draft && (!auth::check() ||
            auth()->check() && auth()->id() !== $horse->currentOwner()->id)
        ) {
            return redirect()->route('pages.home');
        }

        $offer = $horse->offers()->latest()->first();
        $diaries = $horse->blogs()->latest()->get();
        $diaryTopics = DiaryTopic::all();

        $topics = [];
        foreach($diaryTopics as $diaryTopic) {
            $topics[$diaryTopic->id] = [];
        }

        foreach ($diaries as $diary) {
            $topics[$diary->topic_id][] = $diary;
        }

        $count = count($topics, COUNT_RECURSIVE) - $diaryTopics->count();

        return view('horses.view',
            compact('horse', 'offer', 'topics', 'diaryTopics', 'count'));
    }

    /**
     * Страница всех пород лошадей
     *
     * @return View
     */
    public function horseBreeds(): View
    {
        return view('horses.breed.all');
    }

    /**
     * Страница изменения лошади
     *
     * @param Horse $horse
     * @return RedirectResponse|View
     */
    public function horseEdit(Horse $horse): RedirectResponse|View
    {
        if($horse->currentOwner()->id !== auth()->id())
            return redirect()->route('pages.home');

        return view('user.horses.data', compact('horse'));
    }

    // Дневники

    /**
     * Страница создания дневника
     *
     * @param Horse $horse
     * @return RedirectResponse|View
     */
    public function diaryCreate(Horse $horse): RedirectResponse|View
    {
        if($horse->currentOwner()->id != auth()->id())
            return redirect()->route('pages.home');

        return view('horses.diary.create', compact('horse'));
    }

    /**
     * Все записи лошади
     *
     * @param Horse $horse
     * @return View
     */
    public function horseDiaryAll(Horse $horse): View
    {
        $diaries = $horse->blogs()->paginate(1);

        return view('horses.diary.all', compact('horse', 'diaries'));
    }


    /**
     * Страница поста записи
     *
     * @param Blog $blog
     * @return View|RedirectResponse
     */
    public function diaryShow(Blog $blog): View|RedirectResponse
    {
        if(!$blog->published && !auth()->check() || !$blog->published && auth()->id() !== $blog->user->id)
            return redirect()->route('pages.home');

        return view('diary.view', compact('blog'));
    }
}
