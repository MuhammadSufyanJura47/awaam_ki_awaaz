<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partials.education-theme')
  <div class="page-content">
    <main class="max-w-6xl mx-auto px-4 py-10">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between mb-8">
        <div>
          <p class="text-sm uppercase tracking-[0.24em] text-sky-700 font-semibold">Admin</p>
          <h1 class="text-3xl font-black text-slate-900 mt-2">Survey Responses</h1>
          <p class="text-slate-600 mt-2">Review submissions, inspect selected answers, and delete records when needed.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="/admin/export/csv" class="px-4 py-2 bg-sky-600 text-white rounded-md font-semibold">Export CSV</a>
          <a href="/admin/pdf/{{ $responses->first()->id ?? 1 }}" class="px-4 py-2 border border-sky-200 text-slate-700 rounded-md font-semibold {{ $responses->count() ? '' : 'pointer-events-none opacity-50' }}">Export PDF</a>
        </div>
      </div>

      <div class="grid gap-4 md:grid-cols-3 mb-8">
        <div class="edu-card rounded-xl p-5">
          <div class="text-sm text-slate-500">Total Responses</div>
          <div class="text-3xl font-black text-slate-900 mt-2">{{ $responses->total() }}</div>
        </div>
        <div class="edu-card rounded-xl p-5">
          <div class="text-sm text-slate-500">This Page</div>
          <div class="text-3xl font-black text-slate-900 mt-2">{{ $responses->count() }}</div>
        </div>
        <div class="edu-card rounded-xl p-5">
          <div class="text-sm text-slate-500">Latest</div>
          <div class="text-lg font-bold text-slate-900 mt-2">{{ optional($responses->first())->created_at?->format('M d, Y H:i') ?? 'No responses yet' }}</div>
        </div>
      </div>

      @if(session('success'))
        <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
          {{ session('success') }}
        </div>
      @endif

      <div class="space-y-4">
        @forelse($responses as $response)
          <article class="edu-card rounded-xl p-5">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
              <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-3">
                  <h2 class="text-lg font-bold text-slate-900">Response #{{ $response->id }}</h2>
                  <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-800">{{ $response->created_at->format('M d, Y') }}</span>
                </div>
                <div class="mt-2 grid gap-1 text-sm text-slate-600 sm:grid-cols-2 lg:grid-cols-4">
                  <div><span class="font-semibold text-slate-800">Age:</span> {{ $response->age_group }}</div>
                  <div><span class="font-semibold text-slate-800">Education:</span> {{ $response->education }}</div>
                  <div><span class="font-semibold text-slate-800">Tech:</span> {{ $response->tech_usage }}</div>
                  <div><span class="font-semibold text-slate-800">AI:</span> {{ $response->ai_usage }}</div>
                </div>
                <p class="mt-3 text-sm text-slate-500">{{ count($response->selected_answers) }} answers recorded</p>
              </div>

              <div class="flex flex-wrap gap-2">
                <a href="/admin/response/{{ $response->id }}" class="px-4 py-2 rounded-md border border-sky-200 text-slate-700 font-semibold">View</a>
                <a href="/admin/pdf/{{ $response->id }}" class="px-4 py-2 rounded-md bg-slate-900 text-white font-semibold">PDF</a>
                <form method="POST" action="/admin/response/{{ $response->id }}" onsubmit="return confirm('Delete this response?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white font-semibold">Delete</button>
                </form>
              </div>
            </div>
          </article>
        @empty
          <div class="edu-card rounded-xl p-8 text-center text-slate-600">
            No responses have been submitted yet.
          </div>
        @endforelse
      </div>

      <div class="mt-8">
        {{ $responses->links() }}
      </div>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
      Made with 💚 by Muhammad Sufyan Jura
    </footer>
  </div>
</body>
</html>
