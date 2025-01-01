<x-layout>
  <x-slot:heading>Jobs Page</x-slot>
  <ul>
    @foreach ($jobs as $job)
      <li>
        <a href="/jobs/{{ $job['id'] }}" class="text-blue-600 hover:underline">
          <b>{{ $job['title'] }}</b>
          - {{ $job['salary'] }}
        </a>
      </li>
    @endforeach
  </ul>
</x-layout>
