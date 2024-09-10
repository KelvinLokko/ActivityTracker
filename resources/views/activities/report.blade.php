<x-app-layout>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Activity Report</h1>

        <!-- Form to filter activities by date range -->
        <form method="GET" action="{{ route('activities.report') }}">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" required>
            
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" required>

            <button type="submit" class="bg-blue-500 text-black px-4 py-2">Get Report</button>
        </form>

        <!-- List of activities in the selected date range -->
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Updated By</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr>
                    <td>{{ $activity->description }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>{{ $activity->remarks }}</td>
                    <td>{{ $activity->updatedBy->name }}</td>
                    <td>{{ $activity->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
