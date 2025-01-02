<x-layout>
  <x-slot:heading>Jobs</x-slot>
  <div class="space-y-4">
    @foreach ($jobs as $job)
      <a
        href="/jobs/{{ $job['id'] }}"
        class="block rounded-lg border border-gray-200 bg-white px-4 py-6 hover:shadow-md"
      >
        <div class="text-sm font-bold text-blue-500">
          {{ $job->employer->name }}
        </div>
        <div>
          <b>{{ $job['title'] }}</b>
          - {{ $job['salary'] }}
        </div>
      </a>
    @endforeach
  </div>
</x-layout>
