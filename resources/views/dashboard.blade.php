<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создайте задачу') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div>
            <label for="name">Название задачи:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="deadline">Дедлайн:</label><br>
            <input type="datetime-local" id="deadline" name="deadline" value="2025-10-31T23:59:59" required><br><br>

            <label for="timeForExecution">Время на выполнение задачи:</label><br>
            <input type="number" id="timeForExecution" name="timeForExecution" value="200" required><br><br>

            <label for="percentOfCompleting">Процент завершенности:</label><br>
            <input type="number" id="percentOfCompleting" name="percentOfCompleting" value="99" required><br><br>

            <textarea id="description"></textarea><br>

            <input type="button" id="submitButton" value="Создать задачу">
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('submitButton').addEventListener('click', function () {
        var name = document.getElementById('name').value;
        var deadlineInput = document.getElementById('deadline').value;
        var timeForExecution = parseInt(document.getElementById('timeForExecution').value, 10);
        var percentOfCompleting = parseInt(document.getElementById('percentOfCompleting').value, 10);
        var description = document.getElementById('description').value;

        // Преобразование строки в формат RFC 3339
        var deadline = new Date(deadlineInput).toISOString();

        fetch('http://localhost:8080/tasks/', {
            method: 'POST',
            mode: 'no-cors',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                "userId": {{ $userId }},
                "name": name,
                "deadline": deadline,
                "timeForExecution": timeForExecution,
                "percentOfCompleting": percentOfCompleting,
                "description": description
            }),
            credentials: 'include'
        });
        alert('Задача ' + name + ' создана!')
    });

</script>