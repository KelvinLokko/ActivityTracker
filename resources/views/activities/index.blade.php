<x-app-layout>
    <div class="container px-4">
        <div class="m-auto">
            <h1 class="text-2xl font-bold mb-4">Today's Activities</h1>

            <!-- Form to add new activity -->
            <form method="POST" action="{{ route('activities.store') }}">
                @csrf
                <input type="text" name="description" placeholder="Activity description" required class="border p-2 rounded-md">
                
                <!-- Status field: Choose between 'done' and 'pending' -->
                <select name="status" class="border p-2 rounded-md">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                </select>
                
                <!-- Remarks (optional) -->
                <input type="text" name="remarks" placeholder="Remarks (optional)" class="border p-2 rounded-md">
                
                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md mt-2">Add Activity</button>
            </form>
            
        </div>

        <!-- Button to navigate to the report view -->
        <div class="mt-6">
            <a href="{{ route('activities.report.form') }}" class="bg-green-500 text-black px-4 py-2 rounded-md">View Activity Report</a>
        </div>

        <!-- List of today's activities -->
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Updated By</th>
                    <th>Updated At</th>
                    <th>Action</th> <!-- Add column for the "Update" button -->
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr>
                    <td>{{ $activity->description }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>{{ $activity->remarks }}</td>
                    <td>{{ $activity->updatedBy->name }}</td>
                    <td>{{ $activity->updated_at->format('H:i') }}</td>
                    <td>
                        <!-- Update button -->
                        <a href="{{ route('activities.edit', $activity->id) }}" class="bg-blue-500 text-black px-4 py-2 rounded-md">
                            Update
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
