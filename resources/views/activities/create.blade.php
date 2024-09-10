<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Add New Activity</h1>

        <!-- Form to add a new activity -->
        <form method="POST" action="{{ route('activities.store') }}">
            @csrf
            
            <input type="text" name="description" placeholder="Activity description" required class="border p-2 rounded-md">
            
            <select name="status" class="border p-2 rounded-md">
                <option value="pending">Pending</option>
                <option value="done">Done</option>
            </select>
            
            <input type="text" name="remarks" placeholder="Remarks (optional)" class="border p-2 rounded-md">
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Add Activity</button>
        </form>
    </div>
</x-app-layout>
