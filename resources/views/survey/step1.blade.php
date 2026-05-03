<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Step 1 of our civic survey: Share your demographics.">
    <title>Survey Step 1 - Demographics | Civic Survey</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.45s ease-out both; }
    </style>
</head>
<body>
    @include('partials.education-theme')
    <div class="page-content">
    <nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <a href="/" class="p-2 rounded-md hover:bg-sky-100 transition-colors">
                        <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-lg font-semibold">Step 1: About You</h1>
                        <p class="text-xs text-slate-500">Demographics — students & studies focused</p>
                    </div>
                </div>
                <div class="text-sm text-slate-600 bg-sky-100 px-3 py-1 rounded-md border border-gray-200">1 / 2</div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <header class="mb-8 animate-fade-in-up">
            <h2 class="text-3xl font-extrabold text-slate-900">About You</h2>
            <p class="mt-2 text-slate-600">Quick student-focused questions to understand study context and background.</p>
        </header>

        <form method="POST" action="/survey/step1" class="space-y-6" novalidate>
            @csrf

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">Age group</label>
                <div class="grid grid-cols-2 gap-3">
                    @foreach(['18-24','25-34','35-44','45-54','55-64','65+'] as $age)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="age_group" value="{{ $age }}" required class="h-4 w-4 text-sky-600" />
                            <span class="text-slate-800 font-medium">{{ $age }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">Gender</label>
                <div class="flex flex-wrap gap-3">
                    @foreach(['Male','Female','Non-binary','Prefer to say'] as $gender)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="gender" value="{{ $gender }}" required class="h-4 w-4 text-amber-500" />
                            <span class="text-slate-800">{{ $gender }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">Highest level of education</label>
                <div class="flex flex-wrap gap-3">
                    @foreach(["High School","Bachelor's","Master's","PhD","Other"] as $edu)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="education" value="{{ $edu }}" required class="h-4 w-4 text-emerald-500" />
                            <span class="text-slate-800">{{ $edu }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">Occupation</label>
                <select name="occupation" required class="w-full border rounded-md px-3 py-2 text-slate-800">
                    <option value="">Select an occupation...</option>
                    <option>Technology</option>
                    <option>Education</option>
                    <option>Healthcare</option>
                    <option>Finance</option>
                    <option>Government</option>
                    <option>Retail</option>
                    <option>Manufacturing</option>
                    <option>Other</option>
                    <option>Unemployed</option>
                    <option>Retired</option>
                </select>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">How often do you use technology?</label>
                <div class="flex flex-wrap gap-3">
                    @foreach(['Daily','Several times a week','Weekly','Rarely','Never'] as $usage)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="tech_usage" value="{{ $usage }}" required class="h-4 w-4 text-sky-600" />
                            <span class="text-slate-800">{{ $usage }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">Have you used AI tools? (ChatGPT, etc.)</label>
                <div class="flex flex-wrap gap-3">
                    @foreach(['Yes, regularly','Yes, occasionally','No, but aware of them','No, not aware'] as $usage)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="ai_usage" value="{{ $usage }}" required class="h-4 w-4 text-pink-500" />
                            <span class="text-slate-800">{{ $usage }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <section class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <label class="block font-semibold text-slate-900 mb-3">How involved are you in civic activities?</label>
                <div class="flex flex-wrap gap-3">
                    @foreach(['Very involved','Somewhat involved','Minimally involved','Not involved'] as $participation)
                        <label class="flex items-center gap-3 p-3 border rounded-lg bg-white hover:shadow-sm cursor-pointer">
                            <input type="radio" name="civic_participation" value="{{ $participation }}" required class="h-4 w-4 text-emerald-500" />
                            <span class="text-slate-800">{{ $participation }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            <div class="flex gap-4 mt-6">
                <a href="/" class="flex-1 text-center px-4 py-2 border rounded-md text-slate-700 hover:bg-sky-100">Cancel</a>
                <button type="submit" class="flex-1 px-4 py-2 bg-sky-600 text-white rounded-md hover:shadow">Next step</button>
            </div>
        </form>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
        Made with 💚 by Muhammad Sufyan Jura
    </footer>
    </div>
</body>
</html>
