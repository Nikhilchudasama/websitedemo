<?php
namespace App\Http\Controllers\admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Admin Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('admin.dashboard');
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('admin_login_page');
    }

    /**
     * Display list of Users
     *
     * @return \Illuminate\Http\Respose
     **/
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Display form to create a new User
     *
     * @return \Illuminate\Http\Response
     **/
    public function create()
    {
        return view('admin.user.add');
    }
    /**
     * Save new user
     *
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function store()
    {
        $validatedData = request()->validate(User::validationRules());

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with(['type' => 'success', 'message' => 'User added']);
    }
    /**
     * Display form to edit a user
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     **/
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    /**
     * Update user details
     *
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function update(User $user)
    {
        $validatedData = request()->validate(User::validationRules($user->id));

        $user->update($validatedData);

        return redirect()->route('users.index')->with(['type' => 'success', 'message' => 'User Updated']);
    }
    /**
     * Admin Profile page
     *
     * @return \Illuminate\Http\Response
     **/
    public function profile()
    {
        return view('admin.user.profile');
    }

    /**
     * Update Admin Profile Details
     *
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function profileUpdate()
    {
        $validatedData = request()->validate(User::validationRules(request('id')));

        $user = User::find(request('id'));

        $user->update($validatedData);

        return redirect()->route('admin_home')->with(['type' => 'success', 'message' => 'Profile Updated']);
    }
}
