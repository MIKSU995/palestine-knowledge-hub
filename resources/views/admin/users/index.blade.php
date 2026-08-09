@extends('layouts.admin')

@section('title', 'User Management')
@section('page_title', 'User Management')
@section('page_subtitle', 'Manage registered accounts, assign roles, and administer permissions')

@section('content')

<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                👥 Registered Users
            </h2>
            <p class="text-xs text-slate-400 mt-0.5">Control access levels and manage platform members</p>
        </div>
        <span class="text-xs font-bold text-slate-400">{{ $users->total() }} users registered</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-100">
                <tr>
                    <th class="p-4 pl-6">User</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Joined Date</th>
                    <th class="p-4 pr-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($users as $user)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 pl-6 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-emerald-600 flex items-center justify-center text-white font-extrabold text-sm flex-shrink-0">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $user->name }}</p>
                            @if($user->id === auth()->id())
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">You</span>
                            @endif
                        </div>
                    </td>
                    <td class="p-4 text-slate-600">
                        {{ $user->email }}
                    </td>
                    <td class="p-4">
                        <form action="{{ route('admin.users.role', $user->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="role" onchange="this.form.submit()" class="text-xs font-bold border border-slate-200 rounded-xl px-2.5 py-1.5 bg-slate-50 focus:ring-2 focus:ring-emerald-500">
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>
                                    {{ ucfirst($role->name) }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td class="p-4 text-xs text-slate-400">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="p-4 pr-6 text-right">
                        @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Remove user {{ $user->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-bold transition">
                                Delete
                            </button>
                        </form>
                        @else
                        <span class="text-xs text-slate-400 italic">Protected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-slate-400 text-sm">
                        No registered users found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $users->links() }}
    </div>
    @endif
</div>

@endsection
