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

    {{-- Password & Confirm Password Row --}}
    <div class="grid grid-cols-2 gap-3">
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
                Confirm <span class="text-red-500">*</span>
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
                <i class="fas fa-spinner fa-spin"></i>
                Registering...
            </span>
        </button>
    </div>

</form>