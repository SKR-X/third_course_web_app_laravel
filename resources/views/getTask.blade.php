<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Задача') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Task Details</h1>
            <div class="overflow-x-auto">
                <form id="taskForm" method="POST">
                    @csrf
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">Field</th>
                                <th class="py-2 px-4">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Task ID</td>
                                <td class="py-2 px-4">{{ $task['TaskId'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">User ID</td>
                                <td class="py-2 px-4">{{ $task['UserId'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Group ID</td>
                                <td class="py-2 px-4">{{ $task['GroupId'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Group Priority</td>
                                <td class="py-2 px-4">{{ $task['GroupPriorty'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Deadline</td>
                                <td class="py-2 px-4"><input type="text" id="DeadLine" name="DeadLine"
                                        value="{{ $task['DeadLine'] }}"></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Time for Execution</td>
                                <td class="py-2 px-4"><input type="text" id="TimeForExecution" name="TimeForExecution"
                                        value="{{ $task['TimeForExecution'] }}"></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Priority</td>
                                <td class="py-2 px-4">{{ $task['Priority'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Number of Hours Until DL</td>
                                <td class="py-2 px-4">{{ $task['NumberOfHoursUntilDL'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Percent of Completing</td>
                                <td class="py-2 px-4"><input type="text" id="PercentOfCompleting"
                                        name="PercentOfCompleting" value="{{ $task['PercentOfCompleting'] }}"></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Status</td>
                                <td class="py-2 px-4">{{ $task['Status'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Name</td>
                                <td class="py-2 px-4">{{ $task['Name'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Description</td>
                                <td class="py-2 px-4"><input type="text" id="Description"
                                name="Description" value="{{ $task['Description'] }}"></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Created At</td>
                                <td class="py-2 px-4">{{ $task['CreatedAt'] }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">Updated At</td>
                                <td class="py-2 px-4">{{ $task['UpdatedAt'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="submitButton"
                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
                </form>

                <button id="del">Delete</button>
            </div>
        </div>
    </div>

    <script>
         document.getElementById('del').addEventListener('click', function () {
            var form = document.getElementById('taskForm');

            var DeadLine = new Date(document.getElementById('DeadLine').value).toISOString();
            var PercentOfCompleting = parseInt(document.getElementById('PercentOfCompleting').value, 10);
            var TimeForExecution = parseInt(document.getElementById('TimeForExecution').value, 10);
            var Description = document.getElementById('Description').value;

            fetch('http:/localhost:8080/tasks/delete/' + {{ $task['TaskId'] }}, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(),
            });

            window.location.href = "http://example.local/tasks";
        });
    </script>

    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            var form = document.getElementById('taskForm');

            var DeadLine = new Date(document.getElementById('DeadLine').value).toISOString();
            var PercentOfCompleting = parseInt(document.getElementById('PercentOfCompleting').value, 10);
            var TimeForExecution = parseInt(document.getElementById('TimeForExecution').value, 10);
            var Description = document.getElementById('Description').value;

            fetch('http:/localhost:8080/tasks/update/' + {{ $task['TaskId'] }}, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    "deadline": DeadLine,
                    "timeForExecution": TimeForExecution,
                    "percentOfCompleting": PercentOfCompleting,
                    "description": Description
                }),
            });
        });
    </script>
</x-app-layout>