<?php 

namespace App\Http\Controllers;

use App\Models\Github;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    public function index(Request $request)
    {
        $adminEmail = auth()->user()->email;
        $query = Github::where('admin_email', $adminEmail);

        if ($request->has('search')) {
            $query->where('login', 'like', '%' . $request->input('search') . '%');
        }

        $profiles = $query->get();

        return view('github.index', compact('profiles'));
    }

    // Busca o perfil do GitHub com base no username
    private function getGithubProfile($username)
    {
        $response = Http::get("https://api.github.com/users/{$username}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function search(Request $request)
    {
        $username = $request->input('username');
        $githubData = null;
        $githubData = $this->getGithubProfile($username);

        return view('github.create', compact('githubData'));
    }

    public function create()
    {
        return view('github.create');
    }

    // Grava o perfil do GitHub na tabela
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string',
            'blog' => 'nullable|string',
            'public_repos' => 'nullable|integer',
            'avatar_url' => 'nullable|url',
        ]);
    
        $adminEmail = auth()->user()->email;
    
        $existingProfile = Github::where('login', $request->input('username'))
                                 ->where('admin_email', $adminEmail)
                                 ->first();
    
        if ($existingProfile) {
            return back()->withErrors(['username' => 'Este perfil do GitHub já foi registrado para este usuário.']);
        }

        $github = new Github();
        $github->login = $request->input('username');
        $github->name = $request->input('name');
        $github->company = $request->input('company');
        $github->bio = $request->input('bio');
        $github->location = $request->input('location');
        $github->blog = $request->input('blog');
        $github->public_repos = $request->input('public_repos');
        $github->avatar_url = $request->input('avatar_url');
        $github->admin_email = auth()->user()->email;
        $github->save();

        return redirect()->route('github.index');
    }

    // Altera o perfil do GitHub
    public function update(Request $request, string $id)
    {
        $github = Github::findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string',
            'blog' => 'nullable|string',
            'public_repos' => 'nullable|integer',
            'avatar_url' => 'nullable|url',
        ]);

        $github->update($request->all());

        return redirect()->route('github.index')->with('success', 'Perfil atualizado com sucesso.');
    }

    // Mostra o perfil do GitHub
    public function show($id)
    {
        $adminEmail = auth()->user()->email;
        $profile = Github::where('id', $id)
                         ->where('admin_email', $adminEmail)
                         ->firstOrFail();
        return view('github.show', compact('profile'));
    }

    // Exclui o perfil do GitHub
    public function destroy(string $id)
    {
        $profile = Github::findOrFail($id);
        $profile->delete();
        return redirect()->route('github.index')->with('success', 'Perfil excluído com sucesso.');
    }
}