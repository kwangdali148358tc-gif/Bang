<x-layout title="Users">

<style>
    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animate-mesh {
        background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
        background-size: 400% 400%;
        animation: gradientFlow 10s ease infinite;
    }

    .glass-card {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>

<div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-white">Users</h1>
            <a href="/users/create" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg shadow-indigo-500/25 transition-all">+ Add New User</a>
        </div>

        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
            @forelse ($users as $user)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/10 uppercase text-xs">
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Full Name</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Email</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">First Name</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Last Name</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Age</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Contact</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Address</th>
                                <th class="text-left p-6 font-semibold text-slate-300 tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <tr class="hover:bg-white/10 transition-colors">
                                <td class="p-6 font-medium text-white max-w-xs truncate">{{ $user->name }}</td>
                                <td class="p-6 text-slate-300">{{ $user->email }}</td>
                                <td class="p-6 text-slate-200">{{ $user->first_name }}</td>
                                <td class="p-6 text-slate-200">{{ $user->last_name }}</td>
                                <td class="p-6 text-slate-200">{{ $user->age ?? 'N/A' }}</td>
                                <td class="p-6 text-slate-200">{{ $user->contact_number ?? 'N/A' }}</td>
                                <td class="p-6 text-slate-200 max-w-xs truncate">{{ Str::limit($user->address ?? 'N/A', 50) }}</td>
                                <td class="p-6">
                                    <div class="flex items-center gap-2">
                                        <a href="/users/{{ $user->id }}" class="p-2 text-indigo-400 hover:text-indigo-300 hover:bg-indigo-500/20 rounded-lg transition-all" title="View">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="/users/{{ $user->id }}/edit" class="p-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/20 rounded-lg transition-all" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form method="POST" action="/users/{{ $user->id }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:text-red-300 hover:bg-red-500/20 rounded-lg transition-all" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @empty
                <div class="text-center py-20">
                    <svg class="mx-auto h-16 w-16 text-slate-500 mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-white mb-2">No users yet</h3>
                    <p class="text-slate-400 mb-8 max-w-md mx-auto">Your user list is empty. Create your first user to get started.</p>
                    <a href="/users/create" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg shadow-indigo-500/25 hover:shadow-xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Create First User
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

</x-layout>

