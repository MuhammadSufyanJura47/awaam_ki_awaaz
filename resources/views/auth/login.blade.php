<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partials.education-theme')
  <div class="page-content">
    <main class="max-w-md mx-auto px-4 py-16">
      <div class="edu-card p-6 rounded-lg">
        <h1 class="text-xl font-bold text-slate-900">Admin Login</h1>
        <form method="POST" action="/login" class="mt-4 space-y-4">
          @csrf
          <div>
            <label class="block text-sm text-slate-700">Email</label>
            <input type="email" name="email" required class="mt-1 w-full border rounded-md px-3 py-2" />
          </div>
          <div>
            <label class="block text-sm text-slate-700">Password</label>
            <input type="password" name="password" required class="mt-1 w-full border rounded-md px-3 py-2" />
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-sky-600 text-white rounded-md">Sign in</button>
          </div>
        </form>
      </div>
    </main>
    <footer class="mt-12 py-6 text-center text-sm text-slate-600">
      Made with 💚 by Muhammad Sufyan Jura
    </footer>
  </div>
</body>
</html>
