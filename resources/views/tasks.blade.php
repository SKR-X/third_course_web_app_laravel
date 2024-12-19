<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список задач') }}
        </h2>
    </x-slot>
    <body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Tasks</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Task ID</th>
                        <th class="py-2 px-4">User ID</th>
                        <th class="py-2 px-4">Group ID</th>
                        <th class="py-2 px-4">Group Priority</th>
                        <th class="py-2 px-4">Deadline</th>
                        <th class="py-2 px-4">Time for Execution</th>
                        <th class="py-2 px-4">Priority</th>
                        <th class="py-2 px-4">Number of Hours Until DL</th>
                        <th class="py-2 px-4">Percent of Completing</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Description</th>
                        <th class="py-2 px-4">Created At</th>
                        <th class="py-2 px-4">Updated At</th>
                        <th class="py-2 px-4">Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $task['TaskId'] }}</td>
                            <td class="py-2 px-4">{{ $task['UserId'] }}</td>
                            <td class="py-2 px-4">{{ $task['GroupId'] }}</td>
                            <td class="py-2 px-4">{{ $task['GroupPriorty'] }}</td>
                            <td class="py-2 px-4">{{ $task['DeadLine'] }}</td>
                            <td class="py-2 px-4">{{ $task['TimeForExecution'] }}</td>
                            <td class="py-2 px-4">{{ $task['Priority'] }}</td>
                            <td class="py-2 px-4">{{ $task['NumberOfHoursUntilDL'] }}</td>
                            <td class="py-2 px-4">{{ $task['PercentOfCompleting'] }}</td>
                            <td class="py-2 px-4">{{ $task['Status'] }}</td>
                            <td class="py-2 px-4">{{ $task['Name'] }}</td>
                            <td class="py-2 px-4">{{ $task['Description'] }}</td>
                            <td class="py-2 px-4">{{ $task['CreatedAt'] }}</td>
                            <td class="py-2 px-4">{{ $task['UpdatedAt'] }}</td>
                            <td class="py-2 px-4"><a href="getTask/{{$task['TaskId']}}">Перейти к задаче</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
