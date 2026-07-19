<div class="space-y-6">
    {{-- Form Submission Wrapper linked to our register method --}}
    <form wire:submit.prevent="register" class="space-y-4">
        
        {{-- Full Name Field --}}
        <div>
            <label for="reg_name" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                Full Name <span class="text-red-500">*</span>
            </label>
            <div class="mt-1.5 relative rounded-md shadow-sm">
                <input 
                    wire:model="name" 
                    type="text" 
                    id="reg_name" 
                    placeholder="John Doe"
                    class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                    @error('name') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                    required
                >
            </div>
            @error('name')
                <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Email Address Field --}}
        <div>
            <label for="reg_email" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                Email Address <span class="text-red-500">*</span>
            </label>
            <div class="mt-1.5 relative rounded-md shadow-sm">
                <input 
                    wire:model="email" 
                    type="email" 
                    id="reg_email" 
                    placeholder="name@example.com"
                    class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                    @error('email') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                    required
                >
            </div>
            @error('email')
                <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Phone Number Field --}}
        <div>
            <label for="reg_phone" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                Phone Number <span class="text-red-500">*</span>
            </label>
            <div class="mt-1.5 relative rounded-md shadow-sm">
                <input 
                    wire:model="phone" 
                    type="tel" 
                    id="reg_phone" 
                    placeholder="+27 82 000 0000"
                    class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                    @error('phone') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                    required
                >
            </div>
            @error('phone')
                <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Password Grid (Password & Confirmation side-by-side on larger screens) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            {{-- Main Password --}}
            <div>
                <label for="reg_password" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                    Password <span class="text-red-500">*</span>
                </label>
                <div class="mt-1.5 relative rounded-md shadow-sm">
                    <input 
                        wire:model="password" 
                        type="password" 
                        id="reg_password" 
                        placeholder="••••••••"
                        class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                        @error('password') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                        required
                    >
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="reg_password_confirmation" class="block text-xs font-bold uppercase tracking-wide text-zinc-700">
                    Confirm <span class="text-red-500">*</span>
                </label>
                <div class="mt-1.5 relative rounded-md shadow-sm">
                    <input 
                        wire:model="password_confirmation" 
                        type="password" 
                        id="reg_password_confirmation" 
                        placeholder="••••••••"
                        class="w-full h-11 px-4 rounded-[6px] border text-sm text-zinc-800 placeholder-zinc-400 bg-white focus:outline-none transition-colors duration-150
                        @error('password_confirmation') border-red-500 focus:border-red-500 @else border-zinc-200 focus:border-[#629D23] @enderror"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- Action Processing Button --}}
        <div class="pt-3">
            <button 
                type="submit" 
                wire:loading.attr="disabled"
                class="w-full h-11 bg-[#629D23] hover:bg-[#53851E] text-white text-sm font-bold rounded-[6px] shadow-sm transition-all duration-150 flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <span wire:loading.remove wire:target="register">Create Account</span>
                
                <span wire:loading wire:target="register" class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating Profile...
                </span>
            </button>
        </div>
    </form>
</div>