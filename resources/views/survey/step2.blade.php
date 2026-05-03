<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Survey — Questions</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partials.education-theme')
  <div class="page-content">
    <nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <a href="/survey/step1" class="text-slate-700">← Back</a>
          <div class="text-sm text-slate-700 bg-sky-100 px-3 py-1 rounded-md">2 / 2</div>
        </div>
      </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-10">
      <header class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Survey Questions</h1>
        <p class="text-slate-600 mt-2">Please answer the following questions about your learning and technology use.</p>
      </header>

      <form method="POST" action="/survey/step2" class="space-y-6">
        @csrf
        @foreach($questions as $i => $q)
          <section class="edu-card p-4 rounded-lg">
            <div class="flex items-start gap-3">
              <div class="flex-shrink-0 h-8 w-8 rounded-full bg-sky-600 text-white flex items-center justify-center font-bold">{{ $i + 1 }}</div>
              <div>
                <div class="text-slate-900 font-semibold">{{ $q['q'] }}</div>
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                  @foreach($q['options'] as $opt)
                    <label class="flex items-center gap-3 p-3 border rounded-md cursor-pointer">
                      <input type="radio" name="answers[{{ $i }}]" value="{{ $opt }}" required class="h-4 w-4 text-sky-600" />
                      <span class="text-slate-800">{{ $opt }}</span>
                    </label>
                  @endforeach
                </div>
              </div>
            </div>
          </section>
        @endforeach

        <div class="flex gap-3 mt-4">
          <a href="/survey/step1" class="px-4 py-2 border rounded-md text-slate-700">Previous</a>
          <button type="submit" class="px-4 py-2 bg-sky-600 text-white rounded-md">Submit Survey</button>
        </div>
      </form>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
      Made with 💚 by Muhammad Sufyan Jura
    </footer>
  </div>
</body>
</html>
