<div class="space-y-6">
    {{-- Form Submission Wrapper linked to our authenticate method --}}
    <form wire:submit.prevent="authenticate" class="space-y-5">
        
        {{-- Email Address Field --}}
        <div>
            <label for="login_email" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                Email Address <span class="text-red-500">*</span>
            </label>
            <div class="mt-1.5 relative rounded-md shadow-sm">
                <input 
                    wire:model="email" 
                    type="email" 
                    id="login_email" 
                    placeholder="name@example.com"
                    class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                    @error('email') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                    required
                >
            </div>
            @error('email')
                <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                    <svg class="size-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Password Field --}}
        <div>
            <div class="flex items-center justify-between">
                <label for="login_password" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                    Password <span class="text-red-500">*</span>
                </label>
                {{-- Placeholder link for future forgot password features --}}
                <a href="#" class="text-xs font-medium text-[#629D23] hover:underline focus:outline-none">
                    Forgot password?
                </a>
            </div>
            <div class="mt-1.5 relative rounded-md shadow-sm">
                <input 
                    wire:model="password" 
                    type="password" 
                    id="login_password" 
                    placeholder="••••••••"
                    class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                    @error('password') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                    required
                >
            </div>
            @error('password')
                <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                    <svg class="size-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Remember Me Component Option --}}
        <div class="flex items-center">
            <input 
                wire:model="remember" 
                id="login_remember" 
                type="checkbox" 
                class="size-4 text-[#629D23] border-zinc-300 rounded focus:ring-[#629D23] cursor-pointer"
            >
            <label for="login_remember" class="ml-2.5 block text-sm font-medium text-zinc-600 select-none cursor-pointer">
                Remember me on this device
            </label>
        </div>

        {{-- Action Processing Button --}}
        <div class="pt-2">
            <button 
                type="submit" 
                wire:loading.attr="disabled"
                class="w-full h-11 bg-[#1b2a19] hover:bg-[#2c3f29] text-white text-sm font-bold rounded-[6px] shadow-sm transition-all duration-150 flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
            >
                {{-- Standard text layout, hidden when running queries --}}
                <span wire:loading.remove wire:target="authenticate">Sign In to Ekomart</span>
                
                {{-- Animated loading layout spinner, shown during network requests --}}
                <span wire:loading wire:target="authenticate" class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Verifying Credentials...
                </span>
            </button>
        </div>
    </form>

    {{-- Visual Separator Ribbon --}}
    <div class="relative py-2">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-zinc-200"></div>
        </div>
        <div class="relative flex justify-center text-xs uppercase font-semibold tracking-wider">
            <span class="bg-white px-3 text-zinc-400">Or Continue With</span>
        </div>
    </div>

    {{-- OAuth Social Provider Operations Container --}}
    <div>
        <button 
            type="button"
            wire:click="redirectToGoogle"
            class="w-full h-11 border border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50 rounded-[6px] text-sm font-semibold text-zinc-700 transition-all duration-150 flex items-center justify-center gap-3 cursor-pointer focus:outline-none"
        >
            {{-- Flat Styled Google Brand Identity Icon --}}
            <svg class="size-5" viewBox="0 0 24 24">
                <path fill="#EA4335" d="M12 5.04c1.64 0 3.12.56 4.28 1.67l3.2-3.2C17.52 1.58 14.96 1 12 1 7.35 1 3.39 3.66 1.41 7.55l3.78 2.93C6.12 7.55 8.84 5.04 12 5.04z"/>
                <path fill="#4285F4" d="M23.49 12.27c0-.81-.07-1.59-.2-2.36H12v4.51h6.46c-.28 1.48-1.12 2.74-2.38 3.58l3.7 2.87c2.16-1.99 3.41-4.91 3.41-8.6z"/>
                <path fill="#FBBC05" d="M5.19 14.62c-.24-.72-.38-1.49-.38-2.29s.14-1.57.38-2.29L1.41 7.55C.51 9.34 0 11.33 0 13.4s.51 4.06 1.41 5.85l3.78-2.93z"/>
                <path fill="#34A853" d="M12 23c3.24 0 5.97-1.07 7.96-2.92l-3.7-2.87c-1.03.69-2.35 1.11-4.26 1.11-3.16 0-5.88-2.51-6.81-5.44L1.41 15.8C3.39 19.69 7.35 22.33 12 23z"/>
            </svg>
            <span>Sign in with Google</span>
        </button>
    </div>
</div>