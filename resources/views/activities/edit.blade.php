<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Edit Activity</h1>

        <!-- Form to update activity -->
        <form method="POST" action="{{ route('activities.update', $activity->id) }}">
            @csrf
            @method('PUT')
            
            <input type="text" name="description" value="{{ $activity->description }}" required class="border p-2 rounded-md">
            
            <select name="status" class="border p-2 rounded-md">
                <option value="pending" {{ $activity->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $activity->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>
            
            <input type="text" name="remarks" value="{{ $activity->remarks }}" placeholder="Remarks (optional)" class="border p-2 rounded-md">
            
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md mt-2">Update Activity</button>
        </form>
    </div>
</x-app-layout>
