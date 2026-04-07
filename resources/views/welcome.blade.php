<x-layout><br><br><br><br>    
    <div class="glass-card rounded-3xl p-12 text-center">
        <h1 class="text-5xl font-bold bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent mb-8">Welcome to Bang App</h1>
        <p class="text-xl text-slate-300 mb-12 max-w-2xl mx-auto">Manage your users, posts, and ideas with a modern, fast Laravel application.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="glass-card p-8 rounded-2xl">
                <div class="text-4xl font-bold text-indigo-400 mb-2">{{ $userCount ?? 0 }}</div>
                <div class="text-slate-400 uppercase tracking-wider text-sm font-bold">Total Users</div>
            </div>
            <div class="glass-card p-8 rounded-2xl">
                <div class="text-4xl font-bold text-emerald-400 mb-2">{{ $postCount ?? 0 }}</div>
                <div class="text-slate-400 uppercase tracking-wider text-sm font-bold">Posts</div>
            </div>
            <div class="glass-card p-8 rounded-2xl">
                <div class="text-4xl font-bold text-purple-400 mb-2">{{ $ideaCount ?? 0 }}</div>
                <div class="text-slate-400 uppercase tracking-wider text-sm font-bold">Ideas</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="glass-card p-8">
                <h3 class="text-2xl font-bold text-white mb-6">Quick Actions</h3>
                <div class="space-y-4">
                    <a href="/users/create" class="block w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-4 px-6 rounded-2xl font-semibold text-center shadow-xl hover:shadow-2xl transition-all">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Create New User
                    </a>

                    <a href="/formtest" class="block w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white py-4 px-6 rounded-2xl font-semibold text-center shadow-xl hover:shadow-2xl transition-all">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add New Post
                    </a>
                </div>
            </div>
            <div class="glass-card p-8">
                <h3 class="text-2xl font-bold text-white mb-6">Recent Users</h3>
                @forelse($recentUsers ?? [] as $user)
                    <div class="flex items-center p-4 border-b border-white/10 last:border-b-0 hover:bg-white/5 rounded-lg transition-all">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center font-bold text-white text-lg mr-4">
                            {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-white">{{ trim($user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name) }}</div>
                            <div class="text-slate-400 text-sm">{{ $user->email }}</div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-slate-400">
No users yet
                    </div>
                @endforelse
            </div>
        </div>

        <div class="text-center">
            <a href="/users" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg shadow-indigo-500/25 hover:shadow-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                View All Users
            </a>
        </div>
    </div>

</x-layout>
