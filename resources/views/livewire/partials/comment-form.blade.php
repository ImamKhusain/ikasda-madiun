<form class="mb-6" wire:submit="{{ $method }}">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => (show = false), 3000)">
            <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success!</span>
                {{ session('message') }}
            </div>
        </div>
    @endif

    <div
        class="mb-4 rounded-lg rounded-t-lg border border-gray-200 bg-white px-4 py-2 dark:border-gray-700 dark:bg-gray-800">
        <label for="{{ $inputId }}" class="sr-only">{{ $inputLabel }}</label>

        <textarea id="{{ $inputId }}" rows="6"
            class="@error($state . '.body')  @enderror w-full border-0 border-red-500 px-0 text-sm text-gray-900 focus:outline-none focus:ring-0 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400"
            placeholder="Write a comment..." wire:model.live="{{ $state }}.body"></textarea>

        @error($state . '.body')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <button wire:loading.attr="disabled" type="submit"
        class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-200 dark:focus:ring-primary-900 inline-flex items-center rounded-lg bg-[#F5D05E] px-4 py-2.5 text-center text-xs font-medium text-black focus:ring-4">
        <div wire:loading wire:target="{{ $method }}">
            @include('livewire.partials.loader')
        </div>
        {{ $button }}
    </button>
</form>
