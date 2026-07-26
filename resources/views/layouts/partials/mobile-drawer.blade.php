<div x-cloak>
    {{-- Dark Backdrop Overlay --}}
    <div
        x-show="mobileMenuOpen"
        x-transition:center="transition opacity ease-out duration-300" 
        x-transition:center-start="opacity-0"
        x-transitiion:center-end="opacity-100"
        x-transition:leave="transition opacity ease-in duration-200"
        x-trasnstion:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/60 z-50 lg:hidden">
</div>