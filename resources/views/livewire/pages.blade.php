<div>
    <h1 class="text-2xl font-bold mb-4">Pages</h1>
    <ul>
        @foreach($pages as $page)
        <li class="mb-2">
            <h2 class="text-xl">{{ $page->title }}</h2>
            <p>{{ $page->content }}</p>
        </li>
        @endforeach
    </ul>
</div>
