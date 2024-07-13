<div class="relative">
    <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2 text-slate-400"
        onclick="document.getElementById('{{ $name }}').value ='';document.getElementById('{{ $formId }}').submit();"><svg
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
    <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
        id="{{ $name }}"
        class="rounded-md border-0 py-1.5 px-2.5 w-full pr-8 ring-1 placeholder:text-slate-400 focus:ring-2 text-sm ring-slate-300">

</div>
