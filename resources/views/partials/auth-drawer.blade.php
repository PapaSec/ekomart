{{-- Global Authentication Slide-Over Drawer --}}
<div 
    x-data="{ 
        isOpen: false, 
        authMode: 'login' 
    }"
    {{-- Global browser window event listeners to control the drawer from anywhere --}}
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
        class="fixed inset-0 bg-zinc-900/60 backdrop-blur-sm transition-opacity"
        @click="isOpen = false"
    ></div>

    {{-- 2. The Slide-Out Panel Container --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                
                <div 
                    x-show="isOpen"
                    x-transition:enter="transform transition ease-in-out duration-300 sm:duration-400"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-300 sm:duration-400"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                    class="pointer-events-auto w-screen max-w-md"
                    @click.away="isOpen = false"
                >
                    <div class="flex h-full flex-col bg-white shadow-2xl border-l border-zinc-100">
                        
                        {{-- Drawer Shell Header Header --}}
                        <div class="px-6 py-5 border-b border-zinc-100 flex items-center justify-between bg-zinc-50/50">
                            <div>
                                <h2 class="text-lg font-bold text-zinc-900 tracking-tight" x-text="authMode === 'login' ? 'Sign In' : 'Create Account'"></h2>
                                <p class="text-xs text-zinc-500 mt-0.5" x-text="authMode === 'login' ? 'Access your Ekomart shopping dashboard.' : 'Join us to track orders and save favorites.'"></p>
                            </div>
                            <button 
                                @click="isOpen = false" 
                                class="rounded-lg p-2 text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 transition-all duration-200 cursor-pointer focus:outline-none"
                            >
                                <span class="sr-only">Close panel</span>
                                {{-- Phosphor Icon X / Close --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 256 256" fill="currentColor">
                                    <path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- Dynamic Content Area --}}
                        <div class="relative flex-1 overflow-y-auto px-6 py-6">
                            
                            {{-- Embedded Livewire Login Form Component --}}
                            <div x-show="authMode === 'login'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2">
                                <livewire:frontend.auth.login />
                                
                                {{-- Quick toggle anchor link down to Registration mode --}}
                                <div class="mt-6 text-center text-sm text-zinc-600">
                                    Don't have an account? 
                                    <button @click="authMode = 'register'" class="text-[#629D23] font-bold hover:underline cursor-pointer ml-1 focus:outline-none">
                                        Register here
                                    </button>
                                </div>
                            </div>

                            {{-- Embedded Livewire Registration Form Component --}}
                            <div x-show="authMode === 'register'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2">
                                <livewire:frontend.auth.register />
                                
                                {{-- Quick toggle anchor link down to Login mode --}}
                                <div class="mt-6 text-center text-sm text-zinc-600">
                                    Already have an account? 
                                    <button @click="authMode = 'login'" class="text-[#629D23] font-bold hover:underline cursor-pointer ml-1 focus:outline-none">
                                        Sign In
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>