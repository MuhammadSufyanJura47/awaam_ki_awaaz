<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student-focused survey: share experiences with learning and technology.">
    <title>Awaam ki Awaaz — Make Communities Better</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('partials.education-theme')
    <div class="page-content">
        <nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-sky-600 rounded-lg flex items-center justify-center text-white font-bold">EDU</div>
                        <div>
                            <div class="text-lg font-semibold text-slate-900">Awaam ki Awaaz</div>
                            <div class="text-xs text-slate-500">Community Engagement & AI</div>
                        </div>
                    </div>
                    <a href="/login" class="px-4 py-2 bg-sky-600 text-white rounded-md text-sm">Admin</a>
                </div>
                
            </div>
        </nav>

        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <header class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-slate-900">Help Improve Community Engagement</h1>
                <p class="mt-3 text-slate-600">Share your experiences about community engagement, technology use, and AI.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="edu-card p-6 rounded-lg text-center">
                    <div class="text-2xl font-bold text-slate-900">5 min</div>
                    <div class="text-xs text-slate-600">Quick and focused</div>
                </div>
                <div class="edu-card p-6 rounded-lg text-center">
                    <div class="text-2xl font-bold text-slate-900">Community Centered</div>
                    <div class="text-xs text-slate-600">Questions for learners</div>
                </div>
                <div class="edu-card p-6 rounded-lg text-center">
                    <div class="text-2xl font-bold text-slate-900">Private</div>
                    <div class="text-xs text-slate-600">Responses are confidential</div>
                </div>
            </div>

            <div class="text-center">
                <a href="/survey/step1" class="inline-flex items-center px-6 py-3 bg-sky-600 text-white rounded-md font-semibold">Start Survey</a>
            </div>

            <footer class="mt-16 text-center text-slate-600">
                <p>Awaam ki Awaaz • Built to strengthen community engagement and AI awareness.</p>
                <p class="mt-2 font-medium text-slate-700">Made with 💚 by Muhammad Sufyan Jura</p>
            </footer>
        </main>
    </div>
</body>
</html>
