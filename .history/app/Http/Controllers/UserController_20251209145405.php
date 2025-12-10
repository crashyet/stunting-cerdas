public function index()
{
    $users = User::where('status', 'aktif')->get();

    return view('admin.user.index', compact('users'));
}
