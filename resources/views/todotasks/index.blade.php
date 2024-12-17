<!-- タスク一覧が見れるページ -->

<x-app-layout>
    <x-slot name="header">
        <h2>
            {{__('メインページ')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded">
                        {{ session('success') }}
                    </div>
                    @endif
                    @foreach($todotasks as $todotask)
                    <div>
                        <p>
                            {{$todotask->task}}
                        </p>
                        <p>
                            投稿者：{{ $todotask->user ? $todotask->user->name : '不明' }}
                        </p>
                        <select name="checkbox" id="">
                            <option value="1" {{ $todotask->done ? 'selected' : '' }}>⚪︎</option>
                            <option value="0" {{ !$todotask->done ? 'selected' : '' }}>×</option>
                        </select>
                        @if($todotask->img)
                        <p>画像パス: {{ asset('storage/' . $todotask->img) }}</p>
                        <img src="{{ asset('storage/' . $todotask->img) }}" alt="タスク画像" class="mt-2" />
                        @else
                        <p>画像はありません。</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>