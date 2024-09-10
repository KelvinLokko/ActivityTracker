<x-app-layout>
    <div class="container px-4">
        <h1 class="text-2xl font-bold mb-4">Activity Report</h1>

        <!-- Report Form -->
        <form method="GET" action="{{ route('activities.report') }}">
            @csrf
            <div>
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required class="border p-2 rounded-md">
            </div>

            <div class="mt-4">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required class="border p-2 rounded-md">
            </div>

            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md mt-4">Generate Report</button>
        </form>
    </div>
</x-app-layout>
