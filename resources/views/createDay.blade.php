<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать день') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div>
            <label for="date">Дата:</label><br>
            <input type="datetime-local" id="date" name="date" required><br><br>

            <label for="timeForTasks">Время на выполнение:</label><br>
            <input  type="number" id="timeForTasks" name="timeForTasks" required><br><br>

            <label>Количество задач:</label><br>
            <input type="number" id="amountOfTasks" name="amountOfTasks" required><br><br>

            <input type="button" id="submitButton" value="Создать задачу">
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('submitButton').addEventListener('click', function () {
        var date = new Date(document.getElementById('date').value).toISOString();
        var timeForTasks = parseInt(document.getElementById('timeForTasks').value, 10);
        var amountOfTasks = parseInt(document.getElementById('amountOfTasks').value, 10);

        fetch('http://localhost:8080/days/', {
            method: 'POST',
            mode: 'no-cors',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                "userId": {{ $userId }},
                "date": date,
                "timeForTasks": timeForTasks,
                "amountOfTasks": amountOfTasks
            }),
            credentials: 'include'
        });
        alert(date);
    });

</script>