<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="h-full">
    <div class="min-h-full">
      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="shrink-0">
                <img class="size-8" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company" />
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <x-nav-link href="/" active="{{ request()->is('/') }}">Home</x-nav-link>
                  <x-nav-link href="/jobs" active="{{ request()->is('jobs') }}">Jobs</x-nav-link>
                  <x-nav-link href="/contact" active="{{ request()->is('contact') }}">Contact</x-nav-link>
                </div>
              </div>
            </div>
            <div class="hidden md:block">
              <div class="ml-4 flex items-center gap-x-2 md:ml-6">
                @guest
                  <x-nav-link href="/login" active="{{ request()->is('login') }}">Login</x-nav-link>
                  <x-nav-link href="/register" active="{{ request()->is('register') }}">Register</x-nav-link>
                @endguest

                @auth
                  <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-form-button>Log out</x-form-button>
                  </form>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </nav>

      <header class="bg-white shadow">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
          @auth
            <x-button href="/jobs/create">Create Job</x-button>
          @endauth
        </div>
      </header>
      <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          {{ $slot }}
        </div>
      </main>
    </div>
  </body>
</html>
