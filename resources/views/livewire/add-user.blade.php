<div>
    <form wire:submit.prevent="store">
        <div>
            <label for="name">Name:</label>
            <input type="text" wire:model="name" id="name">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" wire:model="email" id="email">
            @error('email') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" wire:model="phone" id="phone">
            @error('phone') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" wire:model="password" id="password">
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select wire:model="gender_id" id="gender">
                <option value="">Select gender</option>
                @foreach($gender as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('gender_id') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="role_id">Role:</label>
            <select wire:model="role_id" id="role_id">
                <option value="">Select role</option>
                @foreach($role as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('role_id') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" wire:model="address" id="address">
            @error('address') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Create User</button>
    </form>
</div>


