@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    body {
        background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
        background-size: 400% 400%;
        animation: gradientFlow 10s ease infinite;
        color: white;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        min-height: 100vh;
    }
    .glass-nav {
        background: rgba(15, 23, 42, 0.9);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .nav-link {
        padding: 12px 20px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-weight: 500;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .nav-link:hover {
        background: rgba(79, 70, 229, 0.2);
        color: white;
        transform: translateY(-1px);
    }
    .glass-card {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>
<body class="animate-mesh">
    <nav class="glass-nav px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="text-xl font-bold text-white">Bang App</div>
            <div class="flex space-x-1">
                <a href="/" class="nav-link">Home</a>
                <a href="/about" class="nav-link">About</a>
                <a href="/contact" class="nav-link">Contact</a>
                <a href="/formtest" class="nav-link">Form Test</a>
                <a href="/posts" class="nav-link">Posts</a>
                <a href="/users" class="nav-link">Users</a>
                <a href="{{ url('/books') }}" class="nav-link">Books</a>
                <a href="{{ url('/borrowings') }}" class="nav-link">Borrowings</a>
                <a href="{{ url('/acquisitions') }}" class="nav-link">Acquisitions</a>
            </div>
        </div>
    </nav>

{{ $slot }}

</body>
</html>