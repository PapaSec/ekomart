{{-- Global Authentication Slide-Over Drawer --}}
<div 
    x-data="{ 
        isOpen: false, 
        authMode: 'login' 
    }"
    @open-auth-drawer.window="isOpen = true; authMode = $event.detail.mode || 'login'"
    @close-auth-drawer.window="isOpen = false"
    @keydown.escape.window="isOpen = false"
    class="relative z-50"
    x-cloak
>
    {{-- Dark Background Backdrop Overlay --}}
    <div 
        x-show="isOpen"
        x-transition:enter="ease-in-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-zinc-900/60 transition-opacity"
        @click="isOpen = false"
    ></div>

    {{-- Slide-Out Panel Container --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                
                <div 
                    x-show="isOpen"
                    x-transition:enter="transform transition ease-in-out duration-300"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                    class="pointer-events-auto w-screen max-w-md"
                    @click.away="isOpen = false"
                >
                    <div class="flex h-full flex-col bg-white shadow-2xl relative">
                        
                        {{-- 1. Brand Gradient Header --}}
                        <div class="relative bg-gradient-to-br from-[#629D23] to-[#2C3C28] pt-10 pb-8 px-6 text-center text-white">
                            
                            {{-- Close Button (X) --}}
                            <button 
                                type="button"
                                @click="isOpen = false" 
                                class="absolute top-4 right-4 text-white/70 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors focus:outline-none cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 256 256" fill="currentColor">
                                    <path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                                </svg>
                            </button>

                            {{-- Centered App Logo (Preserving original SVG shape dimensions) --}}
                            <div class="flex justify-center mb-4">
                                <img 
                                    src="{{ asset('storage/logos/logo.svg') }}" 
                                    alt="Ekomart Logo" 
                                    class="h-12 w-auto object-contain max-w-[180px]"
                                >
                            </div>

                            {{-- Dynamic Headings --}}
                            <h2 class="text-2xl font-bold tracking-tight" x-text="authMode === 'login' ? 'Welcome Back' : 'Create Account'"></h2>
                            <p class="text-sm text-zinc-300 mt-1" x-text="authMode === 'login' ? 'Sign in to continue' : 'Join us to get started'"></p>
                        </div>

                        {{-- 2. Segmented Interactive Tabs Container --}}
                        <div class="px-6 pt-6">
                            <div class="flex bg-zinc-100 p-1.5 rounded-[8px] border border-zinc-200/50">
                                
                                {{-- Login Selector Tab Button --}}
                                <button 
                                    type="button"
                                    @click="authMode = 'login'"
                                    class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-[6px] text-sm font-bold transition-all duration-200 cursor-pointer focus:outline-none select-none"
                                    :class="authMode === 'login' ? 'bg-white text-zinc-800 shadow-sm' : 'text-zinc-500 hover:text-zinc-800'"
                                >
                                    <x-phosphor-sign-in class="size-4" />
                                    Login
                                </button>

                                {{-- Register Selector Tab Button --}}
                                <button 
                                    type="button"
                                    @click="authMode = 'register'"
                                    class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-[6px] text-sm font-bold transition-all duration-200 cursor-pointer focus:outline-none select-none"
                                    :class="authMode === 'register' ? 'bg-white text-zinc-800 shadow-sm' : 'text-zinc-500 hover:text-zinc-800'"
                                >
                                    <x-phosphor-user-plus class="size-4" />
                                    Register
                                </button>

                            </div>
                        </div>

                        {{-- 3. Dynamic Form Core Body Area --}}
                        <div class="relative flex-1 overflow-y-auto px-6 py-6">
                            
                            {{-- Login Form Container --}}
                            <div 
                                x-show="authMode === 'login'" 
                                wire:key="drawer-login-view"
                                x-transition:enter="transition ease-out duration-150" 
                                x-transition:enter-start="opacity-0"
                            >
                                <livewire:frontend.auth.login />
                            </div>

                            {{-- Register Form Container --}}
                            <div 
                                x-show="authMode === 'register'" 
                                wire:key="drawer-register-view"
                                x-transition:enter="transition ease-out duration-150" 
                                x-transition:enter-start="opacity-0"
                                x-cloak
                            >
                                <livewire:frontend.auth.register />
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>