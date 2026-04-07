<x-layout title="User Registration">

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

<div class=\"min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8\">
    <div class=\"max-w-2xl mx-auto\">
        <div class=\"glass-card rounded-3xl shadow-2xl p-8\">
            <div class=\"text-center mb-8\">
                <h1 class=\"text-3xl font-bold text-white mb-2\">User Registration</h1>
                @if ($errors->any())
                <div class=\"bg-red-500/20 border border-red-500/50 text-red-300 p-6 rounded-xl mb-8\">
                    <strong>❌ Form not accepted. Please fix:</strong>
                    <ul class=\"mt-2 list-disc list-inside space-y-1\">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <p class=\"text-slate-400\">Fill in the details below</p>
            </div>

            <form method=\"POST\" action=\"/users\" class=\"space-y-6\">
                @csrf
                
                <div class=\"grid grid-cols-1 md:grid-cols-2 gap-6\">
                    <div>
                        <label for=\"email\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Email</label>
                        <input id=\"email\" name=\"email\" type=\"email\" required class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>

                    <div>
                        <label for=\"first_name\" class=\"block text-sm font-semibold text-slate-300 mb-2\">First Name</label>
                        <input id=\"first_name\" name=\"first_name\" type=\"text\" required class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>

                    <div>
                        <label for=\"last_name\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Last Name</label>
                        <input id=\"last_name\" name=\"last_name\" type=\"text\" required class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>

                    <div>
                        <label for=\"middle_name\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Middle Name (Optional)</label>
                        <input id=\"middle_name\" name=\"middle_name\" type=\"text\" class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>

                    <div>
                        <label for=\"nickname\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Nickname (Optional)</label>
                        <input id=\"nickname\" name=\"nickname\" type=\"text\" class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>
                </div>

                <div class=\"grid grid-cols-1 md:grid-cols-2 gap-6\">
                    <div>
                        <label for=\"age\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Age (Optional)</label>
                        <input id=\"age\" name=\"age\" type=\"number\" class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>

                    <div>
                        <label for=\"contact_number\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Contact Number (Optional)</label>
                        <input id=\"contact_number\" name=\"contact_number\" type=\"tel\" class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all\" />
                    </div>
                </div>

                <div>
                    <label for=\"address\" class=\"block text-sm font-semibold text-slate-300 mb-2\">Address (Optional)</label>
                    <textarea id=\"address\" name=\"address\" rows=\"3\" class=\"w-full rounded-xl bg-slate-950/50 border border-slate-700/50 px-4 py-3 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none transition-all resize-vertical\"></textarea>
                </div>

                <div class=\"flex gap-4\">
                    <a href=\"/users\" class=\"flex-1 bg-slate-600 hover:bg-slate-500 text-white py-3 px-6 rounded-xl text-center font-semibold transition-all\">Cancel</a>
                    <button type=\"submit\" class=\"flex-1 bg-indigo-600 hover:bg-indigo-500 text-white py-3 px-6 rounded-xl font-semibold shadow-lg shadow-indigo-500/25 transition-all\">Register User</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layout>
