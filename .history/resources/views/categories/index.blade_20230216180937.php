<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-table :for="$categories">
                    @cell('action',$post)
                        <Link href="{{ route('categories.edit',$categories->id) }}"
                            class="text-green-600 hover:text-green-400 font-semibold">Edit</Link>
                    @endcell
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>