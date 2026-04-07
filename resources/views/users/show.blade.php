<x-layout title="User Details">

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
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="/users" class="text-indigo-400 hover:text-indigo-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-white">User Details</h1>
        </div>

        <div class="glass-card rounded-3xl shadow-2xl p-8">
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">{{ trim(($user->first_name ?? '') . ' ' . ($user->middle_name ?? '') . ' ' . ($user->last_name ?? '')) }}</h2>
                    <p class="text-slate-400">({{ $user->nickname ?? 'No nickname' }})</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">Email</label>
                            <p class="text-white font-medium">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">Age</label>
                            <p class="text-slate-200">{{ $user->age ?? 'Not specified' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">Contact Number</label>
                            <p class="text-slate-200">{{ $user->contact_number ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">First Name</label>
                            <p class="text-white font-medium">{{ $user->first_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">Last Name</label>
                            <p class="text-white font-medium">{{ $user->last_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-1">Middle Name</label>
                            <p class="text-slate-200">{{ $user->middle_name ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-1">Address</label>
                    <p class="text-slate-200">{{ $user->address ?? 'Not specified' }}</p>
                </div>

                <div class="flex gap-4 pt-6 border-t border-white/10">
                    <a href="/users/{{ $user->id }}/edit" class="flex-1 bg-emerald-600 hover:bg-emerald-500 text-white py-3 px-6 rounded-xl text-center font-semibold shadow-lg shadow-emerald-500/25 transition-all">Edit User</a>
                    <a href="/users" class="flex-1 bg-slate-600 hover:bg-slate-500 text-white py-3 px-6 rounded-xl text-center font-semibold transition-all">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>
