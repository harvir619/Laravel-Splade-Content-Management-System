<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Categories') }}
            </h2>
            <Link href="{{ route('categories.create') }}"
                class='px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md'
                style="background-color: rgb(129 140 248);">
            New Category
            </Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form  :default="$category"
                            :action="route('categories.edit',$category->id)"
                            class="max-w-md mx-auto p-4 bg-white rounded-md">
                <x-splade-input name="name" label="Name"></x-splade-input>
                <x-splade-input name="slug" label="Slug" class="mt-1"></x-splade-input>
                <x-splade-submit class="mt-4"/>
            </x-splade-form>
            
        </div>
    </div>
</x-app-layout>