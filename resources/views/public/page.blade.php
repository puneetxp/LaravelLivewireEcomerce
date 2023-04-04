<!--ver0.2-->
<x-guest-layout>
  <style>
    section p {
      padding: 0.5rem 0;
    }
  </style>
  <section class="body-font overflow-hidden max-w-7xl mx-auto my-5 sm:py-10 p-5" x-data="{page:{{$page}},photo:'0'}">
    <h1 class="text-4xl text-center text-bold py-5" x-html="page.title">
    </h1>  <script src="https://cdn.tailwindcss.com"></script>
    <div x-html="page.body" class="grid gap-2">
    </div>
  </section>
</x-guest-layout>