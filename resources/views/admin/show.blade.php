<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Response Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partials.education-theme')
  <div class="page-content">
    <main class="max-w-4xl mx-auto px-4 py-10">
      <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between mb-6">
        <div>
          <a href="/admin" class="text-sky-700 font-semibold">← Back to dashboard</a>
          <h1 class="text-3xl font-black text-slate-900 mt-3">Response #{{ $response->id }}</h1>
          <p class="text-slate-600 mt-1">Submitted {{ $response->created_at->format('M d, Y H:i') }}</p>
        </div>
        <div class="flex gap-2">
          <a href="/admin/pdf/{{ $response->id }}" class="px-4 py-2 rounded-md bg-slate-900 text-white font-semibold">Download PDF</a>
          <form method="POST" action="/admin/response/{{ $response->id }}" onsubmit="return confirm('Delete this response?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white font-semibold">Delete</button>
          </form>
        </div>
      </div>

      <section class="edu-card rounded-xl p-6 mb-6">
        <h2 class="text-lg font-bold text-slate-900 mb-4">Student Profile</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 text-sm text-slate-700">
          <div><span class="font-semibold text-slate-900">Age group:</span> {{ $response->age_group }}</div>
          <div><span class="font-semibold text-slate-900">Gender:</span> {{ $response->gender }}</div>
          <div><span class="font-semibold text-slate-900">Education:</span> {{ $response->education }}</div>
          <div><span class="font-semibold text-slate-900">Occupation:</span> {{ $response->occupation }}</div>
          <div><span class="font-semibold text-slate-900">Tech usage:</span> {{ $response->tech_usage ?? '—' }}</div>
          <div><span class="font-semibold text-slate-900">AI usage:</span> {{ $response->ai_usage ?? '—' }}</div>
          <div><span class="font-semibold text-slate-900">Civic participation:</span> {{ $response->civic_participation ?? '—' }}</div>
        </div>
      </section>

      <section class="edu-card rounded-xl p-6">
        <div class="flex items-center justify-between gap-3 mb-4">
          <h2 class="text-lg font-bold text-slate-900">Selected Answers</h2>
          <span class="text-sm text-slate-500">{{ count($response->selected_answers) }} / {{ count($questions) }} answered</span>
        </div>

        <div class="space-y-4">
          @forelse($questions as $index => $question)
            <div class="rounded-lg border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">Question {{ $index + 1 }}</div>
              <div class="mt-1 font-semibold text-slate-900">{{ $question['q'] }}</div>
              <div class="mt-2 text-slate-700">
                {{ $response->selected_answers[$index] ?? 'Not answered' }}
              </div>
            </div>
          @empty
            <div class="text-slate-600">No survey questions available.</div>
          @endforelse
        </div>
      </section>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
      Made with 💚 by Muhammad Sufyan Jura
    </footer>
  </div>
</body>
</html>
