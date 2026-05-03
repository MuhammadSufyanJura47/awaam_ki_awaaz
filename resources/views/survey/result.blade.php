<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Response — View</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partials.education-theme')
  <div class="page-content">
    <main class="max-w-4xl mx-auto px-4 py-10">
      <div class="flex items-center justify-between mb-6">
        <div>
          <a href="/" class="text-sky-700 font-semibold">← Home</a>
          <h1 class="text-3xl font-black text-slate-900 mt-3">Response #{{ $response->id }}</h1>
          <p class="text-slate-600 mt-1">Submitted {{ $response->created_at->format('M d, Y H:i') }}</p>
        </div>
      </div>

      <div class="edu-card p-6 rounded-xl space-y-4 mb-6">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 text-sm text-slate-700">
          <div><strong class="text-slate-900">Age group:</strong> {{ $response->age_group }}</div>
          <div><strong class="text-slate-900">Gender:</strong> {{ $response->gender }}</div>
          <div><strong class="text-slate-900">Education:</strong> {{ $response->education }}</div>
          <div><strong class="text-slate-900">Occupation:</strong> {{ $response->occupation }}</div>
          <div><strong class="text-slate-900">Tech usage:</strong> {{ $response->tech_usage ?? '—' }}</div>
          <div><strong class="text-slate-900">AI usage:</strong> {{ $response->ai_usage ?? '—' }}</div>
          <div><strong class="text-slate-900">Civic participation:</strong> {{ $response->civic_participation ?? '—' }}</div>
        </div>
      </div>

      <div class="edu-card p-6 rounded-xl">
        <h2 class="text-lg font-bold text-slate-900 mb-4">Selected Answers</h2>
        <div class="space-y-4">
          @foreach($response->selected_answers as $index => $answer)
            <div class="rounded-lg border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">Question {{ $index + 1 }}</div>
              <div class="mt-1 font-semibold text-slate-900">{{ $questions[$index]['q'] ?? 'Question ' . ($index + 1) }}</div>
              <div class="mt-2 text-slate-700">{{ $answer }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
      Made with 💚 by Muhammad Sufyan Jura
    </footer>
  </div>
</body>
</html>
