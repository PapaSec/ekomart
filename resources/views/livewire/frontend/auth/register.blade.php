<form wire:submit="register" class="space-y-4">
    
    {{-- Full Name --}}
    <div>
        <label for="name" class="block text-xs font-bold uppercase text-zinc-700 tracking-wider mb-1.5">
            Full Name <span class="text-red-500">*</span>
        </label>
        <input 
            type="text" 
            id="name" 
            wire:model.blur="name" 
            placeholder="John Doe"
            class="w-full px-3.5 py-2.5 rounded-lg border text-sm text-zinc-800 placeholder-zinc-400 transition-colors focus:outline-none focus:ring-2 @error('name') border-red-500 focus:ring-red-200 focus:border-red-500 @else border-zinc-200 focus:ring-emerald-500/20 focus:border-[#629D23] @enderror"
        >
        @error('name')
            <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email Address --}}
    <div>
        <label for="email" class="block text-xs font-bold uppercase text-zinc-700 tracking-wider mb-1.5">
            Email Address <span class="text-red-500">*</span>
        </label>
        <input 
            type="email" 
            id="email" 
            wire:model.blur="email" 
            placeholder="john@example.com"
            class="w-full px-3.5 py-2.5 rounded-lg border text-sm text-zinc-800 placeholder-zinc-400 transition-colors focus:outline-none focus:ring-2 @error('email') border-red-500 focus:ring-red-200 focus:border-red-500 @else border-zinc-200 focus:ring-emerald-500/20 focus:border-[#629D23] @enderror"
        >
        @error('email')
            <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    {{-- Phone Number --}}
    <div>
        <label for="phone" class="block text-xs font-bold uppercase text-zinc-700 tracking-wider mb-1.5">
            Phone Number <span class="text-red-500">*</span>
        </label>
        <input 
            type="text" 
            id="phone" 
            wire:model.blur="phone" 
            placeholder="0821234567"
            class="w-full px-3.5 py-2.5 rounded-lg border text-sm text-zinc-800 placeholder-zinc-400 transition-colors focus:outline-none focus:ring-2 @error('phone') border-red-500 focus:ring-red-200 focus:border-red-500 @else border-zinc-200 focus:ring-emerald-500/20 focus:border-[#629D23] @enderror"
        >
        @error('phone')
            <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    {{-- Password --}}
    <div>
        <label for="password" class="block text-xs font-bold uppercase text-zinc-700 tracking-wider mb-1.5">
            Password <span class="text-red-500">*</span>
        </label>
        <input 
            type="password" 
            id="password" 
            wire:model="password" 
            placeholder="••••••••"
            class="w-full px-3.5 py-2.5 rounded-lg border text-sm text-zinc-800 placeholder-zinc-400 transition-colors focus:outline-none focus:ring-2 @error('password') border-red-500 focus:ring-red-200 focus:border-red-500 @else border-zinc-200 focus:ring-emerald-500/20 focus:border-[#629D23] @enderror"
        >
        @error('password')
            <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label for="password_confirmation" class="block text-xs font-bold uppercase text-zinc-700 tracking-wider mb-1.5">
            Confirm Password <span class="text-red-500">*</span>
        </label>
        <input 
            type="password" 
            id="password_confirmation" 
            wire:model="password_confirmation" 
            placeholder="••••••••"
            class="w-full px-3.5 py-2.5 rounded-lg border text-sm text-zinc-800 placeholder-zinc-400 transition-colors focus:outline-none focus:ring-2 @error('password_confirmation') border-red-500 focus:ring-red-200 focus:border-red-500 @else border-zinc-200 focus:ring-emerald-500/20 focus:border-[#629D23] @enderror"
        >
        @error('password_confirmation')
            <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit Button --}}
    <div class="pt-2">
        <button 
            type="submit" 
            wire:loading.attr="disabled"
            class="w-full py-3 px-4 bg-[#1E2B1A] hover:bg-[#2C3C28] text-white font-bold rounded-lg text-sm transition-all duration-200 flex items-center justify-center gap-2 disabled:opacity-50 cursor-pointer"
        >
            <span wire:loading.remove wire:target="register">Create Account</span>
            <span wire:loading wire:target="register" class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Processing...
            </span>
        </button>
    </div>

</form>